<?php
/**
 * The homepage parts the editors set themselves: the column beside the top
 * story (three posts of their choice or one Halfpage ad) and the three posts
 * for "Von der Redaktion empfohlen" at the bottom. Editors can't reach the Site Editor, and
 * ACF's free version has no options pages, so the settings live on a single
 * hidden post with its own menu entry.
 *
 * @package goldor
 */

const GOLDOR_HOME_POST_TYPE = 'goldor_startseite';

// What "Von der Redaktion empfohlen" may show, and how many: one row of three cards.
const GOLDOR_HOME_PICKS_TYPES = array( 'post', 'artikel' );
const GOLDOR_HOME_PICKS_MAX   = 3;

function goldor_home_post_type() {
	$cap = 'edit_others_posts';

	register_post_type(
		GOLDOR_HOME_POST_TYPE,
		array(
			'labels'          => array(
				'name'          => 'Startseite',
				'singular_name' => 'Startseite',
				'edit_item'     => 'Startseite',
			),
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => false,
			'show_in_rest'    => false,
			'rewrite'         => false,
			'query_var'       => false,
			'supports'        => false,
			'map_meta_cap'    => true,
			'capabilities'    => array(
				'create_posts'           => 'do_not_allow',
				'delete_posts'           => 'do_not_allow',
				'delete_others_posts'    => 'do_not_allow',
				'delete_published_posts' => 'do_not_allow',
				'edit_posts'             => $cap,
				'edit_others_posts'      => $cap,
				'edit_published_posts'   => $cap,
				'publish_posts'          => $cap,
			),
		)
	);
}
add_action( 'init', 'goldor_home_post_type' );

function goldor_home_settings_id() {
	$post_id = (int) get_option( 'goldor_home_settings', 0 );
	return GOLDOR_HOME_POST_TYPE === get_post_type( $post_id ) ? $post_id : 0;
}

function goldor_home_menu() {
	if ( ! current_user_can( 'edit_others_posts' ) ) {
		return;
	}

	$post_id = goldor_home_settings_id();
	if ( ! $post_id ) {
		$post_id = wp_insert_post(
			array(
				'post_type'   => GOLDOR_HOME_POST_TYPE,
				'post_status' => 'publish',
				'post_title'  => 'Startseite',
			)
		);
		update_option( 'goldor_home_settings', $post_id );
	}

	add_menu_page( 'Startseite', 'Startseite', 'edit_others_posts', 'post.php?post=' . $post_id . '&action=edit', '', 'dashicons-admin-home', 3 );
}
add_action( 'admin_menu', 'goldor_home_menu' );

function goldor_home_menu_parent( $parent_file ) {
	if ( GOLDOR_HOME_POST_TYPE === get_current_screen()->post_type ) {
		return 'post.php?post=' . goldor_home_settings_id() . '&action=edit';
	}
	return $parent_file;
}
add_filter( 'parent_file', 'goldor_home_menu_parent' );

function goldor_home_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$mode_is = function ( $mode ) {
		return array(
			array(
				array( 'field' => 'field_goldor_spalte_modus', 'operator' => '==', 'value' => $mode ),
			),
		);
	};

	$fields = array(
		array(
			'key'           => 'field_goldor_spalte_modus',
			'label'         => 'Rechte Spalte neben der Top-Story',
			'name'          => 'spalte_modus',
			'type'          => 'button_group',
			'choices'       => array(
				'beitraege' => 'Beiträge',
				'werbung'   => 'Werbung',
			),
			'default_value' => 'beitraege',
		),
		array(
			'key'               => 'field_goldor_spalte_anzeige',
			'label'             => 'Laufende Anzeige',
			'name'              => '',
			'type'              => 'message',
			'conditional_logic' => $mode_is( 'werbung' ),
		),
	);

	foreach ( array( 1 => 'Beitrag 1 (mit Bild)', 2 => 'Beitrag 2', 3 => 'Beitrag 3' ) as $slot => $label ) {
		$fields[] = array(
			'key'               => 'field_goldor_spalte_beitrag_' . $slot,
			'label'             => $label,
			'name'              => 'spalte_beitrag_' . $slot,
			'type'              => 'post_object',
			'instructions'      => 'News oder Fachartikel. Leer = automatisch der neueste Beitrag.',
			'post_type'         => array( 'post', 'artikel' ),
			'post_status'       => array( 'publish' ),
			'return_format'     => 'id',
			'allow_null'        => 1,
			'ui'                => 1,
			'conditional_logic' => $mode_is( 'beitraege' ),
		);
	}

	$fields[] = array(
		'key'           => 'field_goldor_redaktion_empfohlen',
		'label'         => 'Von der Redaktion empfohlen',
		'name'          => 'redaktion_empfohlen',
		'type'          => 'relationship',
		'instructions'  => 'Drei beliebige News oder Fachartikel, auch ältere, ganz unten auf der Startseite. Reihenfolge per Ziehen. Ohne Auswahl erscheint der Bereich nicht.',
		'post_type'     => GOLDOR_HOME_PICKS_TYPES,
		'post_status'   => array( 'publish' ),
		'filters'       => array( 'search', 'post_type' ),
		'return_format' => 'id',
		'max'           => GOLDOR_HOME_PICKS_MAX,
	);

	acf_add_local_field_group(
		array(
			'key'      => 'group_goldor_startseite',
			'title'    => 'Startseite',
			'style'    => 'seamless',
			'fields'   => $fields,
			'location' => array(
				array(
					array( 'param' => 'post_type', 'operator' => '==', 'value' => GOLDOR_HOME_POST_TYPE ),
				),
			),
		)
	);
}
add_action( 'acf/init', 'goldor_home_fields' );

