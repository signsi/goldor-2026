@php
$logo_src1 = App\asset_path('images/logo-rocket-pink.svg');//App\getThemeOption('logo_main');
$logo_src2 = App\getThemeOption('logo_negative');
$company_name = App\getThemeOption('company_name');

@endphp

{{-- @asset('images/logo-rocket-pink.svg') --}}

<a href="{{home_url("/")}}" rel="home">
    <div class="logo-wrapper animate__animated animate__fadeIn">
        <div class="logo not-sticky">
            <img src="{{$logo_src1}}" alt="Logo {{$company_name}}" /> 
        </div>
        <div class="logo sticky">
            <img src="{{$logo_src2}}" alt="Logo {{$company_name}}" /> 
        </div>
    </div>
</a>
