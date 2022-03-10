@php
$fixed_cta_active = App\getThemeOption('fixed_cta');
$language_switcher_active = App\getThemeOption('language_switcher');
$social_share_active = App\getThemeOption('social_share');
$link_active = App\getThemeOption('link');
$link_url = App\getThemeOption('link_url');
$link_text = App\getThemeOption('link_text');
$search_active = App\getThemeOption('search');
@endphp


@if ($fixed_cta_active)
    <div class="sticky-cta show-for-large">
        <div class="sticky-cta-inner">
            @if ($language_switcher_active)
                @if (function_exists('pll_the_languages'))
                    @if ($lang_switch_position !== 'hide')
                        <div class="element-wrapper-lang">
                            <i class="fal fa-globe"></i>
                            <div class="content-wrapper">
                                <ul class="lang-switcher ">
                                    <?php pll_the_languages([
                                        'show_flags' => 0,
                                        'show_names' => 1,
                                        'hide_current' => 1,
                                        'no_translation' => 1,
                                    ]); ?>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @if ($search_active)
                <a class="element-wrapper" data-toggle="modal-search">
                    <i class="fal fa-search"></i>
                </a>
            @endif

            @if ($link_active)
                <a class="element-wrapper" href="{!! $link_url !!}" target="_blank">
                    <i class="fal fa-envelope"></i>
                    <div class="content-wrapper">
                        <p>{!! $link_text !!}</p>
                    </div>
                </a>
            @endif
            @if ($social_share_active)
                <div class="element-wrapper">
                    <i class="fal fa-share-alt"></i>
                    <div class="content-wrapper social-share">
                        @include('partials.social-share')
                    </div>
                </div>
            @endif
            <a class="element-wrapper" href="#" onclick="_speakpipe_open_widget(); return false;">
                <i class="fal fa-microphone"></i>
                <div class="content-wrapper">
                    <p>Voice Message</p>
                </div>
            </a>
        </div>
    </div>
@endif
