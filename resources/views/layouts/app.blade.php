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
    xl:prose-xl
    lg:prose-p:leading-7
    lg:prose-li:leading-7
    prose-h1:font-normal
    prose-h2:font-normal
    prose-headings:font-bold
    prose-li:marker:text-xl
    prose-hr:my-section-mobile
    md:prose-hr:my-section-tablet
    lg:prose-hr:my-section-desktop
    xl:prose-hr:my-section-full-hd
  ">
    @yield('content')
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
