@php
    $search_active = App\getThemeOption('cta_search');
@endphp

@stack('header_scripts')


<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header.header')
<main id="main" class="main mx-auto max-w-none">
    @yield('content')
    @includeWhen($search_active, 'sections.offcanvas.modal-search')
</main>

@hasSection('sidebar')
    <aside class="sidebar">
        @yield('sidebar')
    </aside>
@endif

        {{-- PARAM HEADER --}}
        @include('sections.header.header')
        <main id="main" class="main mx-auto max-w-none">
            @yield('content')
            @includeWhen($search_active, 'sections.offcanvas.modal-search')
        </main>

@include('partials.scripts.browser-update')
@include('partials.scripts.nootiz')
@stack('footer_scripts')
