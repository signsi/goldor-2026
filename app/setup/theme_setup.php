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



// Menu Setup

if (!class_exists('SubmenuWrap')) {
    class SubmenuWrap extends Walker_Nav_Menu
    {
        function start_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='absolute z-10 -ml-4 mt-3 transform w-screen max-w-md lg:max-w-3xl transition-all opacity-0 translate-y-1'><div class='rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden'><ul class='relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2'>\n";
        }
        function end_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul></div></div>\n";
        }
    }
}

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
    if (has_nav_menu('primary_navigation')) {
        //Only add class to 'top level' items on the 'primary' menu.
        if ('primary_navigation' == $args->theme_location && $depth === 0) {
            if (in_array("menu-item-has-children", $item->classes)) {
                $subMenuParentClasses = "text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500";
                $classes = explode(" ", $subMenuParentClasses);
                $item->classes = $classes;
                // print_r($item->classes);
                $output = "<div class='relative inline-flex items-center'>" . $output;
                $output .= '<svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg></div>';
            }
        }
    }
    return $output;
}, 10, 4);


add_filter('nav_menu_css_class', function ($classes, $item, $args) {
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}, 1, 3);
