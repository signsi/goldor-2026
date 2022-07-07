@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    @while ( block_rows('slide') )
        @php
            block_row('slide');
            $wrapper_classes = 'slides bg-object-wrapper ' .  block_value('slider-height');
        @endphp
        @include('blocks.helpers.background-image',
        [
            'name_ImageField' => 'header-image',
            'class_object_fill_breakpoint' => $wrapper_classes,
            'class_object_fit' => array('class' => 'bg-object--cover'),
            'thumbnail' => 'full',
            'isRepeaterElement' => true
        ])
    @endwhile
    {{ reset_block_rows( 'slide' ) }}
@overwrite