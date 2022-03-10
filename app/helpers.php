<?php

namespace App;


function getCustomizerOption($key)
{
    $content_mod = get_option('rocketpager_theme_options')[$key];
    return $content_mod;
}

function isNotEmpty($value)
{
    if (is_array($value)) {
        return count($value) > 0;
    } else {
        return $value;
    }
}

function getThemeOption($field_id, $default_value = '')
{
    /**
     * getThemeOption hat einen Parameter $default_value, womit
     * man per Funktionsaufruf den Standardwert setzen kann.
     * z.B. App\getThemeOption('link', true); --> true als default Wert.
     * (So überschreiben wir den allenfalls gesetzen Kirki Standardwert)
     * Geben wir diesen nicht mit, fallen wir zurück auf die Kirki Felddefinition,
     * wo ebenfalls ein Standardwert gesetzt werden kann.
     * --> Siehe rocketpager-options -> class-rocketpager-options-admin.php
     */
    $default_param_empty = $default_value == '';
    if ($field_id) {
        if ($default_param_empty) {
            if (class_exists('Kirki') && isset(\Kirki::$fields[$field_id]) && isset(\Kirki::$fields[$field_id]['default'])) {
                $default_value = \Kirki::$fields[$field_id]['default'];
            }
        }
        $value = get_theme_mod($field_id, $default_value);
        return $value;
    }
    return false;
}

// TODO: function does not seem to work everywhere
//if (is_plugin_active('genesis-custom-blocks-pro/genesis-custom-blocks-pro.php')) {
function blockValueExists($key)
{
    return isNotEmpty($key);
}
//}

function pl_e($string = '')
{
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo $string;
    }
}

function pl__($string = '')
{
    if (function_exists('pll__')) {
        return pll__($string);
    }
    return $string;
}


/*
    Die Funktion kann zum Sanitizen gebraucht werden. Default mässig werden alle nicht erlauben Tags, welche nicht in
    einem Post erlaubt sind, entfernt.
    Für die Felder von RocketPager gibt es verschiedene Kontexte, welche kurz aufgelistet werden:
    - $context = 'shortcode'    -> Feldtype 'Text' welcher Shortcode enthält
    - $context = 'inner_block'  -> Feldtype 'Inner Block'
    - $context = 'text_area'    -> Feldtype 'Classic Text'
    - $context = 'allow_iframe' -> Feldtype 'Inner Block' welcher iFrames haben darf
    - $context = 'only_iframe'  -> Feldtype 'Inner Block' welches nur iFrame enthält
*/
if (!function_exists('sanitize_out')) {
    function sanitize_out($output, $context = 'post')
    {

        $allowed_tags = array();
        $iframe_tag = array(
            'src'             => true,
            'height'          => true,
            'width'           => true,
            'frameborder'     => true,
            'allowfullscreen' => true,
        );

        $allowed_texterea_tags = array(
            'h1' => array('align' => true),
            'h2' => array('align' => true),
            'h3' => array('align' => true),
            'h4' => array('align' => true),
            'h5' => array('align' => true),
            'h6' => array('align' => true),
            'p' => array(
                'align'     => true,
                'dir'       => true,
                'lang'      => true,
                'xml:lang'  => true,
            ),
            'br' => array(),
            'span'       => array(
                'style'    => true,
                'dir'      => true,
                'align'    => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'ul' => array('type' => true),
            'ol' => array(
                'start'    => true,
                'type'     => true,
                'reversed' => true,
            ),
            'li' => array(
                'align' => true,
                'value' => true,
            ),
            'sub' => array(),
            'sup' => array(),
        );

        switch ($context) {
            case 'shortcode':
                $allowed_tags = wp_kses_allowed_html('data');
                break;
            case 'inner_block':
                $allowed_tags = wp_kses_allowed_html('post');
                break;
            case 'text_area':
                $allowed_tags = wp_kses_allowed_html('data');
                foreach ($allowed_texterea_tags as $key => $val) {
                    $allowed_tags[$key] = $val;
                }
                unset($val);
                unset($key);
                break;
            case 'allow_iframe':
                $allowed_tags = wp_kses_allowed_html('post');
                $allowed_tags['iframe'] = $iframe_tag;
                break;
            case 'only_iframe':
                $allowed_tags['iframe'] = $iframe_tag;
                break;
            default:
                $allowed_tags = wp_kses_allowed_html($context);
        }

        return wp_kses($output, $allowed_tags);
    }
}

require_once 'block_helpers.php';
