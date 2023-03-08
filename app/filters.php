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

add_filter('excerpt_length', function ($length){
    return 35;
});

add_filter('render_block_core/query', function ($block_content, $block) {
    $rx = "/<li class=\"(wp-block-post) [^\"]*/i";
    preg_match_all($rx, $block_content, $matches, PREG_OFFSET_CAPTURE);
    $group_matches = $matches[1];
    $i = 0;
    foreach ($group_matches as &$match) {
        $additional_text = 'group ';
        $offset = $i * strlen($additional_text);
        $match_index = $match[1];
        $block_content = substr_replace($block_content, $additional_text, $match_index + $offset, 0);
        $i++;
    }

    return $block_content;
}, 10, 2);

// Removes noreferrer on the frontend only, you will likely still see noreferrer in the code view of the editor
add_filter('the_content', function ($content) {
    $replace = array("noreferrer " => "" ," noreferrer" => "");
    $new_content = strtr($content, $replace);
    return $new_content;
}, 999);
