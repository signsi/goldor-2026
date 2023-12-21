<?php

use function Roots\bundle;


add_filter('genesis_custom_blocks_default_fields', function ($default_fields) {

    $default_fields['animation'] = ['type' => 'string'];
    $default_fields['hideElement'] = ['type' => 'boolean'];

    return $default_fields;
});

add_filter('genesis_custom_blocks_get_block_attributes', function ($attributes) {

    $attributes['hideElement'] = [
        'type' => 'boolean',
        'default' => false
    ];

    $attributes['animation'] = [
        'type' => 'string',
        'default' => '-'
    ];
    return $attributes;
});


add_action('genesis_custom_blocks_render_template_rocketpager-accordion', function () {
    bundle('block.accordion')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-accordion-extended', function () {
    bundle('block.accordion')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-hero-slider', function () {
    bundle('block.hero-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-content-slider', function () {
    bundle('block.content-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-slider', function () {
    bundle('block.carousel-slider')->enqueue();
    bundle('block.videoelement')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-testimonial-slider', function () {
    bundle('block.testimonial-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-videoelement', function () {
    bundle('block.videoelement')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-bilderwand', function () {
    bundle('block.bilderwand')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-fancy-team', function () {
    bundle('block.fancy-team')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-google-maps', function () {
    $API_KEY = App\getThemeOption('google_api_key');
    bundle('block.google-maps')->enqueue()->localize('google_api_key', ['google_api_key' => $API_KEY]);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-news-list', function () {
    $ajax_url = admin_url('admin-ajax.php');
    bundle('ajax')->enqueue()->localize('load_more_posts', [
        'ajaxurl' => esc_url($ajax_url),
        'theme_directory_uri' => get_template_directory_uri()
    ]);
    bundle('block.news-list')->enqueue();
}, 10, 3);

if (!function_exists('rocket_ajax_load_more')):
    function rocket_ajax_load_more()
    {
        $args = json_decode(wp_unslash($_POST['json_data']));
        $query_args = (array) $args->{'query_args'};
        $block_args = (array) $args->{'block_args'};
        $query_args['meta_query'] = array((array) $args->{'meta_query'});

        $ajax_query = new WP_Query($query_args);

        $output = '';
        $max_pages = $ajax_query->max_num_pages;

        if ($ajax_query->have_posts()) {
            ob_start();
            while ($ajax_query->have_posts()):
                $ajax_query->the_post();
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
