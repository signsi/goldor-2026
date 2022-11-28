const player = [];

$(document).ready(function() {
    $('figure.wp-block-video .control-container ').on('click','.play', function(){
        var $controls = $(this).parent();
        var $video = $controls.parent().find('video');

        $video[0].play();
        $video.attr('controls','');
        $controls.addClass('hidden');

        $video.one('ended', function(){
            $controls.removeClass('hidden');
            $(this).attr('controls',null);
        })
    });

    $('figure.wp-block-embed-youtube .control-container').on('click','.play', function(){
        var $controls = $(this).parent();
        const player_id = $('figure.wp-block-embed-youtube .control-container').index($controls);

        player[player_id].playVideo();
        $controls.addClass('hidden');
    });
});

window.onYouTubeIframeAPIReady = function() {

    $('.wp-block-embed-youtube .info-cookies').remove();

    $('figure.has-Custom-PlayButton .yt-player').each(function (index) {
        var player_id = $(this).attr('id');
        var youtube_id = $(this).data('youtube-id');
        if(!player_id){
            player[index] = null;
            return;
        }
        player[index] = new YT.Player( player_id , {
            videoId: youtube_id,
            host: 'https://www.youtube-nocookie.com',
            height: '360',
            width: '640',
            playerVars: {
                'iv_load_policy': 3,
                'modestbranding': 1,
                'showinfo': 0,
                'rel': 0,
            },
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    });

    $('figure:not(.has-Custom-PlayButton) .yt-player').each(function () {
        var player_id = $(this).attr('id');
        var youtube_id = $(this).data('youtube-id');
        if(!player_id) return;
        const simplePlayer = new YT.Player( player_id , {
            videoId: youtube_id,
            host: 'https://www.youtube-nocookie.com',
            height: '360',
            width: '640',
            playerVars: {
                'iv_load_policy': 3,
                'modestbranding': 1,
                'showinfo': 0,
                'rel': 0,
            },
        });
    });
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        const hash = '#' + event.target.m.id;
        const player_id = $('figure.wp-block-embed-youtube.has-Custom-PlayButton .yt-player').index($(hash));

        $('figure.wp-block-embed-youtube .control-container').eq(player_id).show();
    }
}
