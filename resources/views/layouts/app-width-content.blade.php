<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>
{{-- PARAM HEADER --}}
@include('sections.header.header1')

  <main id="main" class="main mx-auto mt-[90px]">
   {{-- max-w-content mx-auto px-[1.875rem] --}}
    @yield('content')
  </main>

@include('sections.footer.footer1')

@include('partials.browser-update')
@include('partials.googletagmanager')
@include('partials.nootiz')

@include('partials.top.sticky-cta')