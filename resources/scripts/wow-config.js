import { WOW } from "wowjs";

export function setupWowAnimation() {
    const wow = new WOW();
    wow.init();

    $(document).on('DOMNodeInserted','.wow', function() {
        wow.sync();
    });

};