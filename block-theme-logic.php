<?php
/**
 * Block-theme backend logic: custom post types, taxonomies, meta, dynamic
 * blocks, and small helpers shared by the theme's dynamic blocks.
 *
 * @package goldor
 */

function goldor_block_register_post_types() {
	$types = array(
		'artikel'      => array(
			'label'       => __( 'Artikel', 'goldor' ),
			'menu_icon'   => 'dashicons-media-document',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'artikel' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'artikel-kategorie', 'post_tag' ),
		),
		'print'        => array(
			'label'       => __( 'Print', 'goldor' ),
			'menu_icon'   => 'dashicons-media-text',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'print' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'print-kategorie', 'post_tag' ),
		),
		'vsgu-news'    => array(
			'label'       => __( 'Personen', 'goldor' ),
			'menu_icon'   => 'dashicons-admin-post',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'personen' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'vsgu-news-kategorie', 'post_tag' ),
		),
		'magazin'      => array(
			'label'       => __( 'Magazin', 'goldor' ),
			'menu_icon'   => 'dashicons-book',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'magazin' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
		),
		'kalender'     => array(
			'label'       => __( 'Kalender', 'goldor' ),
			'menu_icon'   => 'dashicons-calendar-alt',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'kalender' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'kalender-kategorie', 'post_tag' ),
		),
		'job'          => array(
			'label'       => __( 'Jobs', 'goldor' ),
			'menu_icon'   => 'dashicons-businessperson',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'jobs' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'job-kategorie', 'post_tag' ),
		),
		'kleinanzeige' => array(
			'label'       => __( 'Kleinanzeigen', 'goldor' ),
			'menu_icon'   => 'dashicons-store',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'anzeigen' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'kleinanzeige-kategorie', 'post_tag' ),
		),
		'lieferant'    => array(
			'label'       => __( 'Lieferanten', 'goldor' ),
			'menu_icon'   => 'dashicons-groups',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'lieferanten' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'lieferant-kategorie', 'post_tag' ),
		),
		'wiki'         => array(
			'label'       => __( 'Wiki', 'goldor' ),
			'menu_icon'   => 'dashicons-lightbulb',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'wiki' ),
			'supports'    => array( 'title', 'editor', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'wiki-kategorie', 'post_tag' ),
		),
		'link'         => array(
			'label'       => __( 'Links', 'goldor' ),
			'menu_icon'   => 'dashicons-admin-links',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'links' ),
			'supports'    => array( 'title', 'revisions' ),
			'taxonomies'  => array( 'link-kategorie' ),
		),
		'werbung'      => array(
			'label'       => __( 'Werbung', 'goldor' ),
			'menu_icon'   => 'dashicons-visibility',
			'public'      => true,
			'show_in_rest' => true,
			'show_ui'     => true,
			'supports'    => array( 'title', 'revisions' ),
		),
	);

	foreach ( $types as $slug => $args ) {
		register_post_type( $slug, $args );
	}
}
add_action( 'init', 'goldor_block_register_post_types', 0 );

function goldor_block_register_taxonomies() {
	$taxonomies = array(
		'artikel-kategorie'      => array( 'artikel' ),
		'print-kategorie'        => array( 'print' ),
		'vsgu-news-kategorie'    => array( 'vsgu-news' ),
		'kalender-kategorie'     => array( 'kalender' ),
		'job-kategorie'          => array( 'job' ),
		'kleinanzeige-kategorie' => array( 'kleinanzeige' ),
		'lieferant-kategorie'    => array( 'lieferant' ),
		'wiki-kategorie'         => array( 'wiki' ),
		'link-kategorie'         => array( 'link' ),
	);

	foreach ( $taxonomies as $taxonomy => $objects ) {
		register_taxonomy(
			$taxonomy,
			$objects,
			array(
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => $taxonomy ),
				'label'             => ucfirst( str_replace( '-', ' ', $taxonomy ) ),
			)
		);
	}
}
add_action( 'init', 'goldor_block_register_taxonomies', 0 );

