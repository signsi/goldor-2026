@php
    $input_label = 'search-' . wp_rand(0, PHP_INT_MAX)
@endphp

<div class="flex items-center mt-6 lg:mt-0">
    <div class="w-full max-w-md">
        <form class="searchform" role="search" method="get" action="{{ App\get_home_url() }}">
            <label for="{{ $input_label }}" class="sr-only">{{ App\pl__('Suche') }}</label>
            <div class="relative">
                <input id="{{ $input_label }}" name="s" class="search-input placeholder-primary transition-all ring-primary border-primary block w-full border bg-white py-3 pl-6 leading-5 focus:placeholder-font focus:border-font focus:ring-font placeholder:transition-colors outline-none ring-1 text-sm" placeholder="{{ App\pl__('Suchfeld - Suche') }}" type="search">
                <div class="icon-wrapper pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 xl:pr-6 transition-opacity">
                    <svg class="text-primary h-5 w-5 xl:h-6 xl:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        fill="currentColor">
                        <path d="M507.3 484.7l-141.5-141.5C397 306.8 415.1 259.7 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c51.68 0 98.85-18.96 135.2-50.15l141.5 141.5C487.8 510.4 491.9 512 496 512s8.188-1.562 11.31-4.688C513.6 501.1 513.6 490.9 507.3 484.7zM208 384C110.1 384 32 305 32 208S110.1 32 208 32S384 110.1 384 208S305 384 208 384z" />
                    </svg>
                </div>
            </div>
        </form>
    </div>
</div>
