<?php
/**
 * Ad management for the `werbung` post type: run dates, cache purging,
 * the admin list and a format check. The ad itself is rendered by the
 * goldor/ad-slot block; goldor_block_get_active_ad() picks it.
 *
 * @package goldor
 */

/*
 * Billboards swap to this format on phones, and a skyscraper's stand-in for
 * screens too narrow to show it uses it too (see the ad-slot block).
 */
const GOLDOR_AD_MOBILE_SIZE = array( 300, 250 );

/**
 * Pixel size each placement type is sold in. Uploads may be larger (2× for
 * sharp screens) as long as the aspect ratio matches.
 */
function goldor_ad_formats() {
	return array(
		'Skyscraper'                     => array( 'class' => 'skyscraper', 'width' => 160, 'height' => 600 ),
		'Leaderboard'                    => array( 'class' => 'leaderboard', 'width' => 728, 'height' => 90 ),
		'Billboard'                      => array( 'class' => 'billboard', 'width' => 970, 'height' => 250 ),
		'MediumRectangle News'           => array( 'class' => 'ad-news', 'width' => 300, 'height' => 250 ),
		'MediumRectangle Stellengesuche' => array( 'class' => 'ad-stellen', 'width' => 300, 'height' => 250 ),
	);
}

/**
 * The Typ field itself lives in the database; the newer placement ships with
 * the theme instead.
 */
function goldor_ad_type_choices( $field ) {
	$field['choices']['Billboard'] = 'Billboard (970 x 250/JPEG/60KB)';
	return $field;
}
add_filter( 'acf/load_field/key=field_58627ee4c932c', 'goldor_ad_type_choices' );

/**
 * Start and end date sit next to the existing ACF fields (Typ, Aktiv,
 * Werbemittel, URL), registered in code so they ship with the theme.
 * Both are optional: no start means "from now", no end means "until
 * switched off".
 */
function goldor_ad_run_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_goldor_werbung_laufzeit',
			'title'    => 'Laufzeit und Darstellung',
			'position' => 'side',
			'fields'   => array(
				array(
					'key'            => 'field_goldor_werbung_start',
					'label'          => 'Start',
					'name'           => 'werbung_start',
					'type'           => 'date_picker',
					'instructions'   => 'Leer = sofort.',
					'display_format' => 'd.m.Y',
					'return_format'  => 'Ymd',
					'first_day'      => 1,
				),
				array(
					'key'            => 'field_goldor_werbung_ende',
					'label'          => 'Ende',
					'name'           => 'werbung_ende',
					'type'           => 'date_picker',
					'instructions'   => 'Letzter Tag, an dem die Anzeige läuft. Leer = unbegrenzt.',
					'display_format' => 'd.m.Y',
					'return_format'  => 'Ymd',
					'first_day'      => 1,
				),
				array(
					'key'               => 'field_goldor_werbung_sticky',
					'label'             => 'Beim Scrollen mitlaufen',
					'name'              => 'werbung_sticky',
					'type'              => 'true_false',
					'instructions'      => 'Aus = der Skyscraper bleibt oben auf der Seite stehen und scrollt weg.',
					'ui'                => 1,
					'default_value'     => 1,
					'conditional_logic' => array(
						array(
							array( 'field' => 'field_58627ee4c932c', 'operator' => '==', 'value' => 'Skyscraper' ),
						),
					),
				),
				array(
					'key'               => 'field_goldor_werbung_mobil',
					'label'             => 'Mobil-Bild',
					'name'              => 'werbemittel_mobil',
					'type'              => 'image',
					'instructions'      => 'Bild für Handys.',
					'return_format'     => 'id',
					'preview_size'      => 'thumbnail',
					'conditional_logic' => array(
						array(
							array( 'field' => 'field_58627ee4c932c', 'operator' => '==', 'value' => 'Billboard' ),
						),
						array(
							array( 'field' => 'field_58627ee4c932c', 'operator' => '==', 'value' => 'Skyscraper' ),
						),
					),
				),
			),
			'location' => array(
				array(
					array( 'param' => 'post_type', 'operator' => '==', 'value' => 'werbung' ),
				),
			),
		)
	);
}
add_action( 'acf/init', 'goldor_ad_run_fields' );

/**
 * Where an ad stands today: 'off' (unticked), 'scheduled', 'expired' or
 * 'running'.
 */
