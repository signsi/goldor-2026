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
            $output .= "\n$indent<div class='absolute w-full z-10 -ml-4 mt-3 transform transition-all opacity-0 translate-y-1'><div class='rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden z-20'><ul class='flex flex-col space-y-1'>\n";
        }
        function end_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul></div></div>\n";
        }

        function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
        {
            // Restores the more descriptive, specific name for use within this method.
            $menu_item = $data_object;

            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ($depth) ? str_repeat($t, $depth) : '';

            $classes   = empty($menu_item->classes) ? array() : (array) $menu_item->classes;
            $classes[] = 'menu-item-' . $menu_item->ID;

            /**
             * Filters the arguments for a single nav menu item.
             *
             * @since 4.4.0
             *
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param WP_Post  $menu_item Menu item data object.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

            /**
             * Filters the CSS classes applied to a menu item's list item element.
             *
             * @since 3.0.0
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
             * @param WP_Post  $menu_item The current menu item object.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */

            if ('primary_navigation' === $args->theme_location) {
                // if (isset($args->add_li_class)) {
                // print_r($args);
                if ($args->depth === 0) {
                    //$classes[] = $args->add_li_class;
                    $classes[] = "ABC";
                    // array_push($classes, 'depth-' . $depth);

                }
                // }
            }

            $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';


            /**
             * Filters the ID applied to a menu item's list item element.
             *
             * @since 3.0.1
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param string   $menu_id   The ID that is applied to the menu item's `<li>` element.
             * @param WP_Post  $menu_item The current menu item.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names . '>';

            $atts           = array();
            $atts['title']  = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
            $atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
            if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
                $atts['rel'] = 'noopener';
            } else {
                $atts['rel'] = $menu_item->xfn;
            }
            $atts['href']         = !empty($menu_item->url) ? $menu_item->url : '';
            $atts['aria-current'] = $menu_item->current ? 'page' : '';

            /**
             * Filters the HTML attributes applied to a menu item's anchor element.
             *
             * @since 3.6.0
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param array $atts {
             *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
             *
             *     @type string $title        Title attribute.
             *     @type string $target       Target attribute.
             *     @type string $rel          The rel attribute.
             *     @type string $href         The href attribute.
             *     @type string $aria-current The aria-current attribute.
             * }
             * @param WP_Post  $menu_item The current menu item object.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (is_scalar($value) && '' !== $value && false !== $value) {
                    $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters('the_title', $menu_item->title, $menu_item->ID);

            /**
             * Filters a menu item's title.
             *
             * @since 4.4.0
             *
             * @param string   $title     The menu item's title.
             * @param WP_Post  $menu_item The current menu item object.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

            $item_output  = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            /**
             * Filters a menu item's starting output.
             *
             * The menu item's starting output only includes `$args->before`, the opening `<a>`,
             * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
             * no filter for modifying the opening and closing `<li>` for a menu item.
             *
             * @since 3.0.0
             *
             * @param string   $item_output The menu item's starting HTML output.
             * @param WP_Post  $menu_item   Menu item data object.
             * @param int      $depth       Depth of menu item. Used for padding.
             * @param stdClass $args        An object of wp_nav_menu() arguments.
             */
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
        }
    }
}




// Nur Haupt-Navigation (ohne Sub-Menüs)

// add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
//     if (has_nav_menu('primary_navigation')) {
//         //Only add class to 'top level' items on the 'primary' menu.
//         if ('primary_navigation' == $args->theme_location && $depth === 0) {
//             if (in_array("menu-item-has-children", $item->classes)) {
//                 $subMenuParentClasses = "text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500";
//                 $classes = explode(" ", $subMenuParentClasses);
//                 $item->classes = $classes;
//                 $output = "<div class='relative inline-flex items-center'>" . $output;
//                 $output .= '<svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
//             <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
//           </svg></div>';
//             }
//         }
//     }
//     return $output;
// }, 10, 4);


// add_filter('nav_menu_css_class', function ($classes, $item, $args) {
//     if ('primary_navigation' === $args->theme_location) {
//         if (isset($args->add_li_class)) {
//             if ($args->depth === 0) {
//                 $classes[] = $args->add_li_class;
//             }
//         }
//     }
//     return $classes;
// }, 1, 3);


/**
 * SubMenu Test
 */


if (!class_exists('SubMenuWalker')) {
    class SubMenuWalker extends Walker_Nav_Menu
    {
        function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
        {
            // Restores the more descriptive, specific name for use within this method.
            $menu_item = $data_object;

            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ($depth) ? str_repeat($t, $depth) : '';

            $classes   = empty($menu_item->classes) ? array() : (array) $menu_item->classes;
            $classes[] = 'menu-item-' . $menu_item->ID;

            /**
             * Filters the arguments for a single nav menu item.
             *
             * @since 4.4.0
             *
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param WP_Post  $menu_item Menu item data object.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

            /**
             * Filters the CSS classes applied to a menu item's list item element.
             *
             * @since 3.0.0
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
             * @param WP_Post  $menu_item The current menu item object.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
            // if ($args->depth == 1) {
                $class_names .= " AABBCC";
            // }
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            /**
             * Filters the ID applied to a menu item's list item element.
             *
             * @since 3.0.1
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param string   $menu_id   The ID that is applied to the menu item's `<li>` element.
             * @param WP_Post  $menu_item The current menu item.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names . '>';

            $atts           = array();
            $atts['title']  = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
            $atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
            if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
                $atts['rel'] = 'noopener';
            } else {
                $atts['rel'] = $menu_item->xfn;
            }
            $atts['href']         = !empty($menu_item->url) ? $menu_item->url : '';
            $atts['aria-current'] = $menu_item->current ? 'page' : '';

            /**
             * Filters the HTML attributes applied to a menu item's anchor element.
             *
             * @since 3.6.0
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param array $atts {
             *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
             *
             *     @type string $title        Title attribute.
             *     @type string $target       Target attribute.
             *     @type string $rel          The rel attribute.
             *     @type string $href         The href attribute.
             *     @type string $aria-current The aria-current attribute.
             * }
             * @param WP_Post  $menu_item The current menu item object.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (is_scalar($value) && '' !== $value && false !== $value) {
                    $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters('the_title', $menu_item->title, $menu_item->ID);

            /**
             * Filters a menu item's title.
             *
             * @since 4.4.0
             *
             * @param string   $title     The menu item's title.
             * @param WP_Post  $menu_item The current menu item object.
             * @param stdClass $args      An object of wp_nav_menu() arguments.
             * @param int      $depth     Depth of menu item. Used for padding.
             */
            $title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

            $item_output  = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            /**
             * Filters a menu item's starting output.
             *
             * The menu item's starting output only includes `$args->before`, the opening `<a>`,
             * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
             * no filter for modifying the opening and closing `<li>` for a menu item.
             *
             * @since 3.0.0
             *
             * @param string   $item_output The menu item's starting HTML output.
             * @param WP_Post  $menu_item   Menu item data object.
             * @param int      $depth       Depth of menu item. Used for padding.
             * @param stdClass $args        An object of wp_nav_menu() arguments.
             */
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
        }
    }
}


// add_filter('nav_menu_css_class', function ($classes, $item, $args) {

//     if ('primary_navigation' === $args->theme_location) {

//         $classes[] = "network-menu-item" . " depth-" . $args->depth;
//     }

//     return $classes;
// }, 10, 4);
