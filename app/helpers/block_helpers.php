<?php

namespace App;

/*

Blocks

 */

function getDefaultBlockView()
{
    $block_config = block_config();
    $path = 'blocks/' . $block_config['name'] . '/block';
    echo \Roots\view($path)->render();
}

function getDefaultPreviewView()
{
    $block_config = block_config();
    $path = 'blocks/' . $block_config['name'] . '/preview';
    echo \Roots\view($path)->render();
}

function getAjaxElementPath(){
    $block_config = block_config();
    return 'blocks/' . $block_config['name'] . '/element';
}


if (!function_exists('is_true')) {
    function is_true($key)
    {
        $val = block_value($key) || block_sub_value($key);
        return $val;
    }
}

/*
Ist der Wert $val nicht falsch, so wird der mitgegebene $string ausgegeben.
 */

if (!function_exists('ifTrueReturnVal')) {
    function ifTrueReturnVal($val, $string)
    {
        if ($val) {
            return $string;
        }
    }
}

/*
Existiert ein Wert für $key, wird (falls mitgegeben) $string ausgeben, andernfalls $key.
Ist $key nicht definiert, passiert nichts.
 */

if (!function_exists('existsReturnKey')) {
    function existsReturnKey($key, $string = null)
    {
        $val = block_value($key) || block_sub_value($key);
        if ($val) {
            return $string ? $string : $key;
        }
    }
}

/*
Existiert ein Wert für $key, wird der Wert vom $key ausgegeben.
Ist $key nicht definiert, passiert nichts.
 */

if (!function_exists('existsReturnVal')) {
    function existsReturnVal($key)
    {
        $val = block_value($key) . block_sub_value($key);
        if ($val) {
            return $val;
        }
    }
}

/*
Bildet eine Liste aus $keys auf die entsprechenden Bezeichnungen ab, sofern sie definiert sind.
 */
if (!function_exists('mapToKeyString')) {
    function mapToKeyString($keys, $useKey = false)
    {
        if($useKey){
            $map = array_map(function ($key) {
                return existsReturnKey($key);
            }, $keys);
        }
        else{
            $map = array_map(function ($key) {
                return existsReturnVal($key);
            }, $keys);
        }

        $string = array_reduce($map, function ($carry, $item) {
            $carry = $item ? $carry . ' ' . $item : $carry;
            return $carry;
        }, '');
        return $string;
    }
}

/*
    Gibt die Klassen der Animationen zurück, welche beim RocketPager-Element gewählt wurden.
    Wenn die Animation ignoriert wird, so wird ein leerer String zurückgegeben.
 */
if (!function_exists('getAnimation')) {
    function getAnimation($ignoreAnimation = false)
    {
        return !$ignoreAnimation && block_value('animation') && block_value('animation') != 'Keine Animation' ? ' ' . block_value('animation') : '';
    }
}

/*
    Gibt die Klassen für die verschiedenen Abstände zurück, welche beim RocketPager-Element gewählt wurden.
 */
if (!function_exists('getSpacings')) {
    function getSpacings()
    {
        function getFlattenedSpacingType($data, $identifier){
            $arr = array();
            foreach ($data[$identifier] as $k => $v) {
                $bezeichnung = $identifier . $k;
                $arr[$bezeichnung] = $v;
            }
            return $arr;
        }

        function mapToSpacingClass($arr){
            $classes = '';
            foreach ($arr as $k => $v) {
                if(is_array($v)){
                    if(array_key_exists('class', $v)){
                        $classes .= $v['class'] !== "" ? ' ' . $k . '-' . $v['class'] : '';
                    }
                }
            }
            return $classes;
        }


        $spacings = block_value('spacings');
        $classes = mapToSpacingClass(getFlattenedSpacingType($spacings, 'm'));
        $classes .= mapToSpacingClass(getFlattenedSpacingType($spacings, 'p'));

        return $classes;
    }
}

