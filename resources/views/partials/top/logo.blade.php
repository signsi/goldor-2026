@php
$logo_fb1 = \Roots\asset('images/logo-rocket-pink.svg');
$logo_fb2 = \Roots\asset('images/logo-rocket-black.svg');

$logo_src1 = App\getThemeOption('logo_main', $logo_fb1);
$logo_src2 = App\getThemeOption('logo_negative', $logo_fb2);
$company_name = App\getThemeOption('company_name');
@endphp

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
