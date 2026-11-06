<?php
/**
 * Translating the fixed texts of the block templates.
 *
 * Templates and parts are static HTML, written in German, and stay editable in
 * the Site Editor. Their texts cannot call __(), so they are listed once in
 * goldor_template_strings() — which is where `wp i18n make-pot` finds them —
 * and swapped for the translation as the blocks render. Links to German
 * pages ("/goldor-bestellen/") are pointed at the page's published
 * translation the same way.
 *
 * Only on pages in another language than German; the German site renders
 * the templates untouched. A text that is edited in a template and no longer
 * matches an entry below simply stays German: add the new wording here and
 * to languages/goldor-fr_FR.po.
 *
 * @package goldor
 */

/**
 * Every fixed text of templates/ and parts/: the German as written there,
 * mapped to its translation in the current language. Each line names the
 * text twice on purpose — the key is what the template contains, the __()
 * call is what `wp i18n make-pot` extracts.
 *
 * @return array<string, string>
 */
function goldor_template_strings() {
	static $cache = array();
	$lang = goldor_current_language();
	if ( isset( $cache[ $lang ] ) ) {
		return $cache[ $lang ];
	}

	$strings = array(
		// Header, search, footer.
		'Suche' => __( 'Suche', 'goldor' ),
		'Abonnieren' => __( 'Abonnieren', 'goldor' ),
		'Über uns' => __( 'Über uns', 'goldor' ),
		'Werbung' => __( 'Werbung', 'goldor' ),
		'FAQ' => __( 'FAQ', 'goldor' ),
		'Kontakt' => __( 'Kontakt', 'goldor' ),
		'© 2026 Gold’Or – Alle Rechte vorbehalten' => __( '© 2026 Gold’Or – Alle Rechte vorbehalten', 'goldor' ),
		'Datenschutz' => __( 'Datenschutz', 'goldor' ),
		'Impressum' => __( 'Impressum', 'goldor' ),

		// Abo band.
		'Das Schweizer Fachmagazin der Schmuck-, Uhren- und Edelsteinbranche im Abo' => __( 'Das Schweizer Fachmagazin der Schmuck-, Uhren- und Edelsteinbranche im Abo', 'goldor' ),
		'Jede Ausgabe gedruckt' => __( 'Jede Ausgabe gedruckt', 'goldor' ),
		'Online-Zugang zu allen Artikeln' => __( 'Online-Zugang zu allen Artikeln', 'goldor' ),
		'Newsletter mit Stellen und Marktplatz' => __( 'Newsletter mit Stellen und Marktplatz', 'goldor' ),
		'Jetzt abonnieren' => __( 'Jetzt abonnieren', 'goldor' ),

		// Homepage.
		'News aus der Schmuck- und Uhrenbranche' => __( 'News aus der Schmuck- und Uhrenbranche', 'goldor' ),
		'Alle News' => __( 'Alle News', 'goldor' ),
		'Aus dem Fachmagazin' => __( 'Aus dem Fachmagazin', 'goldor' ),
		'Zum Magazin' => __( 'Zum Magazin', 'goldor' ),
		'Alle' => __( 'Alle', 'goldor' ),
		'Stellen- und Kleinanzeigen' => __( 'Stellen- und Kleinanzeigen', 'goldor' ),
		'Jobs' => __( 'Jobs', 'goldor' ),
		'Alle offenen Stellen' => __( 'Alle offenen Stellen', 'goldor' ),
		'Inserat aufgeben' => __( 'Inserat aufgeben', 'goldor' ),
		'Marktplatz' => __( 'Marktplatz', 'goldor' ),
		'Zum Marktplatz' => __( 'Zum Marktplatz', 'goldor' ),
		'Anzeige aufgeben' => __( 'Anzeige aufgeben', 'goldor' ),
		'Personen & Messen' => __( 'Personen & Messen', 'goldor' ),
		'Zur Branchenübersicht' => __( 'Zur Branchenübersicht', 'goldor' ),
		'Kalender' => __( 'Kalender', 'goldor' ),
		'Alle Termine anzeigen' => __( 'Alle Termine anzeigen', 'goldor' ),
		'Alle Empfehlungen' => __( 'Alle Empfehlungen', 'goldor' ),

		// Branche page and the "further entries" bands under single entries.
		'Personen' => __( 'Personen', 'goldor' ),
		'Alle Meldungen' => __( 'Alle Meldungen', 'goldor' ),
		'Alle Termine' => __( 'Alle Termine', 'goldor' ),
		'Lieferanten' => __( 'Lieferanten', 'goldor' ),
		'Zum Verzeichnis' => __( 'Zum Verzeichnis', 'goldor' ),
		'Branchen-Lexikon' => __( 'Branchen-Lexikon', 'goldor' ),
		'Alle Begriffe' => __( 'Alle Begriffe', 'goldor' ),
		'Weitere Stellen' => __( 'Weitere Stellen', 'goldor' ),
		'Weitere Termine' => __( 'Weitere Termine', 'goldor' ),
		'Weitere Anzeigen' => __( 'Weitere Anzeigen', 'goldor' ),
		'Weitere Lieferanten' => __( 'Weitere Lieferanten', 'goldor' ),
		'Weitere Begriffe' => __( 'Weitere Begriffe', 'goldor' ),
		'Zum Branchen-Lexikon' => __( 'Zum Branchen-Lexikon', 'goldor' ),
		'Zum Angebot' => __( 'Zum Angebot', 'goldor' ),
		'Website öffnen' => __( 'Website öffnen', 'goldor' ),

		// Archive leads.
		'Von der Redaktion empfohlen' => __( 'Von der Redaktion empfohlen', 'goldor' ),
		'Beiträge, die unsere Redaktion besonders empfiehlt – die neueste Empfehlung zuerst.' => __( 'Beiträge, die unsere Redaktion besonders empfiehlt – die neueste Empfehlung zuerst.', 'goldor' ),
		'Hintergründe, Porträts und Marktanalysen aus dem gedruckten Fachmagazin.' => __( 'Hintergründe, Porträts und Marktanalysen aus dem gedruckten Fachmagazin.', 'goldor' ),
		'Offene Stellen und Stellengesuche aus der Schmuck- und Uhrenbranche.' => __( 'Offene Stellen und Stellengesuche aus der Schmuck- und Uhrenbranche.', 'goldor' ),
		'Messen, Ausstellungen und Branchentermine im In- und Ausland.' => __( 'Messen, Ausstellungen und Branchentermine im In- und Ausland.', 'goldor' ),
		'Angebote und Gesuche aus der Branche — von Werkzeug und Ladeneinrichtung bis zur Geschäftsübernahme.' => __( 'Angebote und Gesuche aus der Branche — von Werkzeug und Ladeneinrichtung bis zur Geschäftsübernahme.', 'goldor' ),
		'Das Verzeichnis der Lieferanten, Hersteller und Dienstleister der Schweizer Schmuck- und Uhrenbranche.' => __( 'Das Verzeichnis der Lieferanten, Hersteller und Dienstleister der Schweizer Schmuck- und Uhrenbranche.', 'goldor' ),
		'Verbände, Institutionen und Fachadressen der Schmuck- und Uhrenbranche.' => __( 'Verbände, Institutionen und Fachadressen der Schmuck- und Uhrenbranche.', 'goldor' ),
		'Alle Ausgaben von Gold’Or — mit Inhaltsverzeichnis und E-Paper für Abonnentinnen und Abonnenten.' => __( 'Alle Ausgaben von Gold’Or — mit Inhaltsverzeichnis und E-Paper für Abonnentinnen und Abonnenten.', 'goldor' ),
		'Wechsel, Ernennungen und Auszeichnungen aus der Schweizer Schmuck- und Uhrenbranche.' => __( 'Wechsel, Ernennungen und Auszeichnungen aus der Schweizer Schmuck- und Uhrenbranche.', 'goldor' ),
		'Fachbegriffe der Schmuck- und Uhrenbranche, von Aventurin bis Zifferblatt erklärt.' => __( 'Fachbegriffe der Schmuck- und Uhrenbranche, von Aventurin bis Zifferblatt erklärt.', 'goldor' ),

		// Empty states, 404.
		'Zu dieser Auswahl sind zurzeit keine Einträge vorhanden.' => __( 'Zu dieser Auswahl sind zurzeit keine Einträge vorhanden.', 'goldor' ),
		'Zu diesem Suchbegriff wurde nichts gefunden. Versuchen Sie es mit einem anderen Wort.' => __( 'Zu diesem Suchbegriff wurde nichts gefunden. Versuchen Sie es mit einem anderen Wort.', 'goldor' ),
		'Seite nicht gefunden' => __( 'Seite nicht gefunden', 'goldor' ),
		'Diese Seite gibt es nicht oder nicht mehr. Vielleicht hilft die Suche weiter.' => __( 'Diese Seite gibt es nicht oder nicht mehr. Vielleicht hilft die Suche weiter.', 'goldor' ),
	);

	// Only what actually differs needs swapping.
	$cache[ $lang ] = array_filter(
		$strings,
		function ( $translation, $original ) {
			return $translation !== $original;
		},
		ARRAY_FILTER_USE_BOTH
	);
	return $cache[ $lang ];
}

