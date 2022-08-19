@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="flex justify-center items-center">
        <div class="grid gap-x-12 sm:gap-x-14 md:gap-x-16 lg:gap-x-18 xl:gap-x-24 gap-y-8  grid-cols-2 sm:grid-cols-3 md:grid-cols-5 text-center md:text-left">
            @while (block_rows('number'))
                @php block_row('number') @endphp
                <div>
                    @if ( block_sub_value('number') )
                        <span class="count text-5xl text-white font-normal italic font-serif">{{ block_sub_value('number') }}</span>
                    @endif
                    @if ( block_sub_value('title') )
                        <div>
                            <p>{{ block_sub_value('title') }}</p>
                        </div>
                    @endif
                </div>
            @endwhile
            {{ reset_block_rows( 'number' ) }}
        </div>
    </div>

@overwrite