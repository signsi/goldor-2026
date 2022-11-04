@php
    $id_num = wp_rand(0, PHP_INT_MAX);
    $accordion_id = 'extended-accordion-' . $id_num;
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="accordion not-prose" id="{{ $accordion_id }}">
        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 !pb-0" id="heading-{{ $accordion_id }}">
            <button class="accordion-button {{ App\getFirstAccordionItemActive()['collClass'] }} relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $accordion_id }}" aria-expanded="true" aria-controls="collapse-{{ $accordion_id }}">
                {{ block_value('title') }}
            </button>
            </h2>
            <div id="collapse-{{ $accordion_id }}" class="accordion-collapse collapse {{ App\getFirstAccordionItemActive()['showClass'] }}" aria-labelledby="heading-{{ $accordion_id }}" data-bs-parent="#{{ $accordion_id }}">
                <div class="accordion-body py-4 px-5 text-font">
                    {!! App\sanitize_out(block_value('inner-block'), 'allow_iframe' ) !!}
                </div>
            </div>
        </div>
    </div>
@overwrite