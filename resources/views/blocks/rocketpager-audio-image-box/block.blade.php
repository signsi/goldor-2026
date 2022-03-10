@php
    $direction = App\existsReturnKey('order', 'flex-direction: row-reverse;');
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="grid-x grid-margin-x" style="{{ $direction }}">
        <div class="cell small-12 medium-6 large-5">
            @include('blocks.helpers.background-image',
            [
                'name_ImageField' => 'image',
                'class_object_fill_breakpoint' => 'bg-object-wrapper--mediumUp',
                'class_object_fit' => array('class' => 'bg-object--contain'),
                'thumbnail' => 'medium-width',
                'isRepeaterElement' => false
            ])
        </div>
        @if ( block_value( 'quote'))
            <div class="cell small-12 medium-6 large-7 bg-primary">
                <div class="text-wrapper">
                    {!! App\sanitize_out(block_value( 'quote' ), 'inner_block') !!}
                </div>
                @include('blocks.helpers.audio',
                [
                    'name_AudioField' => 'audio'
                ])
            </div>
        @endif
    </div>
@overwrite