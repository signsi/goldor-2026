@php
    $flex_type = App\setColumns(true);
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('flex-item-content')
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
@overwrite
