const endAnchorJump = () => {
    $('img.pause-lazyloading').removeClass('pause-lazyloading').addClass('lazyload');
    $(document).off('.anchor');
    $(window).off('.anchor');
}

// Die Funktion scrollt/spring zur Position des Ankers, dabei wird die Position neu berechnet,
// wenn ein Bild nachgeladen wurde (Lazyload). Während dem Scrollen wird der Headroom deaktiviert
// und dieser wird erst wieder aktiv, wenn mann am Mausrad dreht oder das Touchscreen berührt
const anchorJump = () => {
    var target = window.location.hash;

    if(target === '' || target === '#') return;

    var targetPos = 0;

    var id_TargetInterval = setInterval(checkTarget, 50);

    function checkTarget(){
        if($(target).offset() != undefined){
            clearInterval(id_TargetInterval);
            targetPos = $(target).offset().top;
            $(window).scrollTop(targetPos);

            $('img.lazyload').removeClass('lazyload').addClass('pause-lazyloading');
            $('#siteHeader').addClass('activeAnchorScroll');

            $(document).on('lazyloaded.anchor DOMNodeInserted.anchor', function(event){
                if(targetPos <= $(window).scrollTop() + 1 && targetPos >= $(window).scrollTop() - 1 ) return;

                var newTargetPos = $(target).offset().top;
                if(targetPos != newTargetPos){
                    targetPos = newTargetPos;
                    $(window).scrollTop(targetPos);
                }
            });

            $(window).on('scroll.anchor',function() {
                clearTimeout( $.data( this, "scrollCheck" ) );
                $.data( this, "scrollCheck", setTimeout(endAnchorJump, 250) );
            });

            $(window).one('wheel touchstart', function(){
                $('#siteHeader').removeClass('activeAnchorScroll');
                endAnchorJump();
            });
        }
    }
}

export function handleAnchorJump() {
    $(window).on('load hashchange', anchorJump );
};

document.addEventListener("DOMContentLoaded", function() {
    // Finde das Scroll-Down-Element
    var scrollDownElement = document.getElementById("scrollDown");

    // Füge einen Klick-Event-Listener hinzu
    scrollDown && scrollDownElement.addEventListener("click", function() {
        // Finde das nächste Element mit der CSS-Klasse ".alignfull"
        var nextElement = document.querySelector(".alignfull");

        // Überprüfe, ob ein Element gefunden wurde
        if (nextElement) {
            // Scrolle zum nächsten Element
            nextElement.scrollIntoView({ behavior: "smooth" });
        }
    });
});

