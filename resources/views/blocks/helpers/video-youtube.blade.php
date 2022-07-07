{{--
Aufruf:
@include('blocks.helpers.video-youtube',
    [
        'name_UrlField' => 'preview-youtube_id',                      -> Name des Feldes mit der Video-Url,
        'video_size' => '16x9',                                       -> (optional) Grösse des Videos -> Opionen: small, medium, vh, 16x9(Default)
        'useCustomPlayBtn' =>  false,                                 -> (optional) wenn true wird ein Customize Button angezeigt (sinnvollerweise sollte auch ein Poster-Bild gesetzt sein)
        'isRepeaterElement' => false                                  -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
    ])
--}}

@php
    $video_dimension = $video_size ?? '16x9';
    $useCustomPlayBtn = $useCustomPlayBtn ?? false;
    $isRepeaterElement = $isRepeaterElement ?? false;

    $youtube_id = $isRepeaterElement ? block_sub_value($name_UrlField) : block_value($name_UrlField);
    $player_id = 'player-' . wp_rand(0, PHP_INT_MAX);
    $hasButtonClass = $useCustomPlayBtn ? ' has-Custom-PlayButton' : '';
    $embed_aspect_ratio = App\getEmbedAspectRatio($video_dimension);
@endphp


@if ( $youtube_id )
    <div class="video-wrapper videosize--{{ $video_dimension }}">
        <figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-has-aspect-ratio{{ $embed_aspect_ratio }}{{ $hasButtonClass }}">
            <div class="wp-block-embed__wrapper">
                <div class="yt-player" id="{{ $player_id }}" data-youtube-id="{{ $youtube_id }}"></div>
            </div>

            @includeWhen($useCustomPlayBtn, 'blocks.helpers.play-button-video',['background_url' =>  'https://i.ytimg.com/vi_webp/' . $youtube_id . '/maxresdefault.webp'])
        </figure>
    </div>
@endif