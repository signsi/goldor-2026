@php
  $search_active = App\getThemeOption('cta_search');
@endphp

<!doctype html>
<html {{ language_attributes() }} >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        @php wp_head() @endphp
        @stack('header_scripts')

        <script src="https://kit.fontawesome.com/9b15eeda8b.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>

    <body {{ body_class() }}>
        @php
            wp_body_open();
            do_action('get_header');
        @endphp

        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content') }}
        </a>

        {{-- PARAM HEADER --}}
        @include('sections.header.header')
        {{ App\breadcrumbs() }}
        <main id="main" class="main mx-auto max-w-none">
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

        @include('sections.footer.footer')
        @include('sections.offcanvas.sticky-cta')

        @include('partials.browser-update')
        @include('partials.nootiz')
        @php
            do_action('get_footer');
            wp_footer();
        @endphp
        @stack('footer_scripts')
    </body>
</html>