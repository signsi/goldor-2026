@php
    $logo_src = App\getThemeOption(App\getThemeOption('header_logo'));
    $company_name = App\getThemeOption('firmenname');
@endphp

<a href="{{ App\get_home_url() }}" rel="home">
    @if ($logo_src)
        <img class="h-menu-items-mobile md:h-menu-items w-auto nolazyload" src="{{ $logo_src }}" alt="Logo - {{ $company_name }}" />
    @else
        <span class="text-xl font-bold text-black font-serif m-0">{{ get_bloginfo('name', 'display') }}</span>
    @endif
</a>
