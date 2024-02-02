@php
    $header_pos = App\getThemeOption('header_positioned');
    $megamenu_active = App\getThemeOption('megamenu');
@endphp

<header id="siteHeader" class="{{ $header_pos }} top-0 transition-all z-30 bg-white">
    <div class="header-navigation-wrapper" id="fixed">
        @relativeInclude('elements.topnav')

        @if(!$megamenu_active)
            @relativeInclude('elements.mobile-navigation')
        @else
            @relativeInclude('elements.megamenu')
        @endif
    </div>
</header>
