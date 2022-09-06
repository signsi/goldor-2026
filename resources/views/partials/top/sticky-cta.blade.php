@php
$fixed_cta_active = App\getThemeOption('cta');
$language_switcher_active = App\getThemeOption('cta_lang_switcher');
$social_share_active = App\getThemeOption('cta_social_share');
$link_active = App\getThemeOption('cta_link');
$link_url = App\getThemeOption('cta_link_url');
$link_text = App\getThemeOption('cta_link_text');
$search_active = App\getThemeOption('cta_search');

@endphp


@if ($fixed_cta_active)
    <div class="sticky-cta hidden lg:block bottom-auto top-1/2 -translate-y-[50%] w-auto z-20 fixed transition-all">
        <div class="sticky-cta-inner">
            @if ($language_switcher_active)
                @if (function_exists('pll_the_languages'))
                    @if ($lang_switch_position !== 'hide')
                        <div class="element-wrapper-lang element-wrapper block mb-2 bg-primary text-white h-[60px] p-0 relative outline-none">
                            <i class="fal fa-globe bg-primary font-light text-white relative min-w-[60px] h-[60px] font-base transition-colors flex justify-center items-center"></i>
                            <div class="content-wrapper absolute top-0 transition-all translate-x-0 flex items-center bg-white h-[60px] l-[60px]">
                                <ul class="lang-switcher m-0 list-none flex">
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
                <a class="element-wrapper block mb-2 bg-primary text-white h-[60px] p-0 relative outline-none" data-toggle="modal-search">
                    <i class="fal fa-search bg-primary font-light text-white relative min-w-[60px] h-[60px] font-base transition-colors flex justify-center items-center"></i>
                </a>
            @endif

            @if ($link_active)
                <a class="element-wrapper block mb-2 bg-primary text-white h-[60px] p-0 relative outline-none" href="{!! $link_url !!}" target="_blank">
                    <i class="fal fa-envelope bg-primary font-light text-white relative min-w-[60px] h-[60px] font-base transition-colors flex justify-center items-center"></i>
                    <div class="content-wrapper absolute top-0 transition-all translate-x-0 flex items-center bg-white h-[60px] l-[60px]">
                        <p>{!! $link_text !!}</p>
                    </div>
                </a>
            @endif
            @if ($social_share_active)
                <div class="element-wrapper block mb-2 bg-primary text-white h-[60px] p-0 relative outline-none">
                    <i class="fal fa-share-alt bg-primary font-light text-white relative min-w-[60px] h-[60px] font-base transition-colors flex justify-center items-center"></i>
                    <div class="content-wrapper absolute top-0 transition-all translate-x-0 flex items-center bg-white h-[60px] l-[60px] social-share">
                        @include('partials.social-share')
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
