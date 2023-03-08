@php
    $header_pos = App\getThemeOption('header_positioned');
@endphp

<header id="siteHeader" class="{{ $header_pos }} top-0 transition-all z-30">
    <div class="header-navigation-wrapper bg-white shadow-md" id="fixed">
        @relInclude('elements.topnav')
        @relInclude('elements.mobile-navigation')
    </div>
</header>
