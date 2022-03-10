{{-- @if (has_nav_menu('disclaimer_navigation'))
{!! wp_nav_menu([
'theme_location' => 'disclaimer_navigation',
'menu_class' => 'footer--disclaimer-navigation',
'container' => false,
'items_wrap' => '<ul class="footer--disclaimer-navigation">%3$s</ul>'
]) !!}
@endif --}}

@php

//$disclaimer_ausrichtung = get_theme_mod('disclaimer_ausrichtung');
$disclaimer_ausrichtung = App\getThemeOption('disclaimer_ausrichtung');

@endphp

@if (has_nav_menu('disclaimer_navigation'))

    {!! wp_nav_menu([
    'theme_location' => 'disclaimer_navigation',
    'menu_class' => 'footer--disclaimer-navigation $disclaimer_ausrichtung ',
    'container' => false,
    'items_wrap' => '<ul class="footer--disclaimer-navigation ' . $disclaimer_ausrichtung . ' ">%3$s</ul>',
]) !!}

@endif