/**
 * Says which ad runs right now, since "Werbung" without a running ad falls
 * back to the posts.
 */
function goldor_home_ad_hint( $field ) {
	$ad = goldor_block_get_active_ad( 'Halfpage' );

	$field['message'] = $ad && ! empty( $ad['image'] )
		? sprintf( 'Zurzeit läuft „%s“. Sie ersetzt die drei Beiträge.', esc_html( $ad['title'] ) )
		: 'Zurzeit läuft keine Halfpage-Anzeige, deshalb erscheinen weiterhin die Beiträge. Anzeigen pflegt ihr unter „Werbung“.';
	return $field;
}
add_filter( 'acf/prepare_field/key=field_goldor_spalte_anzeige', 'goldor_home_ad_hint' );

function goldor_home_purge( $post_id ) {
	if ( GOLDOR_HOME_POST_TYPE === get_post_type( (int) $post_id ) ) {
		goldor_ad_purge_cache();
	}
}
add_action( 'acf/save_post', 'goldor_home_purge', 20 );

/**
 * True when the column should carry the ad; without a running one it stays
 * with the posts, so the slot never ends up empty.
 */
function goldor_home_column_shows_ad() {
	if ( 'werbung' !== get_post_meta( goldor_home_settings_id(), 'spalte_modus', true ) ) {
		return false;
	}

	$ad = goldor_block_get_active_ad( 'Halfpage' );
	return $ad && ! empty( $ad['image'] );
}

/**
 * The column's posts in slot order. A chosen post stays in its slot unless it
 * can't appear; every other slot takes the newest news, as it always has.
 */
function goldor_home_column_posts( $count = 3 ) {
	$settings = goldor_home_settings_id();
	$taken    = array_merge( goldor_rendered_post_ids(), array( goldor_top_story_id() ) );
	$slots    = array();

	for ( $slot = 1; $slot <= $count; $slot++ ) {
		$post_id = (int) get_post_meta( $settings, 'spalte_beitrag_' . $slot, true );
		// On a translated page the choice follows to its translation, if any.
		$post_id = $post_id ? (int) apply_filters( 'wpml_object_id', $post_id, get_post_type( $post_id ), false ) : 0;

		if ( $post_id && 'publish' === get_post_status( $post_id ) && in_array( get_post_type( $post_id ), array( 'post', 'artikel' ), true ) && ! in_array( $post_id, $taken, true ) ) {
			$slots[ $slot ] = $post_id;
			$taken[]        = $post_id;
		}
	}

	$missing = $count - count( $slots );
	$newest  = ! $missing ? array() : get_posts(
		array(
			'post_type'        => 'post',
			'posts_per_page'   => $missing,
			'fields'           => 'ids',
			'no_found_rows'    => true,
			'suppress_filters' => false,
			'post__not_in'     => $taken,
			// Posts that never had the flag set have no `topstory` row at all.
			'meta_query'       => array(
				'relation' => 'OR',
				array( 'key' => 'topstory', 'compare' => 'NOT EXISTS' ),
				array( 'key' => 'topstory', 'value' => '1', 'compare' => '!=' ),
			),
		)
	);

	for ( $slot = 1; $slot <= $count; $slot++ ) {
		if ( ! isset( $slots[ $slot ] ) && $newest ) {
			$slots[ $slot ] = array_shift( $newest );
		}
	}

	ksort( $slots );
	return array_values( $slots );
}

/**
 * The posts picked for "Von der Redaktion empfohlen", in the editors' order, without any
 * that were unpublished since. On a translated page each follows to its
 * translation; one without a translation drops out.
 */
function goldor_home_editor_picks() {
	$picked = get_post_meta( goldor_home_settings_id(), 'redaktion_empfohlen', true );
	$posts  = array();

	foreach ( is_array( $picked ) ? $picked : array() as $post_id ) {
		$post_id = (int) $post_id;
		$post_id = $post_id ? (int) apply_filters( 'wpml_object_id', $post_id, get_post_type( $post_id ), false ) : 0;

		if ( $post_id && 'publish' === get_post_status( $post_id ) && in_array( get_post_type( $post_id ), GOLDOR_HOME_PICKS_TYPES, true ) && ! in_array( $post_id, $posts, true ) ) {
			$posts[] = $post_id;
		}
	}

	return array_slice( $posts, 0, GOLDOR_HOME_PICKS_MAX );
}
