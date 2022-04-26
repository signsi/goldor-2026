<script>
    const configDE = {
        required:{
            i: 99,
            f:-6,
            o:-6,
            s:-6,
            c:-6
        },
        reminder: 0,
        noclose:true,
        no_permanent_hide: false,
        test: false,
        newwindow: true,
        style: "top",
        insecure: true,
        unsupported: true,
        mobile: false,
        shift_page_down: true,
        text_for_i_in_de: {
        'msg':'Internet Explorer wird nicht supported.',
        'msgmore': 'Bitte nutze einen anderen Browser für das volle Erlebnis.'
        },     
        l: 'de'
    };

    const configMultiple = {
        required:{
            i: 99,
            f:-6,
            o:-6,
            s:-6,
            c:-6
        },
        reminder: 0,
        noclose:true,
        no_permanent_hide: false,
        test: false,
        newwindow: true,
        style: "top",
        insecure: true,
        unsupported: true,
        mobile: false,
        shift_page_down: true,
        text_for_i_in_de: {
        'msg':'Internet Explorer wird nicht supported.',
        'msgmore': 'Bitte nutze einen anderen Browser für das volle Erlebnis.'
        },
        text_for_i_in_en: {
        'msg':'Internet Explorer is not supported.',
        'msgmore': 'Please use an other browser to have the full experience.'
        },  
        text_for_i_in_fr: {
        'msg': "Internet Explorer n'est pas pris en charge.",      
        'msgmore': "Veuillez utiliser un autre navigateur pour profiter pleinement de l'expérience."
        },
        text_for_i_in_it: {
        'msg': "Internet Explorer non è supportato.",      
        'msgmore': "Si prega di utilizzare un altro browser per un'esperienza completa."
        },      
        l: '<?php echo get_bloginfo("language"); ?>'
    };

    var $buoop = configDE; 
    function $buo_f(){ 
        var e = document.createElement("script"); 
        e.src = "//browser-update.org/update.min.js"; 
        document.body.appendChild(e);
    };
    try {
        document.addEventListener("DOMContentLoaded", $buo_f,false)
    }
    catch(e){
        window.attachEvent("onload", $buo_f)
    }
</script>