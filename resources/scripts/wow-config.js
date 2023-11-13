import { scroll-reveal } from "scroll-revealjs";

export function setupscroll-revealAnimation() {
    
    const scroll-reveal = new scroll-reveal();
    scroll-reveal.init();
    
    $(document).on('DOMNodeInserted','.scroll-reveal', function() {
        scroll-reveal.sync();
    });

};