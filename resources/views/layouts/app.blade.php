@php
  $search_active = App\getThemeOption('cta_search');
@endphp

<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>
{{-- PARAM HEADER --}}
@include('sections.header.header1')
<main id="main"
    class="
    main mx-auto max-w-none
    prose
    prose-font
    lg:prose-lg
    prose-h1:text-primary
    prose-hr:my-section
  ">
    @yield('content')
    @if ($search_active)
        @include('partials.modal-search')
    @endif
</main>

@hasSection('sidebar')
    <aside class="sidebar">
        @yield('sidebar')
    </aside>
@endif

@include('sections.footer.footer1')

@include('partials.browser-update')
@include('partials.googletagmanager')
@include('partials.nootiz')

@include('partials.top.sticky-cta')
