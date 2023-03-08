import { WOW } from "wowjs";

export function setupWowAnimation() {
    
    const wow = new WOW();
    wow.init();
    console.log("wow init", wow);
    $(document).on('DOMNodeInserted','.wow', function() {
        wow.sync();
    });

};