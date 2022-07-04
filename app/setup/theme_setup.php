<?php

// EXTEND BACKEND STYLES
add_action('init', function () {
    register_block_style('core/heading', [
        'name' => 'title_style-2',
        'label' => __('Titel Stil 2', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--check',
        'label' => __('Liste mit Icon Check', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--check-circle',
        'label' => __('Liste mit Icon Check-Circle', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--arrow-right',
        'label' => __('Liste mit Icon Pfeil rechts 1', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--long-arrow-right',
        'label' => __('Liste mit Icon Pfeil rechts 2', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--angle-right',
        'label' => __('Liste mit Icon Pfeil rechts 3', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--dot-circle',
        'label' => __('Liste mit Icon Punkt', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--external-link',
        'label' => __('Liste mit Icon External Link', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--file-pdf',
        'label' => __('Liste mit Icon PDF', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--download',
        'label' => __('Liste mit Icon Download', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--star',
        'label' => __('Liste mit Icon Stern', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
});

// ADD LOGO TO LOGIN PAGE
add_action('login_enqueue_scripts', function () { ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('../images/rocket/logo-rocket-pink.svg');
            height: 100px;
            width: 320px;
            background-size: 320px 100px;
            margin: 0;
            background-repeat: no-repeat;
            padding-bottom: 10px;
            box-shadow: none;
        }

        .wp-core-ui #login .button-primary,
        .wp-core-ui #login .button-primary.active,
        .wp-core-ui #login .button-primary.active:focus,
        .wp-core-ui #login .button-primary.active:hover,
        .wp-core-ui #login .button-primary:active {
            background: #FF0096;
            border-color: #FF0096;
        }
    </style>
<?php });

// THEME-COLOR FÜR HEADER EINFÄRBEN
add_action('wp_head', function () { ?>
    <meta name="theme-color" content="#ff0096" />
<?php });

// USE HOME URL FOR LOGIN PAGE
add_filter('login_headerurl', function () {
    return home_url();
});


// ADD NEW IMAGE-SIZES
add_image_size('16-9-thumb-small', 354, 199, $crop = true);
add_image_size('16-9-thumb', 768, 432, $crop = true);
add_image_size('4-3-thumb', 768, 576, $crop = true);
add_image_size('small-crop', 300, 300, $crop = true);
add_image_size('medium-crop', 600, 600, $crop = true);
add_image_size('square-thumb', 768, 768, $crop = true);
add_image_size('slider-width', 1920, 450, $crop = true);
add_image_size('small-width', 200, 200);
add_image_size('medium-width', 768, 768);
add_image_size('medium-large-width', 800, 800);
add_image_size('large-width', 920, 920);
add_image_size('full-width', 1140, 1140);


// Menu Setup
if (!class_exists('SubmenuWrap')) {
    class SubmenuWrap extends Walker_Nav_Menu
    {
        function start_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='absolute w-full z-10 -ml-4 mt-3 transform transition-all opacity-0 translate-y-1'><div class='rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden z-20'><ul class='flex flex-col space-y-1 bg-white'>\n";
        }
        function end_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul></div></div>\n";
        }
    }
}




// Nur Haupt-Navigation (ohne Sub-Menüs)

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
    if (has_nav_menu('primary_navigation')) {
        //Only add class to 'top level' items on the 'primary' menu.
        if ('primary_navigation' == $args->theme_location && $depth === 0) {
            if (in_array("menu-item-has-children", $item->classes)) {
                $subMenuParentClasses = "text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500";
                $classes = explode(" ", $subMenuParentClasses);
                $item->classes = $classes;
                $output = "<div class='relative inline-flex items-center'>" . $output;
                $output .= '<svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg></div>';
            }
        }
    }
    return $output;
}, 10, 4);


add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
    if ('primary_navigation' === $args->theme_location) {
        if (isset($args->add_li_class)) {
            if ($args->depth === 0) {
                $classes[] = $args->add_li_class;
            }
        }
        if (isset($args->add_li_class)) {
            if ($depth === 1) {
                $classes[] = $args->add_sub_li_class;
            }
        }
    }
    return $classes;
}, 1, 4);