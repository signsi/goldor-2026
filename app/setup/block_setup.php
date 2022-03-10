<?php


use function Roots\asset;

add_action('genesis_custom_blocks_render_template_rocketpager-hero-slider', function () {
    wp_enqueue_script('rocketpager-hero-slider', asset('scripts/rocketpager-hero-slider.js')->uri(), ['jquery'], null, true);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-content-slider', function () {
    wp_enqueue_script('rocketpager-content-slider', asset('scripts/rocketpager-content-slider.js')->uri(), ['jquery'], null, true);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-slider', function () {
    wp_enqueue_script('rocketpager-carousel-slider', asset('scripts/rocketpager-carousel-slider.js')->uri(), ['jquery'], null, true);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-header', function () {
    wp_enqueue_script('rocketpager-carousel-header', asset('scripts/rocketpager-carousel-header.js')->uri(), ['jquery'], null, true);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-testimonial-slider', function () {
    wp_enqueue_script('rocketpager-testimonial-slider', asset('scripts/rocketpager-testimonial-slider.js')->uri(), ['jquery'], null, true);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-google-maps', function () {
    $API_KEY = App\getThemeOption('google_api_key');

    wp_enqueue_script('rocketpager-google-maps', asset('scripts/rocketpager-google-maps.js')->uri(), ['jquery'], null, true);
    wp_localize_script('rocketpager-google-maps', 'google_api_key', $API_KEY);
}, 10, 3);
