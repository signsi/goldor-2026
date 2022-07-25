{{--
Aufruf:
@include('blocks.helpers.video-youtube',
    [
        'name_UrlField' => 'preview-youtube_id',                      -> Name des Feldes mit der Video-Url,
        'name_PosterField' => 'poster',                               -> Name des Feldes mit dem Video-Vorschau-Bild,
        'video_size' => '16x9',                                       -> (optional) Grösse des Videos -> Opionen: small, medium, vh, 16x9(Default)
        'useCustomPlayBtn' =>  false,                                 -> (optional) wenn true wird ein Customize Button angezeigt (sinnvollerweise sollte auch ein Poster-Bild gesetzt sein)
        'isRepeaterElement' => false,                                 -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
        'identifierLightbox' => $idLightbox                           -> (optional) Bilder & Lightbox-Videos mit gleichem Identifier werden in der gleichen Lightbox dargestellt.
                                                                        Defaultwert ist 'video', es gibt immer mind. eine einfach Lightbox für Videos
    ])
--}}



@php
    $video_dimension = $video_size ?? '16x9';
    $useCustomPlayBtn = $useCustomPlayBtn ?? false;
    $isRepeaterElement = $isRepeaterElement ?? false;
    $lightbox = $identifierLightbox ?? 'video';

    $url = $isRepeaterElement ? block_sub_value($name_UrlField) : block_value($name_UrlField);
    $player_id = 'player-' . wp_rand(0, PHP_INT_MAX);
    $hasButtonClass = $useCustomPlayBtn ? ' has-Custom-PlayButton' : '';
    $embed_aspect_ratio = App\getEmbedAspectRatio($video_dimension);
    $lightbox = $lightbox == 'single' || !$lightbox ? 'video' : $lightbox;
@endphp

@if ( $url )
    <a class="group" data-fancybox="{{ $lightbox }}" href="{{ $url }}">
        <figure class="{{ $hasButtonClass }} video-wrapper video-lightbox-wrapper videosize--{{ $video_dimension }} relative overflow-hidden">
            @include('blocks.helpers.background-image',
            [
                'name_ImageField' => $name_PosterField,
                'class_object_fill_breakpoint' => 'bg-object-wrapper video-lightbox-preview',
                'class_object_fit' => array('class' => 'object-cover'),
                'isRepeaterElement' => $isRepeaterElement,
                'identifierLightbox' => false,
            ])

            @includeWhen($useCustomPlayBtn, 'blocks.helpers.play-button-video',
            [
                'useNoLink' => true,
            ])
        </figure>
    </a>
@endif
