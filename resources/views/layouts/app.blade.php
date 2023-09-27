@php
    $ctaSearchOption = App\getThemeOption('cta_search');
    $headerSearchOption = App\getThemeOption('header_search');  
    $isCTASearchActive = $ctaSearchOption || $headerSearchOption;
    $isLanguageActive = App\getThemeOption('header_lang_switcher');
@endphp

@stack('header_scripts')

<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header.header')

<main id="main" class="mx-auto main max-w-none">
    @yield('content')

    @hasSection('sidebar')
        <aside class="sidebar">
            @yield('sidebar')
        </aside>
    @endif

    @includeWhen($isCTASearchActive, 'sections.offcanvas.modal-search')
    @if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
        @includeWhen($isLanguageActive, 'sections.offcanvas.modal-language')
    @endif
</main>

@include('sections.footer.footer')
@include('sections.offcanvas.sticky-cta')

@include('partials.scripts.browser-update')
@include('partials.scripts.nootiz')
@stack('footer_scripts')