function goldor_block_register_meta() {
	$meta_fields = array(
		'paywall'    => array( 'object_type' => array( 'artikel' ), 'type' => 'boolean' ),
		'Typ'        => array( 'object_type' => array( 'werbung' ), 'type' => 'string' ),
		'aktiv'      => array( 'object_type' => array( 'werbung' ), 'type' => 'boolean' ),
		'werbemittel' => array( 'object_type' => array( 'werbung' ), 'type' => 'integer' ),
		'url'        => array( 'object_type' => array( 'werbung', 'kleinanzeige', 'link' ), 'type' => 'string' ),
		'topentry'   => array( 'object_type' => array( 'artikel', 'kalender', 'vsgu-news' ), 'type' => 'boolean' ),
		'topstory'   => array( 'object_type' => array( 'post', 'artikel' ), 'type' => 'boolean' ),
		'ausgabe'    => array( 'object_type' => array( 'artikel', 'print' ), 'type' => 'string' ),
		'startdatum' => array( 'object_type' => array( 'kalender' ), 'type' => 'string' ),
		'enddatum'   => array( 'object_type' => array( 'kalender' ), 'type' => 'string' ),
		'ort'        => array( 'object_type' => array( 'kalender' ), 'type' => 'string' ),
		'website'    => array( 'object_type' => array( 'lieferant' ), 'type' => 'string' ),
		'email'      => array( 'object_type' => array( 'lieferant' ), 'type' => 'string' ),
		'phone'      => array( 'object_type' => array( 'lieferant' ), 'type' => 'string' ),
		'epaper'     => array( 'object_type' => array( 'magazin' ), 'type' => 'string' ),
	);

	foreach ( $meta_fields as $meta_key => $args ) {
		foreach ( (array) $args['object_type'] as $object_type ) {
			register_post_meta(
				$object_type,
				$meta_key,
				array(
					'type'         => $args['type'],
					'single'       => true,
					'show_in_rest' => true,
				)
			);
		}
	}
}
add_action( 'init', 'goldor_block_register_meta', 20 );

/**
 * A dedicated inserter category for the theme's dynamic blocks.
 */
function goldor_block_categories( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'goldor',
				'title' => __( 'Goldor', 'goldor' ),
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'goldor_block_categories' );

/**
 * Dynamic block loader. Every inc/blocks/{name}/ directory with a block.json
 * is registered; edit.js (if present) is pre-registered as a plain script
 * handle so blocks work with zero build step.
 */
function goldor_register_blocks() {
	foreach ( glob( get_template_directory() . '/inc/blocks/*', GLOB_ONLYDIR ) as $dir ) {
		$name    = basename( $dir );
		$edit_js = $dir . '/edit.js';

		if ( file_exists( $edit_js ) ) {
			wp_register_script(
				"goldor-block-{$name}-edit",
				get_template_directory_uri() . "/inc/blocks/{$name}/edit.js",
				array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render', 'wp-i18n' ),
				filemtime( $edit_js ),
				true
			);
		}

		register_block_type( $dir );
	}
}
add_action( 'init', 'goldor_register_blocks' );

/**
 * Resolve the current front-end language without hard-depending on WPML.
 */
function goldor_current_language() {
	if ( defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE ) {
		return ICL_LANGUAGE_CODE;
	}

	if ( has_filter( 'wpml_current_language' ) ) {
		$language = apply_filters( 'wpml_current_language', null );
		if ( $language ) {
			return $language;
		}
	}

	return substr( get_locale(), 0, 2 );
}

/**
 * Whether the current visitor may read the full artikel content, or should
 * see the paywall teaser instead.
 */
function goldor_block_should_show_article_full_content( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();

	if ( 'artikel' !== get_post_type( $post_id ) ) {
		return true;
	}

	if ( is_user_logged_in() ) {
		return true;
	}

	$paywall = get_post_meta( $post_id, 'paywall', true );
	return empty( $paywall );
}

/**
 * Fetch one active `werbung` (ad) entry of the given type.
 */
function goldor_block_get_active_ad( $type = 'Skyscraper' ) {
	$ad_query = new WP_Query(
		array(
			'post_type'      => 'werbung',
			'posts_per_page' => 1,
			'post_status'    => 'publish',
			'no_found_rows'  => true,
			'meta_query'     => array(
				array( 'key' => 'Typ', 'value' => $type, 'compare' => '=' ),
				array( 'key' => 'aktiv', 'value' => '1', 'compare' => '=' ),
			),
		)
	);

	if ( ! $ad_query->have_posts() ) {
		return null;
	}

	$ad_query->the_post();
	$thumb_id = get_post_meta( get_the_ID(), 'werbemittel', true );
	$image    = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'full' ) : false;
	$url      = get_post_meta( get_the_ID(), 'url', true );

	$ad = array(
		'id'    => get_the_ID(),
		'title' => get_the_title(),
		'url'   => $url ? goldor_normalize_url( $url ) : '',
		'image' => $image ? $image[0] : '',
	);
	wp_reset_postdata();

	return $ad;
}

/**
 * Legacy ad/link meta stores bare domains (e.g. "example.com"); make sure we
 * always link to a real absolute URL.
 */
