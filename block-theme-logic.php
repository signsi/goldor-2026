<?php
/**
 * Block-theme backend logic migrated from the legacy Goldor theme.
 */

if ( ! function_exists( 'goldor_block_setup' ) ) {
	function goldor_block_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		register_nav_menus(
			array(
				'primary'   => __( 'Primary Menu', 'goldor' ),
				'secondary' => __( 'Secondary Menu', 'goldor' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'goldor_block_setup' );

function goldor_block_register_post_types() {
	$types = array(
		'artikel' => array(
			'label' => __( 'Artikel', 'goldor' ),
			'menu_icon' => 'dashicons-media-document',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'artikel' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'artikel-kategorie', 'post_tag' ),
		),
		'print' => array(
			'label' => __( 'Print', 'goldor' ),
			'menu_icon' => 'dashicons-media-text',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'print' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'print-kategorie', 'post_tag' ),
		),
		'vsgu-news' => array(
			'label' => __( 'Personen', 'goldor' ),
			'menu_icon' => 'dashicons-admin-post',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'personen' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'vsgu-news-kategorie', 'post_tag' ),
		),
		'magazin' => array(
			'label' => __( 'Magazin', 'goldor' ),
			'menu_icon' => 'dashicons-book',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'magazin' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
		),
		'kalender' => array(
			'label' => __( 'Kalender', 'goldor' ),
			'menu_icon' => 'dashicons-calendar-alt',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'kalender' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'kalender-kategorie', 'post_tag' ),
		),
		'job' => array(
			'label' => __( 'Jobs', 'goldor' ),
			'menu_icon' => 'dashicons-businessperson',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'jobs' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'job-kategorie', 'post_tag' ),
		),
		'kleinanzeige' => array(
			'label' => __( 'Kleinanzeigen', 'goldor' ),
			'menu_icon' => 'dashicons-store',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'anzeigen' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'kleinanzeige-kategorie', 'post_tag' ),
		),
		'lieferant' => array(
			'label' => __( 'Lieferanten', 'goldor' ),
			'menu_icon' => 'dashicons-groups',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'lieferanten' ),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'lieferant-kategorie', 'post_tag' ),
		),
		'wiki' => array(
			'label' => __( 'Wiki', 'goldor' ),
			'menu_icon' => 'dashicons-lightbulb',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'wiki' ),
			'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'revisions' ),
			'taxonomies' => array( 'wiki-kategorie', 'post_tag' ),
		),
		'link' => array(
			'label' => __( 'Links', 'goldor' ),
			'menu_icon' => 'dashicons-admin-links',
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'links' ),
			'supports' => array( 'title', 'revisions' ),
			'taxonomies' => array( 'link-kategorie' ),
		),
		'werbung' => array(
			'label' => __( 'Werbung', 'goldor' ),
			'menu_icon' => 'dashicons-visibility',
			'public' => true,
			'show_in_rest' => true,
			'show_ui' => true,
			'supports' => array( 'title', 'revisions' ),
		),
	);

	foreach ( $types as $slug => $args ) {
		register_post_type( $slug, $args );
	}
}
add_action( 'init', 'goldor_block_register_post_types', 0 );

function goldor_block_register_taxonomies() {
	$taxonomies = array(
		'artikel-kategorie' => array( 'artikel' ),
		'print-kategorie' => array( 'print' ),
		'vsgu-news-kategorie' => array( 'vsgu-news' ),
		'kalender-kategorie' => array( 'kalender' ),
		'job-kategorie' => array( 'job' ),
		'kleinanzeige-kategorie' => array( 'kleinanzeige' ),
		'lieferant-kategorie' => array( 'lieferant' ),
		'wiki-kategorie' => array( 'wiki' ),
		'link-kategorie' => array( 'link' ),
	);

	foreach ( $taxonomies as $taxonomy => $objects ) {
		register_taxonomy(
			$taxonomy,
			$objects,
			array(
				'hierarchical' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'show_in_rest' => true,
				'rewrite' => array( 'slug' => $taxonomy ),
				'label' => ucfirst( str_replace( '-', ' ', $taxonomy ) ),
			)
		);
	}
}
add_action( 'init', 'goldor_block_register_taxonomies', 0 );

function goldor_block_register_meta() {
	$meta_fields = array(
		'paywall' => array( 'object_type' => array( 'artikel' ), 'type' => 'boolean', 'single' => true, 'show_in_rest' => true ),
		'Typ' => array( 'object_type' => array( 'werbung' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'aktiv' => array( 'object_type' => array( 'werbung' ), 'type' => 'boolean', 'single' => true, 'show_in_rest' => true ),
		'werbemittel' => array( 'object_type' => array( 'werbung' ), 'type' => 'integer', 'single' => true, 'show_in_rest' => true ),
		'url' => array( 'object_type' => array( 'werbung', 'kleinanzeige', 'link' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'topentry' => array( 'object_type' => array( 'artikel', 'kalender', 'vsgu-news' ), 'type' => 'boolean', 'single' => true, 'show_in_rest' => true ),
		'ausgabe' => array( 'object_type' => array( 'artikel', 'print' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'startdatum' => array( 'object_type' => array( 'kalender' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'enddatum' => array( 'object_type' => array( 'kalender' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'ort' => array( 'object_type' => array( 'kalender' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'website' => array( 'object_type' => array( 'lieferant' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'email' => array( 'object_type' => array( 'lieferant' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'phone' => array( 'object_type' => array( 'lieferant' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'epaper' => array( 'object_type' => array( 'magazin' ), 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
	);

	foreach ( $meta_fields as $meta_key => $args ) {
		register_post_meta(
			$args['object_type'],
			$meta_key,
			array(
				'type' => $args['type'],
				'single' => $args['single'],
				'show_in_rest' => $args['show_in_rest'],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
	}
}
add_action( 'init', 'goldor_block_register_meta', 20 );

function goldor_block_should_show_article_full_content() {
	if ( ! is_singular( 'artikel' ) ) {
		return true;
	}

	if ( is_user_logged_in() || current_user_can( 'edit_posts' ) ) {
		return true;
	}

	$paywall = get_post_meta( get_the_ID(), 'paywall', true );
	return empty( $paywall ) || '0' === (string) $paywall || 'false' === strtolower( (string) $paywall );
}

function goldor_block_get_active_ad( $type = 'Skyscraper' ) {
	$args = array(
		'post_type' => 'werbung',
		'posts_per_page' => 1,
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => 'Typ',
				'value' => $type,
				'compare' => '=',
			),
			array(
				'key' => 'aktiv',
				'value' => '1',
				'compare' => '=',
			),
		),
	);

	$ad_query = new WP_Query( $args );
	if ( ! $ad_query->have_posts() ) {
		return null;
	}

	$ad_query->the_post();
	$ad = array(
		'id' => get_the_ID(),
		'url' => get_post_meta( get_the_ID(), 'url', true ),
		'image' => get_post_meta( get_the_ID(), 'werbemittel', true ),
		'title' => get_the_title(),
	);
	wp_reset_postdata();
	return $ad;
}
