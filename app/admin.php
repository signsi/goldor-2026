<?php

/**
 * Theme admin.
 */

namespace App;

/**
 * Register capabilities manage_languages to show Language-Menu and manage_translations to show Translation-Menu of Polylang.
 *
 * @return void
 */
add_action( 'admin_menu', function() {
    if ( ! current_user_can( 'manage_options' ) && function_exists( 'PLL' ) ) {
        add_menu_page( __( 'Strings translations', 'polylang' ), __( 'Languages', 'polylang' ), 'manage_translations', 'mlang_strings', array( PLL(), 'languages_page' ), 'dashicons-translation' );
    }
} );