/**
 * Whether the page renders in another language than the templates are
 * written in.
 */
function goldor_needs_template_translation() {
	$lang = goldor_current_language();
	return $lang && 'de' !== $lang;
}

/**
 * A site-relative link from a template ("/goldor-bestellen/") as the URL of
 * the page's published translation, or of the translated post type archive.
 * Anything else, and pages without a published translation, stay as they
 * are: a German page beats a dead link.
 */
function goldor_localize_path( $url ) {
	static $cache = array();
	if ( ! is_string( $url ) || ! preg_match( '#^/[^/]#', $url ) ) {
		return $url;
	}
	$lang = goldor_current_language();
	if ( isset( $cache[ $lang ][ $url ] ) ) {
		return $cache[ $lang ][ $url ];
	}

	$path     = trim( wp_parse_url( $url, PHP_URL_PATH ), '/' );
	$resolved = $url;

	// A post type archive first: some archives share their path with an old
	// page ("/magazin/") that has no published translation.
	foreach ( get_post_types( array( 'has_archive' => true ), 'objects' ) as $type ) {
		$slug = true === $type->has_archive ? ( $type->rewrite['slug'] ?? $type->name ) : $type->has_archive;
		if ( trim( (string) $slug, '/' ) === $path ) {
			$resolved = get_post_type_archive_link( $type->name );
			break;
		}
	}

	$page = $resolved === $url ? get_page_by_path( $path ) : null;
	if ( $page ) {
		$id = (int) apply_filters( 'wpml_object_id', $page->ID, 'page', false );
		if ( $id && 'publish' === get_post_status( $id ) ) {
			$resolved = get_permalink( $id );
		}
	}

	$cache[ $lang ][ $url ] = $resolved;
	return $resolved;
}

