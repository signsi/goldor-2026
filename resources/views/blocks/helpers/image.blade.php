{{--
Aufruf:
@include('blocks.helpers.image',
    [
        'name_ImageField' => 'image',                                   -> Name des Feldes für das Bild
        'additionalClasses' => array('class' => 'margin-medium-r'),     -> (optional) zusätzlich Klassen für das Bild
        'thumbnail' => 'medium',                                        -> (optional) Grösse des Bildes (Thumbnail)
        'isRepeaterElement' => false                                    -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default),
        'identifierLightbox' => $idLightbox                             -> (optional) Bilder mit gleichem Identifier werden in der gleichen Lightbox dargestellt.
                                                                            Mit Identifier 'single', wird das Bild in einer einfache Lightbox dargestell,
    ])

    Enthält das RocketPager-Element ein Feld mit dem Namen "figcaption", so wird Unterhalb des Bildes eine Bildunterschrift ausgegeben.
--}}

@php
    $additionalClasses = $additionalClasses ?? '';
    $thumbnail = $thumbnail ?? 'full';
    $isRepeaterElement = $isRepeaterElement ?? false;
    $identifierLightbox = $identifierLightbox ?? false;

    $attachment_id = $isRepeaterElement ? block_sub_value($name_ImageField) : block_value($name_ImageField);
    $figcaption = App\existsReturnVal('figcaption');
@endphp

@if( $attachment_id )
    @if($identifierLightbox)
        <a href='{{ wp_get_attachment_image_url($attachment_id, 'full') }}' data-fancybox="{{ $identifierLightbox }}" data-caption="{{ $figcaption ? $figcaption : get_the_title($attachment_id) }}">
    @endif

        <figure>{!! wp_get_attachment_image( $attachment_id , $thumbnail, false, $additionalClasses) !!}
        
            @if($figcaption)
                <figcaption>{{ $figcaption }}</figcaption>
            @endif

        </figure>

    @if($identifierLightbox)
        </a>
    @endif

@endif