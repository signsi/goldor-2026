@php
$logo_src = App\getThemeOption('logo_footer');
$company_name = App\getThemeOption('company_name');
@endphp

<div class="footer--logo">
    <a href="{{ home_url('/') }}" rel="home" class="relative block w-[100px]">
        <img src="{{ $logo_src }}" class="h-full w-auto"
            alt="Logo {{ $company_name }}" />
    </a>
</div>
