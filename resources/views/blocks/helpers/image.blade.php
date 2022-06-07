{{--
Aufruf:
@include('blocks.helpers.image',
    [
        'name_ImageField' => 'image',                                   -> Name des Feldes für das Bild
        'additionalClasses' => array('class' => 'margin-medium-r'),     -> (optional) zusätzlich Klassen für das Bild
        'thumbnail' => 'medium',                                        -> (optional) Grösse des Bildes (Thumbnail)
        'isRepeaterElement' => false                                    -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
    ])

    Enthält das RocketPager-Element ein Feld mit dem Namen "figcaption", so wird Unterhalb des Bildes eine Bildunterschrift ausgegeben.
--}}

@php
    $additionalClasses = $additionalClasses ?? '';
    $thumbnail = $thumbnail ?? 'full';
    $isRepeaterElement = $isRepeaterElement ?? false;

    $attachment_id = $isRepeaterElement ? block_sub_value($name_ImageField) : block_value($name_ImageField);
    $figcaption = App\existsReturnVal('figcaption');
@endphp

@if( $attachment_id )
    {!! wp_get_attachment_image( $attachment_id , $thumbnail, false, $additionalClasses) !!}
    @if($figcaption)
        <figcaption>{{ $figcaption }}</figcaption>
    @endif
@endif