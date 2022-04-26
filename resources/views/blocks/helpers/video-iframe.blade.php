{{--
Aufruf:
@include('blocks.helpers.video-iframe',
    [
        'name_iFrame_Field' => 'iframe-link',                         -> Name des Feldes mit dem iFrame-Link,
        'video_size' => '16x9',                                       -> (optional) Grösse des Videos -> Opionen: small, medium, vh, 16x9(Default)
        'isRepeaterElement' => false                                  -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
    ])
--}}

@php
    $video_dimension = $video_size ?? '16x9';
    $isRepeaterElement = $isRepeaterElement ?? false;

    $iframe_link = $isRepeaterElement ? block_sub_value($name_iFrame_Field) : block_value($name_iFrame_Field);
@endphp


@if ( $iframe_link )
    <div class="video-wrapper videosize--{{ $video_dimension }}">
        <figure class="wp-block-embed is-type-video wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
            <div class="wp-block-embed__wrapper">
                {!! App\sanitize_out($iframe_link, 'only_iframe') !!}
            </div>
        </figure>
    </div>
@endif