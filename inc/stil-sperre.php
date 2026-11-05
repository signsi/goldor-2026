<?php
/**
 * The design lives in code: blocks can be moved and filled in the editor, but
 * not restyled. theme.json switches off the block controls; this file covers
 * what it can't reach, the Styles section and the preset pickers.
 *
 * @package goldor
 */

/*
 * Presets stay in theme.json because the stylesheet needs their variables;
 * only the editor's pickers lose them.
 */
function goldor_lock_style_pickers( $settings ) {
	$settings['__experimentalFeatures']['color']['palette']           = array();
	$settings['__experimentalFeatures']['typography']['fontSizes']    = array();
	$settings['__experimentalFeatures']['typography']['fontFamilies'] = array();
	return $settings;
}
add_filter( 'block_editor_settings_all', 'goldor_lock_style_pickers' );

/**
 * Styles from the database never reach the page, so what is in theme.json and
 * style.css is what shows.
 */
function goldor_ignore_saved_styles() {
	return new WP_Theme_JSON_Data( array( 'version' => WP_Theme_JSON::LATEST_SCHEMA ), 'custom' );
}
add_filter( 'wp_theme_json_data_user', 'goldor_ignore_saved_styles' );

function goldor_refuse_style_changes( $result, $server, $request ) {
	if ( 'GET' !== $request->get_method() && 0 === strpos( $request->get_route(), '/wp/v2/global-styles' ) ) {
		return new WP_Error( 'goldor_styles_locked', __( 'Das Design wird im Theme gepflegt.', 'goldor' ), array( 'status' => 403 ) );
	}
	return $result;
}
add_filter( 'rest_pre_dispatch', 'goldor_refuse_style_changes', 10, 3 );

function goldor_refuse_custom_css( $caps, $cap ) {
	return 'edit_css' === $cap ? array( 'do_not_allow' ) : $caps;
}
add_filter( 'map_meta_cap', 'goldor_refuse_custom_css', 10, 2 );

function goldor_hide_styles_section( $hook ) {
	if ( 'site-editor.php' === $hook ) {
		wp_add_inline_style( 'wp-edit-site', '#global-styles-navigation-item,button[aria-controls="edit-site:global-styles"]{display:none}' );
	}
}
add_action( 'admin_enqueue_scripts', 'goldor_hide_styles_section', 20 );
