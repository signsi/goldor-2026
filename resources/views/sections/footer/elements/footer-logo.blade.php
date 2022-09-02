@php
$logo_src = App\getThemeOption('logo_footer');
$company_name = App\getThemeOption('company_name');
@endphp

<div class="block mb-6 lg:mb-0">
    <a href="{{ home_url('/') }}" rel="home">
        <img src="{{ $logo_src }}" class="h-[30px] md:h-[35px] lg:h-[30px]  xl:h-[40px] w-auto" alt="Logo {{ $company_name }}" />
    </a>
</div>