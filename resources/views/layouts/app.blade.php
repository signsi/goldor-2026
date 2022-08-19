<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>
{{-- PARAM HEADER --}}
@include('sections.header.header1')
<main id="main"
    class="
    main mx-auto max-w-none
    prose
    lg:prose-lg
    xl:prose-xl
    lg:prose-p:leading-7
    lg:prose-li:leading-7
    prose-li:text-font
    prose-p:text-font
    prose-headings:font-bold
    prose-h1:font-normal
    prose-h2:font-normal
    prose-li:marker:text-font
    prose-li:marker:text-base
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
