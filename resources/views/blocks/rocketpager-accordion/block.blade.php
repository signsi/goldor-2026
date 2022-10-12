@php
    $id_num = wp_rand(0, PHP_INT_MAX);
    $accordion_id = 'simple-accordion-' . $id_num;
    $button_color = 'bg-' . block_value('color-button');
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    @if(block_rows('element'))
        <div class="accordion accordion-flush" id="{{ $accordion_id }}">
            @while (block_rows('element'))
                @php
                    block_row('element');
                    $identifier = App\echoDeepLinktitle() . '-' . $id_num;
                @endphp
                @if(!block_sub_value('hide-element'))
                    <div class="accordion-item {{ $button_color }} border border-x-0 border-white rounded-none">
                        <h4 class="accordion-header mb-0 !pb-0" id="heading-{{ $identifier }}">
                        <button class="accordion-button {{ App\getFirstAccordionItemActive(block_row_index())['collClass'] }} relative px-gutter py-3 flex items-center w-full text-font text-left border-0 rounded-none shadow-none transition focus:outline-none
                        after:font-icon after:antialiased after:normal-nums after:leading-none after:!bg-none after:flex after:justify-center after:items-center"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $identifier }}" aria-expanded="true" aria-controls="collapse-{{ $identifier }}">
                            <span class="font-semibold mr-4">{{ block_sub_value('title') }}</span>
                        </button>
                        </h4>
                        <div id="collapse-{{ $identifier }}" class="accordion-collapse collapse {{ App\getFirstAccordionItemActive(block_row_index())['showClass'] }}" aria-labelledby="heading-{{ $identifier }}" data-bs-parent="#{{ $accordion_id }}">
                        <div class="accordion-body p-gutter">
                            {!! App\sanitize_out(block_sub_value('content'), 'text_area' ) !!}
                        </div>
                        </div>
                    </div>
                @endif
            @endwhile
            {{ reset_block_rows( 'element' ) }}
        </div>
    @endif
@overwrite