{{-- Aufruf:
@include('blocks.helpers.video-intern',
    [
        'name_UrlField' => 'preview-videourl',                        -> Name des Feldes mit der Video-Url,
        'name_PosterField' => 'poster',                               -> Name des Feldes mit dem Video-Vorschau-Bild,
        'video_size' => '16x9',                                       -> (optional) Grösse des Videos -> Opionen: small, medium, vh, 16x9(Default)
        'default_Features' => 'controls playsinline',                 -> (optional könnt ihr aktuell ignorieren) Über default_Features können alle Funktionen definiert werden, welche das Video enthalten soll. Wird dies nicht gmacht, werden nur die Funktionalitäten verwendet, welche über das RocketPager-Element definiert wurden.
        'isRepeaterElement' => false                                  -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
    ])
--}}

@php
    $video_dimension = $video_size ?? '16x9';
    $default_Features = $default_Features ?? false;
    $isRepeaterElement = $isRepeaterElement ?? false;

    $videoUrl = $isRepeaterElement ? block_sub_value($name_UrlField) : block_value($name_UrlField);
    $posterId = $isRepeaterElement ? block_sub_value($name_PosterField) : block_value($name_PosterField);
    $posterUrl = wp_get_attachment_image_src($posterId, '16-9-thumb')[0];
    $Features = ['autoplay', 'controls', 'loop', 'muted', 'playsinline'];
    $activ_Features = $default_Features ? $default_Features : App\mapToKeyString($Features, true);
@endphp

@if ($videoUrl)
    <div class="video-wrapper videosize--{{ $video_dimension }}">
        <figure class="wp-block-video">
            <video src="{{ $videoUrl }}"
                @if ( $posterId )
                    poster="{{ $posterUrl }}"
                @endif
                {{ $activ_Features }}
            >
            </video>
        </figure>
    </div>
@endif
