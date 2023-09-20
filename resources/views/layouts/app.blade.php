@php
    $ctaSearchOption = App\getThemeOption('cta_search');
    $headerSearchOption = App\getThemeOption('header_search');  
    $isCTASearchActive = $ctaSearchOption || $headerSearchOption;
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
</main>

@include('sections.footer.footer')
@include('sections.offcanvas.sticky-cta')

@include('partials.scripts.browser-update')
@include('partials.scripts.nootiz')
@stack('footer_scripts')
