<?php

// EXTEND BACKEND STYLES
add_action('init', function () {
    register_block_style('core/columns', [
        'name' => 'gap--small',
        'label' => __('Schmaler Abstand zwischen Spalten', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/columns', [
        'name' => 'gap--small-location',
        'label' => __('Spalten für Standorte', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/columns', [
        'name' => 'overlapping--right-1',
        'label' => __('randabfallend rechts', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/columns', [
        'name' => 'overlapping--right-2',
        'label' => __('randabfallend links', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/paragraph', [
        'name' => 'lead',
        'label' => __('Medium', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--check-circle',
        'label' => __('Icon-Liste', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--download',
        'label' => __('Download-Liste', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--linklist',
        'label' => __('Link-Liste', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--singlelink',
        'label' => __('Link mit Pfeil', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--markergreen',
        'label' => __('Adress-Block (Marker grün)', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--markerorange',
        'label' => __('Adress-Block (Marker orange)', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--markeryellow',
        'label' => __('Adress-Block (Marker gelb)', 'rocketpager'),
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
            background: #7BA048;
            border-color: #7BA048;
        }
    </style>
<?php });

// THEME-COLOR FÜR HEADER EINFÄRBEN
add_action('wp_head', function () { ?>
    <meta name="theme-color" content="#7BA048" />
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
            $output .= "\n$indent<div class='absolute w-full z-10 mt-[34px] transform transition-all opacity-0 translate-y-1 hidden before:absolute before:border-y-2 before:border-solid before:border-gray-300 before:inset-y-0 before:-left-[100vw] before:-right-[100vw] before:bg-secondary'><ul class='menu-primary_subnavigation z-20 flex flex-col min-w-max my-12'>\n";
        }
        function end_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul></div>\n";
        }
    }
}


// Nur Haupt-Navigation (ohne Sub-Menüs)
add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
    if (has_nav_menu('primary_navigation')) {
        //Only add class to 'top level' items on the 'primary' menu.
        if ('primary_navigation' == $args->theme_location && $depth === 0) {
            if (in_array("menu-item-has-children", $item->classes)) {
                $subMenuParentClasses = "text-primary group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500";
                $classes = explode(" ", $subMenuParentClasses);
                $item->classes = $classes;
                $output = "<div class='relative inline-flex items-center'>" . $output;
                $output .= '<svg class="text-darkgrey ml-2 h-5 w-5 group-hover:text-primary transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg></div>';
            }
        }
    }
    return $output;
}, 10, 4);


add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
    if (isset($args->add_li_class)) {
        if ($args->depth === 0) {
            $classes[] = $args->add_li_class;
        }
    }
    if (isset($args->add_sub_li_class)) {
        if ($depth === 1) {
            $classes[] = $args->add_sub_li_class;
        }
    }
    return $classes;
}, 1, 4);