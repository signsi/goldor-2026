@php
    $fixed_cta_active = App\getThemeOption('cta');
    $cta_elements = [
        'phone' => App\getThemeOption('cta_phone'),
        'search' => App\getThemeOption('cta_search'),
        'contact_link' => [
            'active' => App\getThemeOption('cta_link'),
            'url' => App\getThemeOption('cta_link_url'),
            'text' => App\getThemeOption('cta_link_text'),
        ],
        'scroll' => App\getThemeOption('cta_scroll_top'),
    ];
    $tel = App\getThemeOption('tel');
    $tel_link = str_replace(' ', '', $tel);
@endphp

@if ($fixed_cta_active)
    <div class="sticky-cta -translate-y-1/2 w-auto fixed z-20 transition-all top-1/2 bottom-auto hidden md:block anim__animated anim__fadeIn">
        @foreach ($cta_elements as $cta => $options)
            @if ($options === true)
                @if ($cta === 'phone')
                    <div class="group transition-transform translate-x-[calc(-100%_+_32px)] lg:translate-x-[calc(-100%_+_52px)] hover:translate-x-0 mb-1">
                        <a class="flex flex-row-reverse items-center transition-colors bg-secondary text-white group-hover:bg-white group-hover:text-secondary" href="tel:{{ $tel_link }}">
                            <i class="fal fa-phone-alt flex justify-center p-2 lg:p-4 font-light text-[16px] lg:text-[20px]"></i>
                            <div class="flex items-center pr-1 pl-2 lg:pr-2 lg:pl-4">
                                <p class="text-sm my-0">{{ $tel }}</p>
                            </div>
                        </a>
                    </div>
                @elseif ($cta === 'search')
                    <div class="group transition-transform translate-x-[calc(-100%_+_32px)] lg:translate-x-[calc(-100%_+_52px)] hover:translate-x-0 mb-1">
                        <span class="flex flex-row-reverse items-center transition-colors bg-secondary text-white group-hover:bg-white group-hover:text-secondary">
                            <i class="fal fa-magnifying-glass flex justify-center p-2 lg:p-4 font-light text-[16px] lg:text-[20px]"></i>
                            <div class="flex items-center pr-1 pl-2 lg:pr-2 lg:pl-4">
                                <form class="searchform" role="search" method="get" action="{{ App\get_home_url() }}">
                                    <label for="search" class="sr-only">{{ App\pl__('Suche') }}</label>
                                    <div class="relative">
                                        <input id="search" name="s" class="placeholder-secondary shadow-none block w-full border-0 bg-transparent py-0 lg:py-3 pl-6 leading-5 focus:outline-none ring-0 focus:ring-0 text-sm" placeholder="{{ App\pl__('Suchfeld - Suche') }}" type="search">
                                    </div>
                                </form>
                            </div>
                        </span>
                    </div>
                @endif
            @elseif (is_array($options) && $options['active'])
                @if ($cta === 'contact_link')
                    <div class="group transition-transform translate-x-[calc(-100%_+_32px)] lg:translate-x-[calc(-100%_+_52px)] hover:translate-x-0 mb-1">
                        <a href="{!! $options['url'] !!}" class="flex flex-row-reverse items-center transition-colors bg-secondary text-white group-hover:bg-white group-hover:text-secondary">
                            <i class="fal fa-envelope flex justify-center p-2 lg:p-4 font-light text-[16px] lg:text-[20px]"></i>
                            <div class="flex items-center pr-1 pl-2 lg:pr-2 lg:pl-4">
                                <p class="text-sm my-0">{!! $options['text'] !!}</p>
                            </div>
                        </a>
                    </div>
                @endif
            @endif
        @endforeach
        @if ($options === true)
            @if ($cta === 'scroll')
                <div id="to-top-button" class="absolute group cursor-pointer transition-transform translate-x-[calc(-100%_+_32px)] lg:translate-x-[calc(-100%_+_52px)] mb-1">
                    <span class="flex flex-row-reverse items-center transition-colors bg-secondary text-white group-hover:bg-white group-hover:text-secondary" href="tel:{{ $tel }}">
                        <i class="fal fa-arrow-up-to-arc flex justify-center p-2 lg:p-4 font-light text-[16px] lg:text-[20px]"></i>
                    </span>
                </div>
            @endif
        @endif
    </div>
@endif