function goldor_normalize_url( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return '';
	}
	if ( ! preg_match( '#^https?://#i', $url ) ) {
		$url = 'https://' . $url;
	}
	return esc_url( $url );
}

/**
 * Featured image URL with a graceful fallback image, since
 * wp_get_attachment_image_src() has no reliable filter hook for posts that
 * have no thumbnail at all.
 */
function goldor_post_thumbnail_url( $post_id, $size = 'medium' ) {
	$thumb_id = get_post_thumbnail_id( $post_id );
	if ( $thumb_id ) {
		$src = wp_get_attachment_image_src( $thumb_id, $size );
		if ( $src ) {
			return $src[0];
		}
	}
	return get_template_directory_uri() . '/img/Fallback_Thumbnail.jpg';
}

/**
 * The category/type badge terms for a post: WordPress categories for `post`,
 * otherwise the post type's own `{post_type}-kategorie` taxonomy.
 */
function goldor_post_terms( $post_id ) {
	$post_type = get_post_type( $post_id );
	if ( 'post' === $post_type ) {
		return get_the_category( $post_id );
	}
	$taxonomy = $post_type . '-kategorie';
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return array();
	}
	return wp_get_post_terms( $post_id, $taxonomy, array( 'orderby' => 'name', 'order' => 'ASC' ) );
}

/**
 * Shared "card" markup used by the homepage picks and related-posts blocks.
 */
function goldor_render_grid_item( $post_id ) {
	$post_type  = get_post_type( $post_id );
	$link       = get_permalink( $post_id );
	$thumb      = goldor_post_thumbnail_url( $post_id );
	$categories = goldor_post_terms( $post_id );

	ob_start();
	?>
	<div class="grid-item">
		<div class="item-image" style="background-image:url(<?php echo esc_url( $thumb ); ?>)" onclick="location.href='<?php echo esc_js( $link ); ?>'">
			<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
				<span class="item-category"><?php echo esc_html( $categories[0]->name ); ?></span>
			<?php endif; ?>
			<?php if ( 'artikel' === $post_type && get_post_meta( $post_id, 'paywall', true ) ) : ?>
				<div class="item-paywall">&nbsp;</div>
			<?php endif; ?>
		</div>
		<a href="<?php echo esc_url( $link ); ?>"><h2><?php echo esc_html( get_the_title( $post_id ) ); ?></h2></a>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * "Add to calendar" download for a kalender event, built from the event's
 * own sanitized post meta rather than raw request input.
 */
function goldor_handle_ical_download() {
	if ( ! isset( $_GET['goldor_ical'] ) ) {
		return;
	}

	$event_id = absint( $_GET['goldor_ical'] );
	if ( ! $event_id || 'kalender' !== get_post_type( $event_id ) || 'publish' !== get_post_status( $event_id ) ) {
		return;
	}

	$start = get_post_meta( $event_id, 'startdatum', true );
	if ( ! preg_match( '/^\d{8}$/', $start ) ) {
		return;
	}
	$end = get_post_meta( $event_id, 'enddatum', true );
	if ( ! preg_match( '/^\d{8}$/', $end ) ) {
		$end = $start;
	}

	$escape = function ( $text ) {
		return addcslashes( wp_strip_all_tags( (string) $text ), ",;\\" );
	};

	$ical  = "BEGIN:VCALENDAR\r\n";
	$ical .= "VERSION:2.0\r\n";
	$ical .= "PRODID:-//goldor//kalender//EN\r\n";
	$ical .= "BEGIN:VEVENT\r\n";
	$ical .= 'UID:' . $event_id . '-' . md5( $start ) . "@goldor.ch\r\n";
	$ical .= 'DTSTAMP:' . gmdate( 'Ymd\THis\Z' ) . "\r\n";
	$ical .= 'DTSTART;VALUE=DATE:' . $start . "\r\n";
	$ical .= 'DTEND;VALUE=DATE:' . $end . "\r\n";
	$ical .= 'SUMMARY:' . $escape( get_the_title( $event_id ) ) . "\r\n";
	$ical .= 'DESCRIPTION:' . $escape( get_the_excerpt( $event_id ) ) . "\r\n";
	$ical .= "END:VEVENT\r\n";
	$ical .= "END:VCALENDAR\r\n";

	nocache_headers();
	header( 'Content-Type: text/calendar; charset=utf-8' );
	header( 'Content-Disposition: inline; filename=kalender.ics' );
	echo $ical; // phpcs:ignore WordPress.Security.EscapeOutput
	exit;
}
add_action( 'template_redirect', 'goldor_handle_ical_download' );
