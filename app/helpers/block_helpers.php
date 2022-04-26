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
    Gibt die Klassen zurück, welche gebraucht werden, um die Anzahl reihen darzustellen.
    Optional kann der Parameter isFlexType gesetzt werden. Ist dieser true, so werden die Klassen für
    die Flex-Box ausgegeben und sonst die Klassen für das XY-Grid
 */
if (!function_exists('setColumns')) {
    function setColumns($isFlexType = false)
    {
        switch( block_value( 'row-per-col') ){
            case 1:
                return $isFlexType ? 'one-column' : ' small-up-1';
                break;
            case 2:
                return $isFlexType ? 'two-columns' : ' small-up-1 medium-up-2';
                break;
            case 3:
                return $isFlexType ? 'three-columns' : ' small-up-1 medium-up-2 large-up-3';
                break;
            case 4:
                return $isFlexType ? 'four-columns' : ' small-up-1 medium-up-2 large-up-3 xlarge-up-4';
                break;
            default:
                return $isFlexType ? 'four-columns' : '';
        }
    }
}

/*
    Gibt die 'is-active' zurückt, wenn ein Accordion-Item zu Beginn active sein sollte.
    Beim Accordion wird dies über das Feld 'Erstes Element geöffnet' (first-element-open) gesetzt.
    Beim Extedend-Accordion ist es das Feld 'Accordion-Tab geöffnet' (all-elements-open).
 */
if (!function_exists('getAccordionActive')) {
    function getAccordionActive($index = 0)
    {
        $isOpen = ( block_value('first-element-open') ||  block_value('all-elements-open') );
        return ( $index == 0 && $isOpen ) ? ' is-active' : '';
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