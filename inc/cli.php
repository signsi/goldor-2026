<?php
/**
 * `wp goldor nachfuehren`: brings a freshly pulled database up to what the
 * theme expects, after "Holen" in WPorbit has replaced the local one with
 * Live's. Safe to run any number of times.
 *
 * It creates what the theme can create on its own and only reports what
 * needs a person (a page to publish, a choice to make). EINRICHTUNG.md,
 * section 16, describes the same steps by hand.
 *
 * @package goldor
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

/**
 * Führt nach dem Holen der Live-Datenbank nach, was das Theme in der Datenbank erwartet.
 *
 * ## OPTIONS
 *
 * [--testdaten]
 * : Setzt zusätzlich die Testinhalte dieser Entwicklungsrunde (Obertitel der Coverstory).
 *
 * ## EXAMPLES
 *
 *     wp goldor nachfuehren
 *     wp goldor nachfuehren --testdaten
 *
 * @when after_wp_load
 */
function goldor_cli_nachfuehren( $args, $assoc ) {
	$todo = array();

	// The admin the created content is attributed to.
	$admins = get_users( array( 'role' => 'administrator', 'number' => 1, 'fields' => 'ID' ) );
	if ( $admins ) {
		wp_set_current_user( (int) $admins[0] );
	}

	WP_CLI::log( 'Gold’Or: nachführen' );

	// 1. Musterbeitrag.
	if ( goldor_musterbeitrag_id() ) {
		WP_CLI::log( '  ✓ Musterbeitrag vorhanden (#' . goldor_musterbeitrag_id() . ')' );
	} else {
		$id = goldor_musterbeitrag_build();
		WP_CLI::log( $id ? '  + Musterbeitrag angelegt (#' . $id . ', privat)' : '  ! Musterbeitrag konnte nicht angelegt werden' );
	}

	// 2. Empfehlungen: stamp the current picks so /empfohlen/ lists them.
	$picks = goldor_home_editor_picks();
	if ( $picks ) {
		goldor_stamp_unmarked_picks( $picks );
		WP_CLI::log( '  ✓ Empfehlungen markiert (' . count( $picks ) . ')' );
	} else {
		$todo[] = 'Menü „Startseite“: „Von der Redaktion empfohlen“ ist leer – drei Beiträge wählen (EINRICHTUNG.md, 9).';
	}

	// 3. Rewrite rules for /empfohlen/ and the ad URLs: rebuilt on the next
	// request by their own version checks; doing it now saves that request.
	delete_option( 'goldor_empfohlen_rewrite' );
	goldor_empfohlen_rewrite();
	goldor_ad_flush_old_rewrites();
	WP_CLI::log( '  ✓ Adressen /empfohlen/ und /fr/recommandations/ eingerichtet' );

	// 4. Test content of this development round, on request only.
	if ( ! empty( $assoc['testdaten'] ) ) {
		$cover = 87193;
		if ( get_post( $cover ) && '' === (string) get_post_meta( $cover, 'obertitel', true ) ) {
			update_post_meta( $cover, 'obertitel', 'Victor-Mayer-Preis 2026' );
			WP_CLI::log( '  + Testdaten: Obertitel „Victor-Mayer-Preis 2026“ auf #' . $cover );
		} else {
			WP_CLI::log( '  ✓ Testdaten: Obertitel auf #' . $cover . ' schon gesetzt oder Beitrag fehlt' );
		}
	}

	// 5. Checks that need a person.
	$overrides = get_posts(
		array(
			'post_type'      => array( 'wp_template', 'wp_template_part' ),
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'tax_query'      => array( array( 'taxonomy' => 'wp_theme', 'field' => 'name', 'terms' => get_stylesheet() ) ),
		)
	);
	if ( $overrides ) {
		$todo[] = count( $overrides ) . ' Vorlage(n) im Website-Editor gespeichert – sie überschreiben die Theme-Dateien. Zurücksetzen (EINRICHTUNG.md, 13).';
	}

	if ( ! get_option( 'goldor_home_settings' ) ) {
		$todo[] = 'Menü „Startseite“ einmal im Backend öffnen, damit die Einstellungen angelegt werden (EINRICHTUNG.md, 9).';
	}

	// Pages the templates link to; on the French site a draft translation
	// means the link stays German.
	foreach ( array( 'goldor-bestellen', 'ueber-uns', 'werbeformate-und-preise', 'faq', 'kontakt', 'datenschutz', 'impressum' ) as $path ) {
		$page = get_page_by_path( $path );
		if ( ! $page || 'publish' !== $page->post_status ) {
			$todo[] = 'Seite /' . $path . '/ fehlt oder ist nicht veröffentlicht – Header oder Footer verlinken sie.';
			continue;
		}
		$fr = (int) apply_filters( 'wpml_object_id', $page->ID, 'page', false, 'fr' );
		if ( ! $fr || 'publish' !== get_post_status( $fr ) ) {
			$todo[] = 'Französische Fassung von /' . $path . '/ fehlt oder ist Entwurf – auf /fr/ führt der Link auf die deutsche Seite.';
		}
	}

	if ( $todo ) {
		WP_CLI::log( '' );
		WP_CLI::log( 'Von Hand prüfen:' );
		foreach ( $todo as $item ) {
			WP_CLI::log( '  – ' . $item );
		}
	}

	WP_CLI::success( 'Fertig.' );
}
WP_CLI::add_command( 'goldor nachfuehren', 'goldor_cli_nachfuehren' );
