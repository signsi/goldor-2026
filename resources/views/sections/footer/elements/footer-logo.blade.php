@php
$logo_src = App\getThemeOption('logo_footer');
$company_name = App\getThemeOption('company_name');
@endphp

<div class="footer--logo">
    <a href="{{home_url("/")}}" rel="home">
        <img src="{{$logo_src}}" class="logo" alt="Logo {{$company_name}}" />
    </a>
</div>
