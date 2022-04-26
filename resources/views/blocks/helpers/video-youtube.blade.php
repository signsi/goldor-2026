{{--
Aufruf:
@include('blocks.helpers.video-youtube',
    [
        'name_UrlField' => 'preview-videourl',                        -> Name des Feldes mit der Video-Url,
        'video_size' => '16x9',                                       -> (optional) Grösse des Videos -> Opionen: small, medium, vh, 16x9(Default)
        'isRepeaterElement' => false                                  -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
    ])
--}}

@php
    $video_dimension = $video_size ?? '16x9';
    $isRepeaterElement = $isRepeaterElement ?? false;

    $videourl = $isRepeaterElement ? block_sub_value($name_UrlField) : block_value($name_UrlField);
@endphp


@if ( $videourl )
    <div class="video-wrapper videosize--{{ $video_dimension }}">
        <figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
            <div class="wp-block-embed__wrapper">
                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{ $videourl }}?controls=0?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </figure>
    </div>
@endif