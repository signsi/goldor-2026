@php
$logo_src = App\getThemeOption('logo_main');
$company_name = App\getThemeOption('firmenname');
@endphp

<a href="{{ App\get_home_url() }}" rel="home">
    <img class="h-[60px] md:h-[80px] w-auto" src="{{ $logo_src }}" alt="Logo - {{ $company_name }}" />
</a>
