@php
    $direction = App\existsReturnKey('order', ' reverse');
    $offset = App\existsReturnKey('offset-image', ' offset');
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="grid-x grid-margin-x small-up-1 medium-up-2{{ $direction }}{{ $offset }}">
        @if ( block_value( 'image'))
            <div class="cell">
                @if ( block_value('image-representation') == 'cover' )
                    @include('blocks.helpers.background-image',
                    [
                        'name_ImageField' => 'image',
                        'class_object_fill_breakpoint' => 'bg-object-wrapper--mediumUp',
                        'class_object_fit' => array('class' => 'bg-object--cover'),
                        'thumbnail' => 'medium-width',
                    ])
                @else
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'image',
                        'thumbnail' => 'medium-width',
                    ])
                @endif
            </div>
        @endif

        @if ( block_value( 'text'))
            <div class="cell {{ block_value('bgcolor-textbox') }}">
                <div class="text-wrapper">
                    @if ( block_value('title') )
                        <h3>{{ block_value('title') }}</h3>
                    @endif
                    {!! App\sanitize_out(block_value('text'), 'text_area') !!}
                </div>
                @if ( block_value('linklist') )
                    <div class="linklist-wrapper">
                        {!! App\sanitize_out(block_value('linklist'), 'text_area') !!}
                    </div>
                @endif
            </div>
        @endif
    </div>
@overwrite