/*
    Gibt die Klassen zurück, welche gebraucht werden, um die Anzahl reihen darzustellen.
    Optional kann der Parameter isFlexType gesetzt werden. Ist dieser true, so werden die Klassen für
    die Flex-Box ausgegeben und sonst die Klassen für das XY-Grid
 */
if (!function_exists('setColumns')) {
    function setColumns($isFlexType = false)
    {
        switch( block_value( 'row-per-col') ){
            case 1:
                return $isFlexType ? 'grid-cols-1' : ' grid-cols-1';
                break;
            case 2:
                return $isFlexType ? 'grid-cols-2' : ' grid-cols-1 md:grid-cols-2';
                break;
            case 3:
                return $isFlexType ? 'grid-cols-3' : ' grid-cols-1 md:grid-cols-2 lg:grid-cols-3';
                break;
            case 4:
                return $isFlexType ? 'grid-cols-4' : ' grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4';
                break;
            case 5:
                return $isFlexType ? 'grid-cols-5' : ' grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5';
                break;
            case 6:
                return $isFlexType ? 'grid-cols-6' : ' grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6';
                break;
            default:
                return $isFlexType ? 'grid-cols-4' : ' grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4';
        }
    }
}

/*
    Gibt die 'is-active' zurückt, wenn ein Accordion-Item zu Beginn active sein sollte.
    Beim Accordion wird dies über das Feld 'Erstes Element geöffnet' (first-element-open) gesetzt.
    Beim Extedend-Accordion ist es das Feld 'Accordion-Tab geöffnet' (all-elements-open).
 */
if (!function_exists('getFirstAccordionItemActive')) {
    function getFirstAccordionItemActive($index = 0)
    {
        $isOpen = ( block_value('first-element-open') ||  block_value('all-elements-open') );
        return ( $index == 0 && $isOpen ) ? ['collClass' => '', 'showClass' => ' show'] : ['collClass' => ' collapsed', 'showClass' => ''];
    }
}


/*
    Funktion gibt den Deep-Link für das Accordion zurück. Dabei wird das (Sub)-Feld Titel (title) verwendet.
*/
if (!function_exists('echoDeepLinktitle')) {
    function echoDeepLinktitle()
    {
        $deeplinkingtitle = existsReturnVal('title');
        $deeplink = sanitize_title($deeplinkingtitle);
        return $deeplink;
    }
}

/*
    Liefert den Identifier für die Lightbox anhand der Auswahl des Parameters 'use-lightbox' im RocketPager-Element.
    Der Identifier wird gebraucht, um zu definieren welche Art von Lightbox für die Bilder verwendet werden soll.
*/
if (!function_exists('getLightboxIdentifier')) {
    function getLightboxIdentifier()
    {
        $lightbox_style = block_value('use-lightbox');
        $custom_lightbox = sanitize_title(block_value('name-lightbox'), 'gallery');
        switch( $lightbox_style ){
            case 'single':
                return 'single';
                break;
            case 'gallery':
                return 'gallery-' . wp_rand(0, PHP_INT_MAX);
                break;
            case 'custom':
                return 'custom-' . $custom_lightbox;
                break;
            default:
                return false;
        }
    }
}

/*
    Liefert die korrekte wp-embed-aspect Klasse zurück je nach Video-Dimension.
    Mit dem Wert $default kann definiert werden, welche Klasse verwendet werden soll, wenn die Dimension nicht bekannt ist.
*/
if (!function_exists('getEmbedAspectRatio')) {
    function getEmbedAspectRatio($video_dimension, $default = '')
    {
        switch($video_dimension){
            case '16x9':
            case '16-9':
                return ' wp-embed-aspect-16-9';
                break;
            case '4x3':
            case '4-3':
                return ' wp-embed-aspect-4-3';
                break;
            case '1x1':
            case '1-1':
            case 'square':
                return ' wp-embed-aspect-1-1';
                break;
            default:
                return $default;
        }
    }
}