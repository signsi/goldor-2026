@php
    $id_num = wp_rand(0, PHP_INT_MAX);
    $accordion_id = 'extended-accordion-' . $id_num;
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="accordion" id="{{ $accordion_id }}">
        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header m-0 p-0" id="heading-{{ $accordion_id }}">
                <button
                    class="accordion-button {{ App\getFirstAccordionItemActive()['collClass'] }} group relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                    type="button" data-te-collapse-init data-te-collapse-collapsed data-te-toggle="collapse"
                    data-te-target="#collapse-{{ $accordion_id }}" aria-expanded="true"
                    aria-controls="collapse-{{ $accordion_id }}">
                    {{ block_value('title') }}
                    <span
                        class="ml-auto -mr-1 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </button>
            </h2>
            <div id="collapse-{{ $accordion_id }}"
                class="hidden {{ App\getFirstAccordionItemActive()['showClass'] }}"
                aria-labelledby="heading-{{ $accordion_id }}" data-te-parent="#{{ $accordion_id }}">
                <div class="accordion-body py-4 px-5 text-font">
                    {!! App\sanitize_out(block_value('inner-block'), 'allow_iframe') !!}
                </div>
            </div>
        </div>
    </div>
@overwrite
