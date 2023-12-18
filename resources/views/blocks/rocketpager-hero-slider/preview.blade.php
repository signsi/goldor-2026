@php
    $containerWidth = block_value('container-width');
    $boxWidth = block_value('box-width');
    $boxAlignment = block_value('box-alignment');
    $textAlignment = block_value('text-alignment');
@endphp


@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-1'])


<div class="text-xs bg-grey text-white p-medium">
    <strong><u>Einstellung der Textbox</u></strong>
    <br>
    Breite der Textbox:
    @switch($containerWidth)
        @case('max-w-content-small')
            Schmale Containerbreite
            @break
        @case('max-w-content-default')
            Standardbreite Container
            @break
        @case('max-w-content-wide')
            Weite Containerbreite
            @break
        @default
            Standardbreite Container
    @endswitch
    <br>
    Ausrichtung der Textbox:
    @switch($boxAlignment)
        @case('justify-start items-start')
            oben links
            @break

        @case('justify-start items-center')
            mittig links
            @break

        @case('justify-start items-end')
            unten links
            @break

        @case('justify-center items-start')
            oben mittig
            @break

        @case('justify-center items-center')
            mittig mittig
            @break

        @case('justify-center items-end')
            unten mittig
            @break

        @case('justify-end items-start')
            rechts oben
            @break

        @case('justify-end items-center')
            rechts mittig
            @break

        @case('justify-end items-end')
            rechts unten
            @break

        @default
            Standardausrichtung, wenn keiner der oben genannten Werte ausgewählt ist
    @endswitch
    @if ( block_value('arrow-down') )
        <br>Scroll Down-Button ist aktiviert 
    @endif
    <br>
    Ausrichtung des Textes:
    @switch($textAlignment)
        @case('text-left')
            linksbündig
            @break

        @case('text-center')
            zentriert
            @break

        @case('text-right')
            rechtsbündig
            @break
    @endswitch

    @if ( block_value('box-bg') )
        <br>
        Textbox farblich hinterlegt
    @endif
    @if ( block_value('enable-stoerer') )
        <br>
        Textbox als Störer
    @endif
</div>

@section('flex-item-content')
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div>
                <picture>
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'header-image',
                        'additionalClasses' => array('class' => 'full'),
                        'thumbnail' => 'full',
                        'isRepeaterElement' => true
                    ])
                </picture>
                @if ( block_sub_value( 'title') )
                    <div class="p-gutter border border-solid border-gray">
                        <div class="{{ block_value('box-width') }}">
                            <span class="heading-1 !my-0">{!! App\sanitize_out(block_sub_value('title'), 'text_area') !!}</span>
                            @if (block_sub_value('text'))
                                <div class="[&_*]:text-lg [&_*]:font-normal">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                            @if (block_sub_value('button-text'))
                                <div class="wp-block-buttons mt-large">
                                    <div class="wp-block-button">
                                        <a class="wp-block-button__link wp-element-button">{{ block_sub_value('button-text') }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'slide' ) }}
@overwrite