/**
 * Block attributes that carry template text or template links: the theme's
 * own blocks, the footer navigation and the search fields.
 */
function goldor_translate_template_block_attributes( $block ) {
	if ( ! goldor_needs_template_translation() || empty( $block['blockName'] ) || empty( $block['attrs'] ) ) {
		return $block;
	}

	$name = $block['blockName'];
	if ( 0 !== strpos( $name, 'goldor/' ) && ! in_array( $name, array( 'core/navigation-link', 'core/search' ), true ) ) {
		return $block;
	}

	$strings = goldor_template_strings();
	foreach ( $block['attrs'] as $key => $value ) {
		if ( ! is_string( $value ) ) {
			continue;
		}
		if ( in_array( $key, array( 'url', 'actionLink', 'archiveLink' ), true ) ) {
			$block['attrs'][ $key ] = goldor_localize_path( $value );
		} elseif ( isset( $strings[ $value ] ) ) {
			$block['attrs'][ $key ] = $strings[ $value ];
		}
	}

	return $block;
}
add_filter( 'render_block_data', 'goldor_translate_template_block_attributes' );

/**
 * Text written straight into a template's HTML (headings, paragraphs,
 * buttons, list items): each text node that is exactly a listed original is
 * swapped, and site-relative links are pointed at the translation. Post
 * content runs through the same blocks, but only a paragraph consisting of
 * nothing but one of these template phrases would ever match.
 */
function goldor_translate_template_block_html( $html, $block ) {
	static $names = array( 'core/heading', 'core/paragraph', 'core/button', 'core/list-item' );
	if ( '' === $html || ! goldor_needs_template_translation() || ! in_array( $block['blockName'], $names, true ) ) {
		return $html;
	}

	$strings = goldor_template_strings();
	$html    = preg_replace_callback(
		'/>([^<>]+)</u',
		function ( $m ) use ( $strings ) {
			$text = html_entity_decode( trim( $m[1] ), ENT_QUOTES | ENT_HTML5, 'UTF-8' );
			if ( ! isset( $strings[ $text ] ) ) {
				return $m[0];
			}
			return '>' . str_replace( trim( $m[1] ), esc_html( $strings[ $text ] ), $m[1] ) . '<';
		},
		$html
	);

	return preg_replace_callback(
		'/href="(\/[^"]*)"/',
		function ( $m ) {
			return 'href="' . esc_url( goldor_localize_path( $m[1] ) ) . '"';
		},
		$html
	);
}
add_filter( 'render_block', 'goldor_translate_template_block_html', 10, 2 );
