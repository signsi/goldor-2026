<?php

// EXTEND BACKEND STYLES
add_action('init', function () {
    // Button-Styles
    register_block_style('core/button', [
        'name' => 'default-animated',
        'label' => __('Füllen (animiert)', 'rocketpager'),
    ]);
    register_block_style('core/button', [
        'name' => 'outline-white',
        'label' => __('Outline weiss', 'rocketpager'),
    ]);
    register_block_style('core/button', [
        'name' => 'outline-white-animated',
        'label' => __('Outline weiss (animiert)', 'rocketpager'),
    ]);
    register_block_style('core/buttons', [
        'name' => 'offsetY-Button',
        'label' => __('Button nach unten versetzt', 'rocketpager'),
    ]);

    // Table-Styles
    register_block_style('core/table', [
        'name' => 'tableWhite',
        'label' => __('Tabelle weiss', 'rocketpager'),
    ]);
    register_block_style('core/table', [
        'name' => 'finzanz-4-col',
        'label' => __('Finanz (4 Spalten', 'rocketpager'),
    ]);

    // Columns
    register_block_style('core/columns', [
        'name' => 'hasHoverEffect-1',
        'label' => __('Outline-Effekt', 'rocketpager'),
    ]);
    register_block_style('core/columns', [
        'name' => 'offsetY-Column',
        'label' => __('Spalte 50% nach unten versetzt', 'rocketpager'),
    ]);

    // List-Styles
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-left',
        'label' => __('Icon - Pfeil links (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-right',
        'label' => __('Icon - Pfeil rechts (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-down',
        'label' => __('Icon - Pfeil unten (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-left-long',
        'label' => __('Icon - langer Pfeil links (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-right-long',
        'label' => __('Icon - langer Pfeil rechts (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-down-long',
        'label' => __('Icon - langer Pfeil unten (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--circle-check',
        'label' => __('Icon - Check (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-start--arrow-down-to-line',
        'label' => __('Icon - Download (links vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--arrow-right',
        'label' => __('Icon - Pfeil rechts (rechts vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--arrow-down',
        'label' => __('Icon - Pfeil unten (rechts vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--arrow-right-long',
        'label' => __('Icon - langer Pfeil rechts (rechts vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--arrow-down-long',
        'label' => __('Icon - langer Pfeil unten (rechts vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--circle-check',
        'label' => __('Icon - Check (rechts vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--arrow-down-to-line',
        'label' => __('Icon - Download (rechts vom Text)', 'rocketpager'),
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon-end--arrow-down-to-line--bordered',
        'label' => __('Icon - Download mit Rahmen (rechts vom Text)', 'rocketpager'),
    ]);
});

// ADD LOGO TO LOGIN PAGE

// TODO: braucht es das noch oder ist das nicht direkt im branda?
add_action('login_enqueue_scripts', function () { ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo \Roots\asset('images/logo-rocket-pink.svg')->uri(); ?>');
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
            background: #E53087;
            border-color: #E53087;
            color: #fff;
        }
    </style>
<?php });

// USE HOME URL FOR LOGIN PAGE
add_filter('login_headerurl', function () {
    return home_url();
});


// ADD NEW IMAGE-SIZES
add_image_size('16-9-thumb', 768, 432, $crop = true);
add_image_size('4-3-thumb', 768, 576, $crop = true);
add_image_size('small-crop', 300, 300, $crop = true);
add_image_size('medium-crop', 600, 600, $crop = true);
add_image_size('square-thumb', 768, 768, $crop = true);
add_image_size('small-width', 200, 200);
add_image_size('medium-width', 768, 768);
add_image_size('full-width', 1140, 1140);


// Menu Setup
if (!class_exists('SubmenuWrap')) {
    class SubmenuWrap extends Walker_Nav_Menu
    {
        function start_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='submenuContainer hideSubMenu relative left-0 top-0 lg:absolute mt-2 lg:mt-[calc(theme(height.menu-items)+theme(spacing.small))] w-full z-10 transform transition-all duration-700 ease-in-out'><ul class='z-20 flex flex-col menu-primary_subnavigation space-y-3 lg:space-y-0 bg-greylight p-rp-40 my-0 lg:min-w-max'>\n";
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
                $subMenuParentClasses = "text-primary group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary";
                $classes = explode(" ", $subMenuParentClasses);
                $item->classes = $classes;
                $output = "<div class='relative flex items-center justify-between'>" . $output;
                $output .= '<span class="sr-only">Open submenu</span><svg class="submenuToggle hover:cursor-pointer bg-transparent rounded-md lg:p-0 ml-0 lg:ml-1 xl:ml-2 lg:border-0 inline-flex items-center justify-center h-10 w-10 lg:w-5 lg:h-5 p-1.5 text-white lg:text-primary lg:group-hover:text-tertiary group-hover:bg-primary lg:group-hover:bg-transparent lg:group-hover:border-0 lg:group-hover:border-transparent transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>';
            }
        }
    }
    return $output;
}, 10, 4);


add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
    if ('primary_navigation' === $args->theme_location) {
        if (isset($args->add_li_class)) {
            if ($depth === 0) {
                $classes[] = $args->add_li_class;
            }
        }
        if (isset($args->add_sub_li_class)) {
            if ($depth === 1) {
                $classes[] = $args->add_sub_li_class;
            }
        }
    }
    else{
        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }
    }
    return $classes;
}, 1, 4);


// Entfernt -wp-container-{id}
// remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
// remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
