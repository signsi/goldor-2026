<?php

use function Roots\bundle;


add_action('genesis_custom_blocks_render_template_rocketpager-hero-slider', function () {
    bundle('block.hero-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-content-slider', function () {
    bundle('block.content-slider')->enqueue();

}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-slider', function () {
    bundle('block.carousel-slider')->enqueue();

}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-header', function () {
    bundle('block.carousel-header')->enqueue();

}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-testimonial-slider', function () {
    bundle('block.testimonial-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-google-maps', function () {
    $API_KEY = App\getThemeOption('google_api_key');
    bundle('block.google-maps')->enqueue()->localize('google_api_key', ['google_api_key' => $API_KEY]);
}, 10, 3);
