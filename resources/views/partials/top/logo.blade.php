@php
$logo_src1 = App\getThemeOption('logo_main');
$logo_src2 = App\getThemeOption('logo_negative');
$company_name = App\getThemeOption('company_name');
@endphp

<a href="{{ home_url('/') }}" rel="home">
    <div class="logo-wrapper">
        <img class="h-[30px] md:h-[35px] xl:h-[40px] w-auto" src="{{ $logo_src1 }}" alt="Logo Viva Luzern AG" />
    </div>
</a>
