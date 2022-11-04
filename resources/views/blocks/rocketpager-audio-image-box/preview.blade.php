@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-2'])

@section('flex-item-content')
        @if ( block_value( 'image'))
            <div class="">
                @include('blocks.helpers.background-image',
                [
                    'name_ImageField' => 'image',
                    'class_object_fill_breakpoint' => 'bg-object-wrapper',
                    'class_object_fit' => array('class' => 'object-cover object-center'),
                    'thumbnail' => 'medium-width',
                ])
            </div>
        @endif

        <div class="bg-primary ltr">
            <div class="text-wrapper">
                {!! App\sanitize_out(block_value( 'quote' ), 'inner_block') !!}
            </div>
            @include('blocks.helpers.audio',
            [
                'name_AudioField' => 'audio'
            ])
        </div>
@overwrite
