@php
    $id_num = wp_rand(0, PHP_INT_MAX);
    $accordion_id = 'simple-accordion-' . $id_num;
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')

    @if (block_rows('element'))
        <div class="accordion" id="{{ $accordion_id }}">
            @while (block_rows('element'))
                @php
                    block_row('element');
                    $identifier = App\echoDeepLinktitle() . '-' . $id_num;
                @endphp
                @if (!block_sub_value('hide-element'))
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="heading-{{ $identifier }}">
                            <button
                                class="group relative flex w-full items-center rounded-none border-0 bg-white py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                type="button" data-te-collapse-init data-te-toggle="collapse"
                                data-te-target="#collapse-{{ $identifier }}" {{-- aria-expanded="true" --}}
                                data-te-collapse-collapsed
                                aria-controls="collapse-{{ $identifier }}">
                                {{ block_sub_value('title') }}
                                <span class="ml-auto -mr-1 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $identifier }}" class="hidden" data-te-parent="#{{ $accordion_id }}">
                            <div class="accordion-body py-4 px-5 text-font">
                                {!! App\sanitize_out(block_sub_value('content'), 'text_area') !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endwhile
            {{ reset_block_rows('element') }}
        </div>
    @endif
@overwrite
