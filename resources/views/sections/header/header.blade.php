@php
    $header_pos = App\getThemeOption('header_positioned');
@endphp

<header id="siteHeader" class="{{ $header_pos }} top-0 transition-all z-30 bg-white">
    <div class="header-navigation-wrapper" id="fixed">
        @relativeInclude('elements.topnav')
        @relativeInclude('elements.mobile-navigation')
    </div>
</header>
