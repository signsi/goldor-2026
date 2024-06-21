@php
    $header_pos = App\getThemeOption('header_positioned');
    $megamenu_active = App\getThemeOption('megamenu');
@endphp

<header id="siteHeader" class="{{ $header_pos }} bg-white [.menuOpen_&]:bg-white top-0 transition-all z-30 bg-white px-gutter [&.siteHeader--notTop]:shadow-md">
    <div class="header-navigation-wrapper" id="fixed">
        @relativeInclude('elements.topnav')

        @if(!$megamenu_active)
            @relativeInclude('elements.mobile-navigation')
        @else
            @relativeInclude('elements.megamenu')
        @endif
    </div>
</header>