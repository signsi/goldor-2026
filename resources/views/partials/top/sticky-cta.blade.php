@php
$fixed_cta_active = App\getThemeOption('cta');
$language_switcher_active = App\getThemeOption('cta_lang_switcher');
$social_share_active = App\getThemeOption('cta_social_share');
$link_active = App\getThemeOption('cta_link');
$link_url = App\getThemeOption('cta_link_url');
$link_text = App\getThemeOption('cta_link_text');
$search_active = App\getThemeOption('cta_search');
$phone_active = App\getThemeOption('cta_phone');
$scroll_active = App\getThemeOption('cta_scroll_top');
$mail = App\getThemeOption('company_email');
$tel = App\getThemeOption('tel');

@endphp


@if ($fixed_cta_active)
    <div class="sticky-cta hidden lg:block right-0 bottom-auto top-[48vh] ease-in-out lg:-translate-y-[50%] 2xl:translate-y-0 w-auto z-20 fixed transition-all lg:max-w-[60px] 2xl:max-w-[80px] hover:max-w-none">
        <div class="sticky-cta-inner">
            @if ($phone_active)
                <a class="flex mb-4 shadow-md bg-white text-primary lg:h-[40px] 2xl:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative rounded-l-full outline-none hover:no-underline hover:cursor-pointer hover:right-0 transition-all" href="tel:{{ $tel }}" target="_blank">
                    <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center">
                        <svg class="w-auto lg:h-6 2xl:h-7" width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M38.1764 35.95V27.59C38.1764 26.65 37.5264 25.84 36.6064 25.64L30.2864 24.24C29.5964 24.09 28.8764 24.31 28.3964 24.83L23.2764 30.3C12.1764 26 9.12643 16.35 9.12643 16.35L14.3164 11.76C14.8464 11.29 15.0964 10.57 14.9564 9.87L13.5064 2.61C13.3164 1.68 12.4964 1 11.5464 1H3.03643C1.96643 1 1.08643 1.83 1.03643 2.9C0.706433 10.31 1.89643 36.93 36.1064 37.97C37.2364 38 38.1864 37.1 38.1864 35.97L38.1764 35.95Z" fill="#E5ECDA" stroke="#7BA048" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex items-center py-0 pl-5 pr-10 lg:h-[40px] 2xl:h-[60px]">
                        <span class="text-base xl:text-xl hover:text-font transition-colors">{{ $tel }}</span>
                    </div>
                </a>
            @endif
            @if ($search_active)
                <a class="flex mb-4 shadow-md bg-white text-primary lg:h-[40px] 2xl:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative rounded-l-full outline-none hover:no-underline hover:cursor-pointer hover:right-0 transition-all">
                    <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center">
                        <svg class="w-auto lg:h-6 2xl:h-7" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.4377 24.565L24.4995 21.5032L39.6245 36.6282C40.3811 37.3848 40.3882 38.6222 39.6245 39.3859L39.3134 39.697C38.5568 40.4536 37.3194 40.4607 36.5557 39.697L21.4307 24.572L21.4377 24.565Z" fill="#E5ECDA" stroke="#7BA048" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 29C22.732 29 29 22.732 29 15C29 7.26801 22.732 1 15 1C7.26801 1 1 7.26801 1 15C1 22.732 7.26801 29 15 29Z" fill="#E5ECDA" stroke="#7BA048" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 24.5C20.2467 24.5 24.5 20.2467 24.5 15C24.5 9.75329 20.2467 5.5 15 5.5C9.75329 5.5 5.5 9.75329 5.5 15C5.5 20.2467 9.75329 24.5 15 24.5Z" fill="white" stroke="#7BA048" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex items-center py-0 pl-5 pr-10 lg:h-[40px] 2xl:h-[60px]">
                        <form class="searchform" role="search" method="get" action="{{ App\get_home_url( '/' ) }}">
                            <label for="search" class="sr-only">{{ App\pl__('Suche') }}</label>
                            <div class="relative">
                                <input id="search" name="s" class="placeholder-primary shadow-none block w-full border-0 bg-transparent py-3 pl-6 leading-5 focus:outline-none ring-0 focus:ring-0 text-base xl:text-xl" placeholder="{{ App\pl__('Suchfeld - Suche') }}" type="search">
                            </div>
                        </form>
                    </div>
                </a>
            @endif
            @if ($link_active)
                <a class="flex mb-4 shadow-md bg-white text-primary lg:h-[40px] 2xl:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative rounded-l-full outline-none hover:no-underline hover:cursor-pointer hover:right-0 transition-all" href="{!! $link_url !!}" target="_blank">
                    <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center">
                        <svg class="w-auto lg:h-6 2xl:h-7" width="46" height="36" viewBox="0 0 46 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L23 23.67L45 1" fill="#E5ECDA"/>
                            <path d="M1 1L23 23.67L45 1" stroke="#7BA048" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M45 1H1V35H45V1Z" stroke="#7BA048" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex items-center py-0 pl-5 pr-10 lg:h-[40px] 2xl:h-[60px]">
                        <span class="text-base xl:text-xl hover:text-font transition-colors">{!! $link_text !!}</span>
                    </div>
                </a>
            @endif
            @if ($scroll_active)
                <div id="to-top-button" class="flex mt-20 lg:h-[40px] 2xl:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative cursor-pointer !opacity-100 group">
                    <a class="hidden">
                        <div class="pl-4 font-base flex justify-center items-center transition group-hover:ease-in-out group-hover:delay-150 group-hover:scale-105">
                            <svg class="w-auto h-9" width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="27" cy="27" r="26" fill="#7BA048" stroke="white" stroke-width="2"/>
                                <path d="M25.5 42C25.5 42.8284 26.1716 43.5 27 43.5C27.8284 43.5 28.5 42.8284 28.5 42L25.5 42ZM28.0607 11.9393C27.4749 11.3536 26.5251 11.3536 25.9393 11.9393L16.3934 21.4853C15.8076 22.0711 15.8076 23.0208 16.3934 23.6066C16.9792 24.1924 17.9289 24.1924 18.5147 23.6066L27 15.1213L35.4853 23.6066C36.0711 24.1924 37.0208 24.1924 37.6066 23.6066C38.1924 23.0208 38.1924 22.0711 37.6066 21.4853L28.0607 11.9393ZM28.5 42L28.5 13L25.5 13L25.5 42L28.5 42Z" fill="white"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endif
