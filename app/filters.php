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


add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), pl__('Weiterlesen'));
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


// Füge den adjust_text_color-Filter hinzu
// add_filter('the_content', function ($content) {
//     // Verwende reguläre Ausdrücke, um alle Elemente mit Klassen zu finden, die mit 'has-' beginnen und mit '-background-color' enden
//     $pattern = '/<[^>]*\sclass=["\'][^"\']*has-[^"\']*-background-color[^"\']*["\'][^>]*>.*?<\/[^>]*>/i';

//     // Ersetze die Hintergrundfarbe und Textfarbe basierend auf der Helligkeit
//     $content = preg_replace_callback($pattern, function($match) {
//         $element = $match[0];
//         $computed_style = get_computed_style($element);

//         // Extrahiere die Hintergrundfarbe aus dem berechneten Stil
//         preg_match('/background-color:\s*([^;]+);/', $computed_style, $matches);
//         if (isset($matches[1])) {
//             $background_color = $matches[1];

//             // Funktion zur Berechnung der Helligkeit
//             function get_brightness($hex_color) {
//                 $r = hexdec(substr($hex_color, 1, 2));
//                 $g = hexdec(substr($hex_color, 3, 2));
//                 $b = hexdec(substr($hex_color, 5, 2));

//                 // Vereinfachte Berechnung der Helligkeit
//                 return ($r + $g + $b) / 3;
//             }

//             $brightness = get_brightness($background_color);

//             if ($brightness < 128) {
//                 // Dunkler Hintergrund, weiße Textfarbe
//                 $element = str_replace('class="', 'class="text-white ', $element);
//             } else {
//                 // Heller Hintergrund, schwarze Textfarbe
//                 $element = str_replace('class="', 'class="text-black ', $element);
//             }
//         }

//         return $element;
//     }, $content);

//     return $content;
// });




