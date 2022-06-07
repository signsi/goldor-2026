<?php
class submenu_wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='mega-menu-wrapper'><ul class='sub-menu'>\n";
    }
    function end_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}
?>

@if (App\getThemeOption('header_megamenue'))
    {{-- @if (App\getThemeOption('header_magamenue', true)) --}}
    @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
    'theme_location' => 'primary_navigation',
    'menu_class' => 'dropdown menu main-navigation float-right',
    'container' => false,
    'items_wrap' => '<ul class="dropdown menu main-navigation float-right">%3$s</ul>',
    // uncomment "walker" zum Aktivieren des Mega-Menus
    'walker' => new submenu_wrap(),
]) !!}
    @endif
@else
    {!! wp_nav_menu([
    'theme_location' => 'primary_navigation',
    'menu_class' => 'dropdown menu main-navigation float-right',
    'container' => false,
    'items_wrap' => '<ul class="dropdown menu main-navigation float-right">%3$s</ul>',
    // uncomment "walker" zum Aktivieren des Mega-Menus
    //'walker' => new submenu_wrap(),
]) !!}
@endif
