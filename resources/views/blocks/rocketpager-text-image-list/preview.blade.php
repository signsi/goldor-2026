@php
    $flex_type = App\setColumns(true);
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('flex-item-content')
        @while (block_rows('post'))
            @php block_row('post') @endphp
            <div class="col">
                <div class="image-wrapper">
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'image',
                        'thumbnail' => '16-9-thumb',
                        'isRepeaterElement' => true
                    ])
                </div>
                <div class="text-wrapper">
                    @if ( block_sub_value('title') )
                        <h3>{{ block_sub_value('title') }}</h3>
                    @endif
                    @if ( block_sub_value('Text') )
                        {!! App\sanitize_out(block_sub_value('Text'), 'text_area') !!}
                    @endif
                    @if ( block_sub_value('linklist') )
                        {!! App\sanitize_out(block_sub_value('linklist'), 'text_area') !!}
                    @endif
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'post' ) }}
@overwrite
