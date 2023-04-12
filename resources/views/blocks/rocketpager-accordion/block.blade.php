@php
    $id_num = wp_rand(0, PHP_INT_MAX);
    $accordion_id = 'simple-accordion-' . $id_num;
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')

    @if (block_rows('element'))
        <div class="accordion" id="{{ $accordion_id }}" data-accordion="collapse">
            @while (block_rows('element'))
                @php
                    block_row('element');
                    $identifier = App\echoDeepLinktitle() . '-' . $id_num;
                @endphp
                @if (!block_sub_value('hide-element'))
                    <div class="">
                        <h2 id="heading-{{ $identifier }}" class="text-base mb-0">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#body-{{ $identifier }}" aria-expanded="true"
                                aria-controls="body-{{ $identifier }}">
                                <span>
                                    {{ block_sub_value('title') }}
                                </span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="body-{{ $identifier }}" class="hidden p-5 border-gray-200 border border-b-0" aria-labelledby="heading-{{ $identifier }}">
                            {!! App\sanitize_out(block_sub_value('content'), 'text_area') !!}

                            {{-- <div
                                class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 [&>p]:text-font">
                            </div> --}}
                        </div>
                    </div>
                @endif
            @endwhile
        </div>

        {{ reset_block_rows('element') }}
    @endif
@overwrite
