@extends('blocks.helpers.block-wrapper', ['element_classes' => 'content-slider'])

@section('content-section')
    @while ( block_rows('slide') )
        @php block_row('slide') @endphp
        <div>
            @include('blocks.helpers.image', 
            [
                'name_ImageField' => 'image',
                'additionalClasses' => array('class' => 'nolazyload'),
                'thumbnail' => 'full-width',
                'isRepeaterElement' => true
            ])
        </div>
    @endwhile
    {{ reset_block_rows('slide') }}
@overwrite