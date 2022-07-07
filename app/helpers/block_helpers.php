<?php

namespace App;

/*

Blocks

 */

function getDefaultBlockView()
{
    $block_config = block_config();
    $path = 'blocks/' . $block_config['name'] . '/block';
    echo \Roots\view($path)->render();
}

function getDefaultPreviewView()
{
    $block_config = block_config();
    $path = 'blocks/' . $block_config['name'] . '/preview';
    echo \Roots\view($path)->render();
}


if (!function_exists('is_true')) {
    function is_true($key)
    {
        $val = block_value($key) || block_sub_value($key);
        return $val;
    }
}

/*
Ist der Wert $val nicht falsch, so wird der mitgegebene $string ausgegeben.
 */

if (!function_exists('ifTrueReturnVal')) {
    function ifTrueReturnVal($val, $string)
    {
        if ($val) {
            return $string;
        }
    }
}

/*
Existiert ein Wert für $key, wird (falls mitgegeben) $string ausgeben, andernfalls $key.
Ist $key nicht definiert, passiert nichts.
 */

if (!function_exists('existsReturnKey')) {
    function existsReturnKey($key, $string = null)
    {
        $val = block_value($key) || block_sub_value($key);
        if ($val) {
            return $string ? $string : $key;
        }
    }
}

/*
Existiert ein Wert für $key, wird der Wert vom $key ausgegeben.
Ist $key nicht definiert, passiert nichts.
 */

if (!function_exists('existsReturnVal')) {
    function existsReturnVal($key)
    {
        $val = block_value($key) . block_sub_value($key);
        if ($val) {
            return $val;
        }
    }
}

/*
Bildet eine Liste aus $keys auf die entsprechenden Bezeichnungen ab, sofern sie definiert sind.
 */
if (!function_exists('mapToKeyString')) {
    function mapToKeyString($keys, $useKey = false)
    {
        if($useKey){
            $map = array_map(function ($key) {
                return existsReturnKey($key);
            }, $keys);
        }
        else{
            $map = array_map(function ($key) {
                return existsReturnVal($key);
            }, $keys);
        }

        $string = array_reduce($map, function ($carry, $item) {
            $carry = $item ? $carry . ' ' . $item : $carry;
            return $carry;
        }, '');
        return $string;
    }
}

/*
    Gibt die Klassen der Animationen zurück, welche beim RocketPager-Element gewählt wurden.
    Wenn die Animation ignoriert wird, so wird ein leerer String zurückgegeben.
 */
if (!function_exists('getAnimation')) {
    function getAnimation($ignoreAnimation = false)
    {
        return !$ignoreAnimation && block_value('animation') && block_value('animation') != 'Keine Animation' ? ' ' . block_value('animation') : '';
    }
}


/*
    Gibt die Klassen zurück, welche gebraucht werden, um die Anzahl reihen darzustellen.
    Optional kann der Parameter isFlexType gesetzt werden. Ist dieser true, so werden die Klassen für
    die Flex-Box ausgegeben und sonst die Klassen für das XY-Grid
 */
if (!function_exists('setColumns')) {
    function setColumns($isFlexType = false)
    {
        switch( block_value( 'row-per-col') ){
            case 1:
                return $isFlexType ? 'one-column' : ' small-up-1';
                break;
            case 2:
                return $isFlexType ? 'two-columns' : ' small-up-1 medium-up-2';
                break;
            case 3:
                return $isFlexType ? 'three-columns' : ' small-up-1 medium-up-2 large-up-3';
                break;
            case 4:
                return $isFlexType ? 'four-columns' : ' small-up-1 medium-up-2 large-up-3 xlarge-up-4';
                break;
            case 5:
                return $isFlexType ? 'five-columns' : ' small-up-1 medium-up-2 large-up-4 xlarge-up-5';
                break;
            default:
                return $isFlexType ? 'four-columns' : '';
        }
    }
}

/*
    Gibt die 'is-active' zurückt, wenn ein Accordion-Item zu Beginn active sein sollte.
    Beim Accordion wird dies über das Feld 'Erstes Element geöffnet' (first-element-open) gesetzt.
    Beim Extedend-Accordion ist es das Feld 'Accordion-Tab geöffnet' (all-elements-open).
 */
if (!function_exists('getAccordionActive')) {
    function getAccordionActive($index = 0)
    {
        $isOpen = ( block_value('first-element-open') ||  block_value('all-elements-open') );
        return ( $index == 0 && $isOpen ) ? ' is-active' : '';
    }
}

/*
    Funktion gibt den Deep-Link für das Accordion zurück. Dabei wird das (Sub)-Feld Titel (title) verwendet.
*/
if (!function_exists('echoDeepLinktitle')) {
    function echoDeepLinktitle()
    {
        $deeplinkingtitle = existsReturnVal('title');
        $deeplink = sanitize_title($deeplinkingtitle);
        return $deeplink;
    }
}

/*
    Liefert den Identifier für die Lightbox anhand der Auswahl des Parameters 'use-lightbox' im RocketPager-Element.
    Der Identifier wird gebraucht, um zu definieren welche Art von Lightbox für die Bilder verwendet werden soll.
*/
if (!function_exists('getLightboxIdentifier')) {
    function getLightboxIdentifier()
    {
        $lightbox_style = block_value('use-lightbox');
        $custom_lightbox = sanitize_title(block_value('name-lightbox'), 'gallery');
        switch( $lightbox_style ){
            case 'single':
                return 'single';
                break;
            case 'gallery':
                return 'gallery-' . wp_rand(0, PHP_INT_MAX);
                break;
            case 'custom':
                return 'custom-' . $custom_lightbox;
                break;
            default:
                return false;
        }
    }
}

/*
    Liefert die korrekte wp-embed-aspect Klasse zurück je nach Video-Dimension.
    Mit dem Wert $default kann definiert werden, welche Klasse verwendet werden soll, wenn die Dimension nicht bekannt ist.
*/
if (!function_exists('getEmbedAspectRatio')) {
    function getEmbedAspectRatio($video_dimension, $default = '')
    {
        switch($video_dimension){
            case '16x9':
            case '16-9':
                return ' wp-embed-aspect-16-9';
                break;
            case '4x3':
            case '4-3':
                return ' wp-embed-aspect-4-3';
                break;
            case '1x1':
            case '1-1':
            case 'square':
                return ' wp-embed-aspect-1-1';
                break;
            default:
                return $default;
        }
    }
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