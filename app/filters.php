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
    return sprintf(' &hellip; <ul class="is-style-liststyle-icon-end--arrow-right group my-0"><li class="my-0 group-hover:origin-center group-hover:translate-x-2 after:text-xs after:pl-2"><a href="%s" class="text-xs">%s</a></li></ul>', get_permalink(), pl__('Weiterlesen'));
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

// Defer JS that aren't needed at the beginning
add_filter('script_loader_tag', function($tag, $handle) {
    if (is_admin()) return $tag;

    $exclude_handles = [
        'heartbeat',
        'wp-hooks',
        'wp-auth-check',
        'jquery',
        'jquery-core',
        'jquery-ui-core',
        'wp-i18n'
    ];

    if (!in_array($handle, $exclude_handles)) {
        $tag = str_replace('></script>', ' defer></script>', $tag);
    }

    return $tag;
}, 10, 2);

// Preload CSS that aren't needed at the beginning
add_filter( 'style_loader_tag', function( $tag, $handle ){

    $preload_handles = [
        'app/0',
        'wp-block-library',
        'buttons',
        'google-font',
        'google-font-serif',
        'intlTelInput-forminator-css'
    ];

    if (in_array($handle, $preload_handles) || str_starts_with($handle, 'block') || str_starts_with($handle, 'forminator')) {
        $fallback = '<noscript>' . $tag . '</noscript>';
        $preload = str_replace("rel='stylesheet'", "rel='preload' as='style' onload='this.rel=\"stylesheet\"'", $tag);
        $tag = $preload . $fallback;
    }

    return $tag;
}, 10, 2 );
