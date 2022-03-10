{{--
Aufruf:
@include('blocks.helpers.social-link',
    [
        'media_link' => $linkedin,                                  -> Link des Social-Media-Kanals,
        'icon_classes' => 'fab fa-linkedin'                         -> Klassen welche gebraucht werden um das Icon des Media
        'noListitem' => false                                       -> (Optional) Wenn true wird der Social-Link nicht als Listitem dargestelt (Default: false)
    ])
--}}


@if ($media_link)
    @if (!$noListitem)
        <li>
    @endif

        <a href="{{ $media_link }}" target="_blank"><i class="{{ $icon_classes }}"></i></a>

    @if (!$noListitem)
        </li>
    @endif
@endif