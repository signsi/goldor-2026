{{--
Aufruf:
@include('blocks.helpers.social-link',
    [
        'media_name' => Linkedin,                                   -> Name des Social-Media-Kanals,
        'media_link' => https://www.linkedin.com/company/3156472/,  -> Link des Social-Media-Kanals,
        'icon_classes' => 'fab fa-linkedin'                         -> Klassen welche gebraucht werden um das Icon des Scoial-Media-Kanals darzustellen
        'noListitem' => false                                       -> (Optional) Wenn true wird der Social-Link nicht als Listitem dargestelt (Default: false)
    ])
--}}

@php
    $media_name = $media_name ?? '';
    $noListitem = $noListitem ?? false;
@endphp

@if ($media_link)
    @if (!$noListitem)
        <li>
    @endif

        <a href="{{ $media_link }}" target="_blank"><i class="{{ $icon_classes }}"></i></a>

    @if (!$noListitem)
        </li>
    @endif
@endif