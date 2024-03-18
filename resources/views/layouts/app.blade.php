@php
    $ctaSearchOption = App\getThemeOption('cta_search');
    $headerSearchOption = App\getThemeOption('header_search');
    $isCTASearchActive = $ctaSearchOption || $headerSearchOption;
    $isLanguageActive = App\getThemeOption('header_lang_switcher');
@endphp

<!doctype html>
<html @php(language_attributes())>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  @php(do_action('get_header'))
  @php(wp_head())
  @stack('header_scripts')
  <meta name="theme-color" content="#FFF" />
</head>

<body @php(body_class())>
  @php(wp_body_open())

  <div id="app">
    <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
    </a>
    <div id="smooth-wrapper">
      <div id="smooth-content">

            @include('sections.header.header')

            <main id="main" class="">

                @yield('content')

                @hasSection('sidebar')
                    <aside class="sidebar">
                        @yield('sidebar')
                    </aside>
                @endif

                @includeWhen($isCTASearchActive, 'sections.offcanvas.modal-search')
                @if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
                    @includeWhen($isLanguageActive, 'sections.offcanvas.modal-language')
                @endif
            </main>

            @include('sections.footer.footer')

            @include('sections.offcanvas.sticky-cta')

            @include('partials.scripts.browser-update')
            @include('partials.scripts.nootiz')
        </div>
    </div>
  </div>

  @php(do_action('get_footer'))
  @php(wp_footer())
  @stack('footer_scripts')
</body>

</html>
