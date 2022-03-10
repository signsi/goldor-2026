@php
$image = 'image-' . $orientation;
$container = $image . '-contain';
@endphp

@switch(block_value('layout'))
    @case('grid-50-50')
            @php $thumbnail = 'medium-width' @endphp
        @break

    @case('grid-100')
        @php $thumbnail = 'large-width' @endphp
        @break
    @default
        @php $thumbnail = 'medium-large-width' @endphp
@endswitch


@if (block_field('activate-lightbox', false))
    <a href='{{ block_field($image) }}' data-rel='lightbox'>
@else
    <a class='no-lightbox'>
@endif

    <picture>
        @if( block_value($image))
            @if( block_value($container))
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => $image,
                    'additionalClasses' => array('class' => 'bg-object--contain'),
                    'thumbnail' => $thumbnail
                ])
            @else
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => $image,
                    'additionalClasses' => array('class' => 'bg-object--cover'),
                    'thumbnail' => $thumbnail
                ])
            @endif
        @endif
    </picture>

</a>
