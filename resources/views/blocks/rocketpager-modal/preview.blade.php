@extends('blocks.helpers.block-wrapper', ['element_classes' => '', 'ignoreAnimation' => false])

@section('content-section')

    <div class="wp-block-buttons @if ( !block_value( 'add-open-modal')) hidden @endif">
        <div class="wp-block-button">
            <a class="wp-block-button__link show-modal mb-element">{{ block_value('add-open-buttontext') }}</a>
        </div>
    </div>

    <div class="flex justify-center items-center bg-black bg-opacity-50 z-10 p-8">
        <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
            @if ( block_value('title'))
                <div class="px-8 pt-8 flex justify-between items-start">
                    <h3>{{ block_value('title') }}</h3>
                    <i class="fa-solid fa-circle-xmark close-modal hover:cursor-pointer text-primary hover:text-font transition-colors"></i>
                </div>
            @endif
            <div class="px-8 pt-0 pb-8">
                @if ( block_value('text'))
                    {!! App\sanitize_out(block_value('text'), 'text_area') !!}
                @endif
                @if ( block_value('button-text'))
                    <div class="wp-block-buttons">
                        <div class="wp-block-button">
                            <a href="{{ block_value('button-link') }}" class="wp-block-button__link">{{ block_value('button-text') }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@overwrite