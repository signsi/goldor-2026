<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

// add_filter('render_block_core/query', function ($block_content, $block) {
//     // print_r($block['attrs']['className']);
//     return "<pre>". $block_content . "</pre>";
// }, 10, 2);

// add_filter('render_block_core/post-template', function ($block_content, $block) {
//     // print_r($block);
//     // return '<!--' . $block_content . '-->';
//     echo '<!-- BBBLOCK' . $block_content . '-->';
//     return $block_content . ' AAA';
// }, 10, 2);



add_filter('render_block_core/query', function ($block_content, $block) {
    // print_r($block);
    // return '<!--' . $block_content . '-->';
    echo '<!-- BBBLOCK' . $block_content . '-->';
    return $block_content . ' AAA';
}, 10, 2);
