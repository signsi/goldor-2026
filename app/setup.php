<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Main Navigation', 'rocketpager'),
        'top_navigation' => __('Top Navigation', 'rocketpager'),
        'footer_navigation_1' => __('Footer Navigation 1', 'rocketpager'),
        'footer_navigation_2' => __('Footer Navigation 2', 'rocketpager'),
        'footer_navigation_3' => __('Footer Navigation 3', 'rocketpager'),
        'disclaimer_navigation' => __('Disclaimer Navigation', 'rocketpager'),
        'language_switcher' => __('Language Navigation', 'rocketpager')
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for block styles.
    add_theme_support('wp-block-styles');

    add_theme_support('block-templates');
    
    // Enqueue editor styles.
    add_editor_style('editor-style.css');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Navigation CTA', 'rocketpager'),
        'id' => 'sidebar-cta',
        'description' =>  __('Hinzufügen CTA (Buttons) in der Hauptnavigation', 'rocketpager'),
    ] + $config);

    register_sidebar([
        'name' => __('Footer Spalte 1', 'rocketpager'),
        'id' => 'sidebar-footer-1',
        'description' =>  __('Überschreiben der ersten Spalte (Logo & Adresse). Das Widget "Footer Adresse" wird dabei auch überschrieben.', 'rocketpager'),
    ] + $config);
    register_sidebar([
        'name' => __('Footer Spalte 2', 'rocketpager'),
        'id' => 'sidebar-footer-2',
        'description' =>  __('Überschreiben der zweiten Spalt.', 'rocketpager'),
    ] + $config);
    register_sidebar([
        'name' => __('Footer Spalte 3', 'rocketpager'),
        'id' => 'sidebar-footer-3',
        'description' =>  __('Überschreiben der dritten Spalte.', 'rocketpager'),
    ] + $config);
    register_sidebar([
        'name' => __('Footer Spalte 4', 'rocketpager'),
        'id' => 'sidebar-footer-4',
        'description' =>  __('Überschreiben der vierten Spalte.', 'rocketpager'),
    ] + $config);
    register_sidebar([
        'name' => __('Footer Adresse', 'rocketpager'),
        'id' => 'sidebar-footer-address',
        'description' =>  __('Überschreiben der Adresse. Logo ist nicht betroffen', 'rocketpager'),
    ] + $config);
    register_sidebar([
        'name' => __('Footer CTA', 'rocketpager'),
        'id' => 'sidebar-footer-cta',
        'description' =>  __('Hinzufügen zusätzlicher Elemente im Footer (Bsp. Buttons)', 'rocketpager'),
    ] + $config);
});

require_once 'helpers/helpers.php';
require_once 'setup/theme_setup.php';
require_once 'setup/block_setup.php';
require_once 'setup/customization.php';
require_once 'setup/default_block_templates.php';
require_once 'setup/multilanguage_setup.php';
// require_once 'setup/custom_post_types.php';