function goldor_ad_status( $post_id ) {
	if ( ! get_post_meta( $post_id, 'aktiv', true ) || 'publish' !== get_post_status( $post_id ) ) {
		return 'off';
	}

	$today = wp_date( 'Ymd' );
	$start = (string) get_post_meta( $post_id, 'werbung_start', true );
	$end   = (string) get_post_meta( $post_id, 'werbung_ende', true );

	if ( $start && $start > $today ) {
		return 'scheduled';
	}
	if ( $end && $end < $today ) {
		return 'expired';
	}
	return 'running';
}

/**
 * Ads used to be public, and the stored rewrite rules still route
 * /werbung/{slug}/ to them — which now serves the home page with a 200.
 * Rebuilding the rules once turns those URLs into proper 404s.
 */
function goldor_ad_flush_old_rewrites() {
	if ( 'werbung-private-2' !== get_option( 'goldor_rewrite_version' ) ) {
		flush_rewrite_rules( false );
		update_option( 'goldor_rewrite_version', 'werbung-private-2' );
	}
}
add_action( 'init', 'goldor_ad_flush_old_rewrites', 99 );

/*
 * Pages are cached for days, and every page carries the footer skyscraper,
 * so any ad change has to empty the whole cache, not just the ad's own URL.
 */
function goldor_ad_purge_cache() {
	do_action( 'litespeed_purge_all' );
}

function goldor_ad_purge_on_change( $post_id ) {
	if ( 'werbung' === get_post_type( $post_id ) && ! wp_is_post_revision( $post_id ) ) {
		goldor_ad_purge_cache();
	}
}
// acf/save_post runs after the fields are written, so the purge sees them.
add_action( 'acf/save_post', 'goldor_ad_purge_on_change', 20 );
add_action( 'save_post_werbung', 'goldor_ad_purge_on_change', 20 );
add_action( 'trashed_post', 'goldor_ad_purge_on_change' );
add_action( 'untrashed_post', 'goldor_ad_purge_on_change' );
add_action( 'before_delete_post', 'goldor_ad_purge_on_change' );

/**
 * Run dates only take effect if cached pages are rebuilt on the day: just
 * after midnight, purge once if an ad starts today or ended yesterday.
 */
function goldor_ad_schedule_daily() {
	if ( ! wp_next_scheduled( 'goldor_ad_daily_check' ) ) {
		$midnight = new DateTime( 'tomorrow', wp_timezone() );
		wp_schedule_event( $midnight->getTimestamp() + 5 * MINUTE_IN_SECONDS, 'daily', 'goldor_ad_daily_check' );
	}
}
add_action( 'init', 'goldor_ad_schedule_daily' );

function goldor_ad_daily_check() {
	$today     = wp_date( 'Ymd' );
	$yesterday = wp_date( 'Ymd', time() - DAY_IN_SECONDS );

	$changed = get_posts(
		array(
			'post_type'      => 'werbung',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'no_found_rows'  => true,
			'meta_query'     => array(
				'relation' => 'OR',
				array( 'key' => 'werbung_start', 'value' => $today ),
				array( 'key' => 'werbung_ende', 'value' => $yesterday ),
			),
		)
	);

	if ( $changed ) {
		goldor_ad_purge_cache();
	}
}
add_action( 'goldor_ad_daily_check', 'goldor_ad_daily_check' );

add_action(
	'switch_theme',
	function () {
		wp_clear_scheduled_hook( 'goldor_ad_daily_check' );
	}
);

/**
 * True when the uploaded image doesn't have the placement's aspect ratio
 * (5% tolerance), so it would be squeezed or letterboxed in its slot.
 * $field is the image's meta key, `werbemittel` or `werbemittel_mobil`.
 */
function goldor_ad_format_mismatch( $post_id, $field = 'werbemittel' ) {
	$formats = goldor_ad_formats();
	$type    = get_post_meta( $post_id, 'Typ', true );
	$meta    = wp_get_attachment_metadata( (int) get_post_meta( $post_id, $field, true ) );

	if ( ! isset( $formats[ $type ] ) || empty( $meta['width'] ) || empty( $meta['height'] ) ) {
		return false;
	}

	$want = 'werbemittel_mobil' === $field
		? GOLDOR_AD_MOBILE_SIZE[0] / GOLDOR_AD_MOBILE_SIZE[1]
		: $formats[ $type ]['width'] / $formats[ $type ]['height'];
	$have = $meta['width'] / $meta['height'];
	return abs( $have - $want ) / $want > 0.05;
}

/*
 * Admin list: preview, placement and today's status at a glance.
 */
add_filter(
	'manage_werbung_posts_columns',
	function ( $columns ) {
		$new = array();
		foreach ( $columns as $key => $label ) {
			if ( 'title' === $key ) {
				$new['goldor_ad_preview'] = 'Vorschau';
			}
			$new[ $key ] = $label;
			if ( 'title' === $key ) {
				$new['goldor_ad_type']   = 'Platzierung';
				$new['goldor_ad_status'] = 'Status';
				$new['goldor_ad_run']    = 'Laufzeit';
			}
		}
		return $new;
	}
);

