@extends('blocks.helpers.block-wrapper')

@section('content-section')

<section class="items-center py-section mt-20 lg:mt-0">
    <div class="justify-center">
        <div class="w-full mx-auto">
            @while (block_rows('event'))
            @php block_row('event') @endphp
                <div class="relative flex justify-between anim__animated anim__fadeInUp group">
                    @if ( block_sub_value('date') )
                        <div class="hidden w-24 pt-1 md:block ">
                            <p class="my-0 text-sm">{{ block_sub_value('date') }}</p>
                        </div>
                        <div class="absolute inline-block w-24 pt-2 left-16 -top-12 md:hidden ">
                            <p class="my-0 text-sm">{{ block_sub_value('date') }}</p>
                        </div>
                    @endif
                    <div class="flex flex-col items-center w-10 mr-4 md:w-24">
                        <div>
                            <div
                                class="flex items-center justify-center w-10 h-10 border border-primary rounded-full group-hover:bg-primary transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary w-4 h-4" viewBox="0 0 448 512">
                                    <path opacity="1" class="fill-primary group-hover:fill-white transition-all" d="M128 8c0-4.4-3.6-8-8-8s-8 3.6-8 8V64H64C28.7 64 0 92.7 0 128v48 16 96 16 96 16 32c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V416 400 304 288 192 176 128c0-35.3-28.7-64-64-64H336V8c0-4.4-3.6-8-8-8s-8 3.6-8 8V64H128V8zM432 288H304V192H432v96zM288 192v96H160V192H288zm-144 0v96H16V192H144zM16 304H144v96H16V304zm0 112H144v80H64c-26.5 0-48-21.5-48-48V416zm144 80V416H288v80H160zm144 0V416H432v32c0 26.5-21.5 48-48 48H304zm128-96H304V304H432v96zM112 80v40c0 4.4 3.6 8 8 8s8-3.6 8-8V80H320v40c0 4.4 3.6 8 8 8s8-3.6 8-8V80h48c26.5 0 48 21.5 48 48v48H16V128c0-26.5 21.5-48 48-48h48zM288 400H160V304H288v96z"/>
                                </svg>

                            </div>
                        </div>
                        <div class="w-px h-full bg-primary"></div>
                    </div>
                    <div class="relative flex-1 mb-24 lg:mb-16 bg-secondary rounded shadow group-hover:shadow-lg md:mb-8 transition-shadow group-hover:-translate-y-2 transition-transform">
                        <div class="absolute inline-block w-4 overflow-hidden -translate-y-1/2 top-7 -left-4">
                            <div
                                class="h-10 origin-top-right transform -rotate-45 bg-secondary drop-shadow-lg">
                            </div>
                        </div>
                        <div class="relative z-20 p-medium flex flex-col space-y-gutter @if ( block_value('layout') == 'horizontal' ) flex-col 2xl:flex-row items-start 2xl:space-x-gutter 2xl:space-y-0 @endif">
                            @if ( block_sub_value('image') )
                                <div class="!ml-0 w-full 2xl:w-auto">
                                    @include('blocks.helpers.image',
                                    [
                                        'name_ImageField' => 'image',
                                        'additionalClasses' => array('class' => 'w-full'),
                                        'thumbnail' => '4-3-thumb',
                                        'isRepeaterElement' => true
                                    ])
                                </div>
                            @endif
                            @if ( block_sub_value('text') )
                                <div class="flex flex-col w-full">
                                    <p class="my-0 font-bold">{{ block_sub_value('title') }}</p>
                                    <p class="text-sm max-w-max last:mb-0">
                                        {!! App\sanitize_out(block_sub_value('text'), 'text') !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endwhile
            {{ reset_block_rows( 'event' ) }}
        </div>
    </div>
</section>

@overwrite