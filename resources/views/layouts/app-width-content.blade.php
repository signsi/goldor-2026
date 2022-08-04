<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>
{{-- PARAM HEADER --}}
@include('sections.header.header1')

  <main id="main" class="main mx-auto max-w-none prose md:prose-lg lg:prose-xl lg:prose-p:leading-6 text-primary prose-a:text-primary  prose-strong:text-primary prose-headings:text-primary">
    @yield('content')
  </main>

@include('sections.footer.footer1')

@include('partials.browser-update')
@include('partials.googletagmanager')
@include('partials.nootiz')

@include('partials.top.sticky-cta')