add_action(
	'manage_werbung_posts_custom_column',
	function ( $column, $post_id ) {
		switch ( $column ) {
			case 'goldor_ad_preview':
				$image = wp_get_attachment_image( (int) get_post_meta( $post_id, 'werbemittel', true ), 'thumbnail', false, array( 'style' => 'max-width:80px;height:auto' ) );
				echo $image ? $image : '–'; // phpcs:ignore WordPress.Security.EscapeOutput
				break;

			case 'goldor_ad_type':
				echo esc_html( get_post_meta( $post_id, 'Typ', true ) ?: '–' );
				if ( goldor_ad_format_mismatch( $post_id ) || goldor_ad_format_mismatch( $post_id, 'werbemittel_mobil' ) ) {
					echo '<br><span style="color:#b32d2e">⚠ Bildformat passt nicht</span>';
				}
				break;

			case 'goldor_ad_status':
				$labels = array(
					'running'   => array( '#00a32a', 'Läuft' ),
					'scheduled' => array( '#dba617', 'Geplant' ),
					'expired'   => array( '#787c82', 'Abgelaufen' ),
					'off'       => array( '#787c82', 'Aus' ),
				);
				$status = $labels[ goldor_ad_status( $post_id ) ];
				printf( '<span style="color:%1$s;font-weight:600">● %2$s</span>', esc_attr( $status[0] ), esc_html( $status[1] ) );
				break;

			case 'goldor_ad_run':
				$start = get_post_meta( $post_id, 'werbung_start', true );
				$end   = get_post_meta( $post_id, 'werbung_ende', true );
				$fmt   = function ( $ymd ) {
					return $ymd ? wp_date( 'd.m.Y', strtotime( $ymd ) ) : '';
				};
				echo esc_html( $start || $end ? trim( $fmt( $start ) . ' – ' . $fmt( $end ), ' ' ) : 'unbegrenzt' );
				break;
		}
	},
	10,
	2
);

/**
 * On the edit screen, say plainly when the image won't fit its slot — on the
 * image field itself, since the block editor doesn't show admin notices.
 */
function goldor_ad_format_hint( $field ) {
	$post_id = get_the_ID();
	if ( ! $post_id || 'werbung' !== get_post_type( $post_id ) ) {
		return $field;
	}

	$formats = goldor_ad_formats();
	$type    = get_post_meta( $post_id, 'Typ', true );
	if ( ! isset( $formats[ $type ] ) ) {
		return $field;
	}

	$w = $formats[ $type ]['width'];
	$h = $formats[ $type ]['height'];
	$field['instructions'] = sprintf( 'Format %1$d×%2$d px, ideal doppelt so gross (%3$d×%4$d px) für scharfe Darstellung.', $w, $h, $w * 2, $h * 2 );

	if ( goldor_ad_format_mismatch( $post_id ) ) {
		$field['instructions'] .= ' ⚠ Das aktuelle Bild hat ein anderes Seitenverhältnis und wird verzerrt oder mit Rand angezeigt.';
	}
	return $field;
}
add_filter( 'acf/prepare_field/name=werbemittel', 'goldor_ad_format_hint' );

/**
 * The mobile image has one format but a different job per placement.
 */
function goldor_ad_mobile_hint( $field ) {
	$post_id = get_the_ID();
	if ( ! $post_id || 'werbung' !== get_post_type( $post_id ) ) {
		return $field;
	}

	$w = GOLDOR_AD_MOBILE_SIZE[0];
	$h = GOLDOR_AD_MOBILE_SIZE[1];

	$field['instructions'] = 'Skyscraper' === get_post_meta( $post_id, 'Typ', true )
		? 'Erscheint auf der Startseite, wo der Skyscraper nicht sichtbar ist und kein Billboard läuft.'
		: 'Bild für Handys.';
	$field['instructions'] .= sprintf( ' Format %1$d×%2$d px, ideal doppelt so gross (%3$d×%4$d px).', $w, $h, $w * 2, $h * 2 );

	if ( goldor_ad_format_mismatch( $post_id, 'werbemittel_mobil' ) ) {
		$field['instructions'] .= ' ⚠ Das aktuelle Bild hat ein anderes Seitenverhältnis und wird verzerrt oder mit Rand angezeigt.';
	}
	return $field;
}
add_filter( 'acf/prepare_field/name=werbemittel_mobil', 'goldor_ad_mobile_hint' );
