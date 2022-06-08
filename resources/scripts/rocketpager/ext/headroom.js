import Headroom from "headroom.js";

// Selectoren auf <a>-Tag für Ankerlinks welche ignoriert werden soll (Bsp. für Submenübutton oder Accordions)
// Ankerlinks auf '#' werden in dieser Implementation immer ignoriert --> Klick wird nicht ausgeführt
const anchorLinksToIgnore = '.accordion-title, .mm-btn';

jQuery(document).ready(function ($) {
    // Headroom-Konfiguration
    const header = document.querySelector("#fixed");
    const headroom = new Headroom(header, {
        tolerance: {
            up: 0,
            down: 0
        }
    });
    headroom.init();

    // Wenn die Seite neu geladen wird, wird überprüft, ob man zu einem Anker springen muss.
    var href = window.location.href;
    var isLinkOfAnchor = href.includes('#');

    if (isLinkOfAnchor) {
        const substrings = href.split('/');
        const target = substrings[substrings.length - 1];
        anchorJump(target);
    }

    // Wenn auf einen Ankerlink geklickt wird, überprüfe ob zum Anker gescrollt werden soll,
    // fall nicht wird das Klicken ignoriert und die Seite bewegt sich nicht.
    $('a[href*="#"]').on('click', function (e) {
        const substrings = $(this).attr('href').split('/');
        const target = substrings[substrings.length - 1];

        if (this.matches(anchorLinksToIgnore) || target == '#') {
            e.preventDefault();
            return;
        }

        anchorJump(target);
    });

    // Die Funktion scrollt/spring zur Position des Ankers, dabei wird die Position neu berechnet,
    // wenn ein Bild nachgeladen wurde (Lazyload). Während dem Scrollen wird der Headroom deaktiviert
    // und dieser wird erst wieder aktiv, wenn mann am Mausrad dreht oder das Touchscreen berührt
    function anchorJump(target) {
        if (target == '#') return;

        var targetPos = 0;
        var id_TargetInterval = setInterval(checkTarget, 100);

        function checkTarget() {
            if ($(target).offset() != undefined) {
                headroom?.freeze();
                headroom?.unpin();
                clearInterval(id_TargetInterval);
                targetPos = $(target).offset().top;
                $(window).scrollTop(targetPos);

                $(document).on('lazyloaded', function () {
                    var newTargetPos = $(target).offset().top;
                    if (targetPos != newTargetPos) {
                        targetPos = newTargetPos;
                        $(window).scrollTop(targetPos);
                    }
                });

                $(window).one('wheel touchstart', function () {
                    headroom?.unfreeze();
                    $(document).off('lazyloaded');
                });
            }
        }
    }
});