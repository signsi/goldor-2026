import { WOW } from "wowjs";

$(document).ready(function() {
    const wow = new WOW();
    wow.init();

    $(document).on('DOMNodeInserted', function() {
        wow.sync();
    });

});