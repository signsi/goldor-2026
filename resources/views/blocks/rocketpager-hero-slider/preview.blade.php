@php
    $boxWidth = block_value('box-width');
    $boxAlignment = block_value('box-alignment');
    $textAlignment = block_value('text-alignment');
@endphp


@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-3'])


<div class="text-xs bg-grey text-white p-gutter">
    <strong><u>Einstellung der Textbox</u></strong>
    <br>
    Breite der Textbox:
    @switch($boxWidth)
        @case('max-w-tiny')
            Sehr schmale Breite des Contents
            @break
        @case('max-w-slim')
            Schmale Breite des Contents
            @break
        @case('max-w-default')
            Standardbreite des Contents
            @break
        @default
            Schmale Breite des Contents
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
                    <div class="px-gutter border border-solid border-gray">
                        <div class="{{ block_value('box-width') }}">
                            @if ( block_sub_value( 'title') )
                                <p class="font-bold">{{ block_sub_value('title') }}</p>
                            @endif
                            <div class="[&_*]:text-sm [&_*]:font-normal">
                                @if ( block_sub_value( 'text') )
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'slide' ) }}
@overwrite
