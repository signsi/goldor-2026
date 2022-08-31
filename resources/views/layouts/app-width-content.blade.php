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
    prose-hr:my-element-mobile
    md:prose-hr:my-element-tablet
    lg:prose-hr:my-element-desktop
    xl:prose-hr:my-element-full-hd
    {{-- prose-ul:my-element-mobile
    md:prose-ul:my-element-tablet
    xl:prose-ul:my-element-desktop --}}
  ">
    @yield('content')
</main>

@include('sections.footer.footer1')

@include('partials.browser-update')
@include('partials.googletagmanager')
@include('partials.nootiz')

@include('partials.top.sticky-cta')
