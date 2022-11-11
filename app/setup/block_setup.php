<?php

use function Roots\bundle;

add_filter( 'genesis_custom_blocks_default_fields', function($default_fields){

    $default_fields['spacings']  = ['type' => 'object'];
    $default_fields['hideElement']  = ['type' => 'boolean'];
    $default_fields['hoverGroup']  = ['type' => 'boolean'];
    $default_fields['animation']  = ['type' => 'string'];
    $default_fields['layoutWidth']  = ['type' => 'string'];
    $default_fields['isLayoutOffset']  = ['type' => 'string'];
    $default_fields['gap']  = ['type' => 'string'];

    return $default_fields;
});

add_filter( 'genesis_custom_blocks_get_block_attributes', function($attributes){

    $attributes['spacings']  = [
        'type' => 'object',
        'default' => [
            'p' => [
                't' => '',
                'r' => '',
                'b' => '',
                'l' => '',
            ],
            'm' => [
                't' => '',
                'r' => '',
                'b' => '',
                'l' => '',
            ],
        ]
    ];
    $attributes['hideElement']  = [
        'type' => 'boolean' ,
        'default' => false
    ];
    $attributes['hoverGroup']  = [
        'type' => 'boolean' ,
        'default' => false
    ];
    $attributes['animation']  = [
        'type' => 'string' ,
        'default' => '-'
    ];
    $attributes['layoutWidth']  = [
        'type' => 'string' ,
        'default' => 'is-style-layout-default'
    ];
    $attributes['isLayoutOffset']  = [
        'type' => 'string' ,
        'default' => '-'
    ];
    $attributes['gap']  = [
        'type' => 'string' ,
        'default' => '-'
    ];

    return $attributes;
} );

add_action('genesis_custom_blocks_render_template_rocketpager-text-image-list', function () {
    bundle('block.text-image-list')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-audio-image-box', function () {
    bundle('block.audio-image')->enqueue();
}, 10, 3);

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
    wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api', ['block.videoelement/1'], null, true);
    bundle('block.carousel-slider')->enqueue();
    bundle('block.videoelement')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-header', function () {
    bundle('block.carousel-header')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-testimonial-slider', function () {
    bundle('block.testimonial-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-modal', function () {
    bundle('block.modal')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-videoelement', function () {
    wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api', ['block.videoelement/1'], null, true);
    bundle('block.videoelement')->enqueue();
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
}, 10, 3);

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