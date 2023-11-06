@php
    $header_pos = App\getThemeOption('header_positioned');
@endphp

<header id="siteHeader" class="{{ $header_pos }} top-0 transition-all z-30">
    <div class="header-navigation-wrapper bg-white" id="fixed">
        @relativeInclude('elements.topnav')
        @relativeInclude('elements.mobile-navigation')
    </div>
</header>
