@php
    $hidden = block_value('hideElement');
@endphp

@extends('blocks.helpers.preview-wrapper')

@section('flex-item-content')
    @if(block_rows('element'))
        @while (block_rows('element'))
            @php
                block_row('element');
            @endphp
            <div class="relative accordion-item">
                @if(block_sub_value('hide-element') && !$hidden)
                    <div class="absolute w-full h-full grid place-items-center inset-0 bg-[rgba(255,0,0,0.5)] z-10">
                        <h2 class="text-red-600 text-center">Element wird Live nicht angezeigt.</h2>
                    </div>
                @endif
                <h2 class="accordion-title">{{ block_sub_value('title') }}</h2>
                <div class="accordion-body">
                    {!! App\sanitize_out(block_sub_value('content'), 'text_area' ) !!}
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'element' ) }}
    @endif
@overwrite
