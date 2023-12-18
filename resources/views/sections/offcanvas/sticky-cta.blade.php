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
    <div class="sticky-cta -translate-y-1/2 w-auto fixed z-20 transition-all top-1/2 bottom-auto hidden md:block">
        @foreach ($cta_elements as $cta => $options)
            @if ($options === true)
                @if ($cta === 'phone')
                    <div class="group transition-transform translate-x-[calc(-100%_+_52px)] hover:translate-x-0 mb-1">
                        <a class="flex flex-row-reverse items-center transition-colors bg-primary text-white group-hover:bg-white group-hover:text-primary" href="tel:{{ $tel }}">
                            <i class="fal fa-phone-alt flex justify-center p-4 font-light text-[20px]"></i>
                            <div class="flex items-center pr-2 pl-4">
                                <p class="text-sm my-0">{{ $tel }}</p>
                            </div>
                        </a>
                    </div>
                @elseif ($cta === 'search')
                    <div class="group transition-transform translate-x-[calc(-100%_+_52px)] hover:translate-x-0 mb-1">
                        <span class="flex flex-row-reverse items-center transition-colors bg-primary text-white group-hover:bg-white group-hover:text-primary">
                            <i class="fal fa-magnifying-glass flex justify-center p-4 font-light text-[20px]"></i>
                            <div class="flex items-center pr-2 pl-4">
                                <form class="searchform" role="search" method="get" action="{{ App\get_home_url() }}">
                                    <label for="search" class="sr-only">{{ App\pl__('Suche') }}</label>
                                    <div class="relative">
                                        <input id="search" name="s" class="placeholder-primary shadow-none block w-full border-0 bg-transparent py-3 pl-6 leading-5 focus:outline-none ring-0 focus:ring-0 text-sm" placeholder="{{ App\pl__('Suchfeld - Suche') }}" type="search">
                                    </div>
                                </form>
                            </div>
                        </span>
                    </div>
                @endif
            @elseif (is_array($options) && $options['active'])
                @if ($cta === 'link')
                    <div class="group transition-transform translate-x-[calc(-100%_+_52px)] hover:translate-x-0 mb-1">
                        <a href="{!! $options['url'] !!}" class="flex flex-row-reverse items-center transition-colors bg-primary text-white group-hover:bg-white group-hover:text-primary">
                            <i class="fal fa-envelope flex justify-center p-4 font-light text-[20px]"></i>
                            <div class="flex items-center pr-2 pl-4">
                                <p class="text-sm my-0">{!! $options['text'] !!}</p>
                            </div>
                        </a>
                    </div>
                @endif
            @endif
        @endforeach
        @if ($options === true)
            @if ($cta === 'scroll')
                <div id="to-top-button" class="absolute group cursor-pointer transition-transform translate-x-[calc(-100%_+_52px)] mb-1">
                    <span class="flex flex-row-reverse items-center transition-colors bg-primary text-white group-hover:bg-white group-hover:text-primary" href="tel:{{ $tel }}">
                        <i class="fal fa-arrow-up-to-arc flex justify-center p-4 font-light text-[20px]"></i>
                    </span>
                </div>
            @endif
        @endif
    </div>
@endif