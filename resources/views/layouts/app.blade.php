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
    lg:prose-xl
    lg:prose-p:leading-7
  ">
    @yield('content')
</main>

@hasSection('sidebar')
    <aside class="sidebar">
        @yield('sidebar')
    </aside>
@endif
{{-- PARAM FOOTER --}}
@include('sections.footer.footer1')

@include('partials.browser-update')
@include('partials.googletagmanager')
@include('partials.nootiz')

@include('partials.top.sticky-cta')
