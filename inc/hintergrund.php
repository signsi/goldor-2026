<?php
/**
 * Page background: an image behind the whole site, switched on or off and
 * swapped under Settings → Reading. The default ships with the theme; a
 * media library image replaces it.
 *
 * @package goldor
 */

function goldor_page_background_enabled() {
	return (bool) get_option( 'goldor_page_background', true );
}

function goldor_page_background_url() {
	$image_id = (int) get_option( 'goldor_page_background_image', 0 );
	$url      = $image_id ? wp_get_attachment_image_url( $image_id, 'full' ) : '';

	return $url ? $url : get_template_directory_uri() . '/img/seiten-hintergrund.jpg';
}

function goldor_page_background_setting() {
	register_setting(
		'reading',
		'goldor_page_background',
		array(
			'type'              => 'boolean',
			'default'           => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
		)
	);

	register_setting(
		'reading',
		'goldor_page_background_image',
		array(
			'type'              => 'integer',
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	add_settings_field(
		'goldor_page_background',
		__( 'Seitenhintergrund', 'goldor' ),
		function () {
			printf(
				'<input type="hidden" name="goldor_page_background" value="0"><label><input type="checkbox" name="goldor_page_background" value="1" %1$s> %2$s</label>',
				checked( goldor_page_background_enabled(), true, false ),
				esc_html__( 'Hintergrundbild auf der ganzen Website anzeigen', 'goldor' )
			);
			printf(
				'<p><img id="goldor-page-background-preview" src="%1$s" data-default="%2$s" alt="" style="display:block;width:240px;height:auto;margin:10px 0"></p>',
				esc_url( goldor_page_background_url() ),
				esc_url( get_template_directory_uri() . '/img/seiten-hintergrund.jpg' )
			);
			printf(
				'<input type="hidden" id="goldor-page-background-image" name="goldor_page_background_image" value="%1$d"><button type="button" class="button" id="goldor-page-background-choose">%2$s</button> <button type="button" class="button-link" id="goldor-page-background-reset">%3$s</button>',
				(int) get_option( 'goldor_page_background_image', 0 ),
				esc_html__( 'Bild ändern', 'goldor' ),
				esc_html__( 'Standardbild verwenden', 'goldor' )
			);
		},
		'reading'
	);
}
add_action( 'admin_init', 'goldor_page_background_setting' );

function goldor_page_background_admin_assets( $hook ) {
	if ( 'options-reading.php' !== $hook ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'goldor-page-background-admin',
		get_template_directory_uri() . '/assets/page-background-admin.js',
		array(),
		'1.0',
		true
	);
}
add_action( 'admin_enqueue_scripts', 'goldor_page_background_admin_assets' );

function goldor_page_background_style() {
	if ( goldor_page_background_enabled() ) {
		wp_add_inline_style( 'goldor-style', sprintf( ':root{--gd-page-background:url("%s")}', esc_url_raw( goldor_page_background_url() ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'goldor_page_background_style', 20 );

function goldor_page_background_body_class( $classes ) {
	if ( goldor_page_background_enabled() ) {
		$classes[] = 'has-page-background';
	}
	return $classes;
}
add_filter( 'body_class', 'goldor_page_background_body_class' );

/*
 * Every cached page carries the background, so a change empties the whole
 * cache. A first save adds the option instead of updating it.
 */
function goldor_page_background_purge() {
	do_action( 'litespeed_purge_all' );
}
add_action( 'add_option_goldor_page_background', 'goldor_page_background_purge' );
add_action( 'update_option_goldor_page_background', 'goldor_page_background_purge' );
add_action( 'add_option_goldor_page_background_image', 'goldor_page_background_purge' );
add_action( 'update_option_goldor_page_background_image', 'goldor_page_background_purge' );
