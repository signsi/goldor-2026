@php
$lang_switch_position = App\getThemeOption('lang_selector_position');
$company_phone = App\getThemeOption('company_phone');
$phone_link = str_replace(' ', '', $company_phone);
$company_email = App\getThemeOption('company_email');
@endphp

<header class="header header--style2">
    <!-- Header Top -->
    <div class="header-top-wrapper bg-bright show-for-large">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 nav-wrapper-verticalcentered--streched">
                    <ul class="contact-list">
                        <li><a href="mailto:{{ $company_email }}">{{ $company_email }}</a></li>
                        <li><a href="tel:{{ $phone_link }}">{{ $company_phone }}</a></li>
                    </ul>
                    @include('partials.top.socialmedia-nav')
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top END -->

    <!-- Header Navigation -->
    <div class="header-navigation-wrapper" id="fixed">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle">
                <div class="cell auto nav-wrapper-verticalcentered--streched">
                    @include('partials.top.logo')
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