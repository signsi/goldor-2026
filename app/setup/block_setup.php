<?php

use function Roots\bundle;


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
    bundle('block.news-list')->enqueue()->localize('load_more_posts', [
        'ajaxurl' => esc_url($ajax_url),
        'theme_directory_uri' => get_template_directory_uri()
    ]);
}, 10, 3);
