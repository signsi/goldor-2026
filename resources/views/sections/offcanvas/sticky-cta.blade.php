@php
    $fixed_cta_active = App\getThemeOption('cta');
    $cta_elements = [
        'phone' => App\getThemeOption('cta_phone'),
        'search' => App\getThemeOption('cta_search'),
        'link' => [
            'active' => App\getThemeOption('cta_link'),
            'url' => App\getThemeOption('cta_link_url'),
            'text' => App\getThemeOption('cta_link_text'),
        ],
        'scroll' => App\getThemeOption('cta_scroll_top'),
    ];
    $tel = App\getThemeOption('tel');
@endphp

@if ($fixed_cta_active)
    <div class="sticky-cta hidden lg:block right-0 bottom-auto top-[48vh] ease-in-out lg:-translate-y-[50%] 2xl:translate-y-0 w-auto z-20 fixed transition-all lg:max-w-[60px] 2xl:max-w-[80px] hover:max-w-none">
        <div class="sticky-cta-inner">
            @foreach ($cta_elements as $cta => $options)
                @if ($options === true)
                    @if ($cta === 'phone')
                        <a class="flex mb-4 shadow-md bg-white text-primary lg:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative outline-none hover:no-underline hover:cursor-pointer hover:right-0 transition-all" href="tel:{{ $tel }}" target="_blank">
                            <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center">
                                <svg class="hover:cursor-pointer fill-primary hover:fill-secondary h-7 w-7 transition-colors" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                                </svg>
                            </div>
                            <div class="flex items-center py-0 pl-5 pr-10 lg:h-[60px]">
                                <span class="text-base whitespace-nowrap hover:text-font transition-colors">{{ $tel }}</span>
                            </div>
                        </a>
                    @elseif ($cta === 'search')
                        <a class="flex mb-4 shadow-md bg-white text-primary lg:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative outline-none hover:no-underline hover:cursor-pointer hover:right-0 transition-all">
                            <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center">
                                <svg class="hover:cursor-pointer fill-primary hover:fill-secondary h-7 w-7 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M504.1 471l-134-134C399.1 301.5 415.1 256.8 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c48.79 0 93.55-16.91 129-45.04l134 134C475.7 509.7 481.9 512 488 512s12.28-2.344 16.97-7.031C514.3 495.6 514.3 480.4 504.1 471zM48 208c0-88.22 71.78-160 160-160s160 71.78 160 160s-71.78 160-160 160S48 296.2 48 208z"></path>
                                </svg>
                            </div>
                            <div class="flex items-center py-0 pl-5 pr-10 lg:h-[60px]">
                                <form class="searchform" role="search" method="get" action="{{ App\get_home_url() }}">
                                    <label for="search" class="sr-only">{{ App\pl__('Suche') }}</label>
                                    <div class="relative">
                                        <input id="search" name="s" class="placeholder-primary shadow-none block w-full border-0 bg-transparent py-3 pl-6 leading-5 focus:outline-none ring-0 focus:ring-0 text-base" placeholder="{{ App\pl__('Suchfeld - Suche') }}" type="search">
                                    </div>
                                </form>
                            </div>
                        </a>
                    @elseif ($cta === 'scroll')
                        <div id="to-top-button" class="float-right hidden mb-4 shadow-md bg-white text-primary lg:h-fit relative outline-none hover:no-underline hover:cursor-pointer transition-all">
                            <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center lg:w-[60px]">
                                <svg class="hover:cursor-pointer fill-primary hover:fill-secondary h-7 w-7 transition-colors" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                    <path d="M169.4 41.4c12.5-12.5 32.8-12.5 45.3 0l160 160c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H256V440c0 22.1-17.9 40-40 40H168c-22.1 0-40-17.9-40-40V256H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l160-160z"/>
                                </svg>
                            </div>
                        </div>
                    @endif
                @elseif (is_array($options) && $options['active'])
                    @if ($cta === 'link')
                        <a class="flex mb-4 shadow-md bg-white text-primary lg:h-[60px] lg:-ml-[60px] 2xl-ml-[80px] -right-full relative outline-none hover:no-underline hover:cursor-pointer hover:right-0 transition-all" href="{!! $options['url'] !!}" target="_blank">
                            <div class="lg:p-3 2xl:p-4 font-base flex justify-center items-center">
                                <svg class="hover:cursor-pointer fill-primary hover:fill-secondary h-7 w-7 transition-colors" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                                </svg>
                            </div>
                            <div class="flex items-center py-0 pl-5 pr-10 lg:h-[60px]">
                                <span class="text-base whitespace-nowrap hover:text-font transition-colors">{!! $options['text'] !!}</span>
                            </div>
                        </a>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endif

