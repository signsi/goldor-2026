@php
$logo_src1 = App\getThemeOption('logo_main');
$logo_src2 = App\getThemeOption('logo_negative');
$company_name = App\getThemeOption('firmenname');
@endphp

<a href="{{ home_url('/') }}" rel="home">
    <div class="logo-wrapper">
        <img class="h-[60px] md:h-[80px] w-auto" src="{{ $logo_src1 }}" alt="Logo - {{ $company_name }}" />
    </div>
</a>
