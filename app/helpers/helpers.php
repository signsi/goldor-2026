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
        return carbon_get_theme_option('rocket_' . $field_id) ?? $default_value;
    }
    return false;
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
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo $string;
    }
}

function pl__($string = '')
{
    if (function_exists('pll__')) {
        return pll__($string);
    }
    return $string;
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
    $before = '<span class="current-page ">';
    $after = '</span>';

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<nav class="breadcrumb max-w-content mx-auto px-4 sm:px-6">';

        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a class="" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

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
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
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

if (!function_exists('rocket_ajax_load_more')):
    function rocket_ajax_load_more() {
        $args = json_decode(wp_unslash($_POST['json_data']));

        $query_args = (array) $args->{'query_args'};
        $block_args = (array) $args->{'block_args'};

        $ajax_query = new WP_Query($query_args);

        // Determine which preview to use based on the post_type
        $post_type = $ajax_query->get('post_type');

        // Default to the "post" post type for previews
        if (!$post_type || is_array($post_type)) {
            $post_type = 'post';
        }

        // Calculate the current offset
        $iteration = intval($ajax_query->query['posts_per_page']) * intval($ajax_query->query['paged']);
        $project_index = $iteration;
        $post_data = [];
        $index = 0;
        if ($ajax_query->have_posts()):
            while ($ajax_query->have_posts()): $ajax_query->the_post();

                global $post;

                $iteration++;
                // subtract the already shown projects
                $project_index = $iteration - $ajax_query->query['posts_per_page'];

                /**
                 * Fires before output of a grid item in the posts loop.
                 *
                 * Allows output of custom elements within the posts loop, like banners.
                 * To add markup spanning the entire width of the posts grid, wrap it in the following element:
                 * <div class="grid-item col-1">[Your content]</div>
                 * @param int   $post_id     Post ID.
                 * @param int   $iteration     The current iteration of the loop.
                 */

                //do_action('rocket_posts_loop_before_grid_item', $post->ID, $iteration);
                // Variables
                $categories = get_the_category();
                $first_cat = $categories[0]->name;
                $first_cat_url = get_category_link($categories[0]->term_id);
                // path to theme root
                // lass="cell animate__animated animate__fadeInUp <?php echo $delays[$index]
                ob_start();

                $blade_path = 'blocks/rocketpager-news-list/rocketpager-news-list-element';
                echo \Roots\view($blade_path, $block_args)->render();

                /**
                 * Fires after output of a grid item in the posts loop.
                 */

                //do_action('rocket_posts_loop_after_grid_item', $post->ID, $iteration);
                $out = ob_get_clean();
                $post_data[] = [
                    "content" => trim($out),
                    "index" => $project_index,
                ];
                $index++;
            endwhile;
            print_r(json_encode($post_data));
        endif;

        wp_die();
    }
    add_action('wp_ajax_nopriv_rocket_ajax_load_more', 'rocket_ajax_load_more');
    add_action('wp_ajax_rocket_ajax_load_more', 'rocket_ajax_load_more');
endif;

if (!function_exists('rocket_ajax_get_max_num_pages')):
    function rocket_ajax_get_max_num_pages(){

        $query_args = json_decode(wp_unslash($_POST['json_data']), true);

        $the_query = new WP_Query($query_args);

        print_r($the_query->max_num_pages);

        wp_die();
    }
    add_action('wp_ajax_nopriv_rocket_ajax_get_max_num_pages', 'rocket_ajax_get_max_num_pages');
    add_action('wp_ajax_rocket_ajax_get_max_num_pages', 'rocket_ajax_get_max_num_pages');
endif;


require_once 'block_helpers.php';
