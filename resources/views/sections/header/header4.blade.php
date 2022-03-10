@php
$lang_switch_position = App\getThemeOption('lang_selector_position');
@endphp

<header class="header header--style4">
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