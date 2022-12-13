{{--
Aufruf:
@include('blocks.helpers.social-link',
    [
        'media_name' => Linkedin,                                   -> Name des Social-Media-Kanals,
        'media_link' => https://www.linkedin.com/company/3156472/,  -> Link des Social-Media-Kanals,
        'icon_classes' => 'fab fa-linkedin'                         -> Klassen welche gebraucht werden um das Icon des Scoial-Media-Kanals darzustellen
        'anchor_classes' => 'text-primary hover:text-font'          -> Klassen für das Styling der Links
        'noListitem' => false                                       -> (Optional) Wenn true wird der Social-Link nicht als Listitem dargestelt (Default: false)
    ])
--}}

@php
    $media_name = $media_name ?? '';
    $anchor_classes = $anchor_classes ?? '';
    $noListitem = $noListitem ?? false;
    $description = App\pl__('Link zum Profil');
    $description .= $media_name != '' ?  ' - ' . $media_name : '';
@endphp

@if ($media_link)
    @if (!$noListitem)
        <li>
    @endif

        <a class="{{ $anchor_classes }}" href="{{ $media_link }}" target="_blank"><i class="{{ $icon_classes }}" title="{{ $description }}"></i></a>

    @if (!$noListitem)
        </li>
    @endif
@endif