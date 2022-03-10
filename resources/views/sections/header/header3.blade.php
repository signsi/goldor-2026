@php
$lang_switch_position = App\getThemeOption('lang_selector_position');
$logo_src1 = App\getThemeOption('logo_main');
$logo_src2 = App\getThemeOption('logo_negative');
$company_name = App\getThemeOption('company_name');
@endphp

<header class="header header--style3">
    <!-- Header Navigation -->
    <div class="header-navigation-wrapper" id="fixed">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle">
                <div class="cell auto large-12 nav-wrapper-verticalcentered--middle not-sticky">
                    @include('partials.top.logo')
                </div>
                <div class="cell auto nav-wrapper-verticalcentered--middle">
                    <a href="{{home_url("/")}}" rel="home">
                        <div class="logo-wrapper animate__animated animate__fadeIn">
                            <div class="logo sticky">
                                <img src="{{$logo_src2}}" alt="Logo {{$company_name}}" /> 
                            </div>
                        </div>
                    </a>
                    <nav class="show-for-large">
                        @include('partials.top.topnav')
                    </nav>
                    @include('partials.top.hamburger')
                </div>
            </div>
        </div>
    </div>
    <!-- Header Navigation END -->
</header>