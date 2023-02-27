<?php

namespace App;

use function Roots\assets;



function getCustomizerOption($key)
{
    $content_mod = get_option('rocketpager_theme_options')[$key];
    return $content_mod;
}

function isNotEmpty($value)
{
    if (is_array($value)) {
        return count($value) > 0;
    } else {
        return $value;
    }
}

function crb_get_i18n_suffix() {
    $suffix = '';
    if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
        return $suffix;
    }
    $suffix = '_' . ICL_LANGUAGE_CODE;
    return $suffix;
}

function getThemeOption($field_id, $default_value = '')
{
    /**
     * getThemeOption hat einen Parameter $default_value, womit
     * man per Funktionsaufruf den Standardwert setzen kann.
     * z.B. App\getThemeOption('link', true); --> true als default Wert.
     * (So überschreiben wir den allenfalls gesetzen Kirki Standardwert)
     * Geben wir diesen nicht mit, fallen wir zurück auf die Kirki Felddefinition,
     * wo ebenfalls ein Standardwert gesetzt werden kann.
     * --> Siehe rocketpager-options -> class-rocketpager-options-admin.php
     */
    if ($field_id && function_exists('carbon_get_theme_option')) {
        return carbon_get_theme_option('rocket_' . $field_id . crb_get_i18n_suffix()) ?? carbon_get_theme_option('rocket_' . $field_id) ?? $default_value;
    }
    return false;
}

function get_jobs_option($key)
{
    if (function_exists('carbon_get_theme_option')) {
        $full_key = 'zodas_jobs_' . $key;
        $value = carbon_get_the_post_meta($full_key);
        return $value;
    } else {
        return 'CarbonFields ist nicht verfübar!';
    }
}


// TODO: function does not seem to work everywhere
//if (is_plugin_active('genesis-custom-blocks-pro/genesis-custom-blocks-pro.php')) {
function blockValueExists($key)
{
    return isNotEmpty($key);
}
//}

function pl_e($string = '')
{
    if (function_exists('pll__')) {
        $string = (pl__($string));
    }

    _e($string, 'rocketpager');
}

function pl__($string = '')
{
    if (function_exists('pll__')) {
        return __(pll__($string), 'rocketpager');
    }
    return __($string, 'rocketpager');
}

function get_home_url($path = ''){
    return esc_url(function_exists('pll_home_url') ? pll_home_url() . $path : home_url($path));
}


/*
    Die Funktion kann zum Sanitizen gebraucht werden. Default mässig werden alle nicht erlauben Tags, welche nicht in
    einem Post erlaubt sind, entfernt.
    Für die Felder von RocketPager gibt es verschiedene Kontexte, welche kurz aufgelistet werden:
    - $context = 'shortcode'    -> Feldtype 'Text' welcher Shortcode enthält
    - $context = 'inner_block'  -> Feldtype 'Inner Block'
    - $context = 'text_area'    -> Feldtype 'Classic Text'
    - $context = 'allow_iframe' -> Feldtype 'Inner Block' welcher iFrames haben darf
    - $context = 'only_iframe'  -> Feldtype 'Inner Block' welches nur iFrame enthält
*/
if (!function_exists('sanitize_out')) {
    function sanitize_out($output, $context = 'post')
    {

        $allowed_tags = array();
        $iframe_tag = array(
            'src'             => true,
            'height'          => true,
            'width'           => true,
            'frameborder'     => true,
            'allowfullscreen' => true,
            'title' => true,
        );

        $allowed_texterea_tags = array(
            'h1' => array('align' => true),
            'h2' => array('align' => true),
            'h3' => array('align' => true),
            'h4' => array('align' => true),
            'h5' => array('align' => true),
            'h6' => array('align' => true),
            'p' => array(
                'align'     => true,
                'dir'       => true,
                'lang'      => true,
                'xml:lang'  => true,
            ),
            'a' => array(
                'href' => true,
                'target' => true,
                'rel' => true
            ),
            'br' => array(),
            'span'       => array(
                'style'    => true,
                'dir'      => true,
                'align'    => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'ul' => array('type' => true),
            'ol' => array(
                'start'    => true,
                'type'     => true,
                'reversed' => true,
            ),
            'li' => array(
                'align' => true,
                'value' => true,
            ),
            'sub' => array(),
            'sup' => array(),
        );

        switch ($context) {
            case 'shortcode':
                $allowed_tags = wp_kses_allowed_html('data');
                break;
            case 'inner_block':
                $allowed_tags = wp_kses_allowed_html('post');
                break;
            case 'text_area':
                $allowed_tags = wp_kses_allowed_html('data');
                foreach ($allowed_texterea_tags as $key => $val) {
                    $allowed_tags[$key] = $val;
                }
                unset($val);
                unset($key);
                break;
            case 'allow_iframe':
                $allowed_tags = wp_kses_allowed_html('post');
                $allowed_tags['iframe'] = $iframe_tag;
                break;
            case 'only_iframe':
                $allowed_tags['iframe'] = $iframe_tag;
                break;
            default:
                $allowed_tags = wp_kses_allowed_html($context);
        }

        return wp_kses($output, $allowed_tags);
    }
}

function asset_path($asset)
{

    //return sage('assets')->getUri($asset);
}


function breadcrumbs()
{
    $delimiter = '&raquo;';
    $home = 'Home';
    $before = '<span class="current-page">';
    $after = '</span>';

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<nav class="breadcrumb max-w-default mx-auto p-gutter text-base">';

        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a class="no-underline text-primary hover:text-aubergine" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;
        } elseif (is_day()) {
            echo '<a class="" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a class="" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a class="" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a class="" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a class="" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a class="" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) {
            echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
        } elseif (is_tag()) {
            echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_404()) {
            echo $before . 'Fehler 404' . $after;
        } elseif (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo ': ' . __('Seite') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }

        echo '</nav>';
    }
}

function get_main_category()
{
    if (get_the_category()) {
        return get_the_category()[0];
    } else {
        // fallback
        return (object)[
            'name' => 'Keine'
        ];
    }
}

function get_main_category_name()
{
    return get_main_category()->name;
}

function get_categories_by_post_type($post_type, $args = '')
{
    $exclude = array();
    //check all categories and exclude
    foreach (get_categories($args) as $category) {
        $posts = get_posts(array('post_type' => $post_type, 'category' => $category->cat_ID));
        if (empty($posts)) {
            $exclude[] = $category->cat_ID;
        }
    }
    //re-evaluate args
    if (!empty($exclude)) {
        if (is_string($args)) {
            $args .= ('' === $args) ? '' : '&';
            $args .= 'exclude=' . implode(',', $exclude);
        } else {
            $args['exclude'] = $exclude;
        }
    }
    return get_categories($args);
}

if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

function is_plugin_active_and_available($plugin_slug): bool {
    return check_plugin_installed($plugin_slug) ? is_plugin_active($plugin_slug) : false;
}

function check_plugin_installed( $plugin_slug ): bool {
    $installed_plugins = get_plugins();

    return array_key_exists( $plugin_slug, $installed_plugins ) || in_array( $plugin_slug, $installed_plugins, true );
}

require_once 'block_helpers.php';
