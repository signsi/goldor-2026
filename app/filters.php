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
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), '');
});

add_filter('excerpt_length', function ($length){
    return 35;
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


/**
 * Adding group to each <li> for the query block.
 */
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

/**
 * Lowering specificity of WordPress global styles.
 */
// add_action( 'init', function() {

// 	// WP5.9+ only.
// 	if ( ! function_exists( 'wp_get_global_stylesheet' ) ) {
// 		return;
// 	}

// 	// Dequeue original WP global styles.
// 	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );

// 	// Enqueue WP global styles early.
// 	add_action( 'wp_enqueue_scripts', function() {

// 		// Lower CSS code specificity.
// 		$stylesheet = str_replace( [ 'body', '!important' ], [ ':root', '' ], wp_get_global_stylesheet() );

// 		if ( empty( $stylesheet ) ) {
// 			return;
// 		}

// 		wp_register_style( 'wp-global-styles', false );
// 		wp_add_inline_style( 'wp-global-styles', $stylesheet );
// 		wp_enqueue_style( 'wp-global-styles' );
// 	}, 0 );

// 	// Treat also editor styles.
// 	add_filter( 'block_editor_settings_all', function( $editor_settings ) {

// 		// Lower CSS code specificity.
// 		$editor_settings['styles'] = array_map( function( $style ) {
// 			if ( ! empty( $style['css'] ) ) {
// 				$style['css'] = str_replace( [ 'body', '!important' ], [ ':root', '' ], $style['css'] );
// 			}
// 			return $style;
// 		}, $editor_settings['styles'] );

// 		return $editor_settings;
// 	} );
// } );
