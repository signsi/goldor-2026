<?php

use function Roots\bundle;

if (!function_exists('rocket_ajax_load_more')):
    function rocket_ajax_load_more() {
        $args = json_decode(wp_unslash($_POST['json_data']));
        $query_args = (array) $args->{'query_args'};
        $block_args = (array) $args->{'block_args'};
        $query_args['meta_query'] = array((array) $args->{'meta_query'});

        $ajax_query = new WP_Query($query_args);

        $output = '';
        $max_pages = $ajax_query->max_num_pages;

        if($ajax_query->have_posts()) {
            ob_start();
            while($ajax_query->have_posts()) : $ajax_query->the_post();
                global $post;

                $blade_path = $block_args['element_path'];
                echo \Roots\view($blade_path, $block_args)->render();
            endwhile;
            $output = ob_get_contents();
            ob_end_clean();
        }

        $result = [
            'max' => $max_pages,
            'elements' => $output,
        ];

        echo json_encode($result);
        exit;
    }
    add_action('wp_ajax_nopriv_rocket_ajax_load_more', 'rocket_ajax_load_more');
    add_action('wp_ajax_rocket_ajax_load_more', 'rocket_ajax_load_more');
endif;