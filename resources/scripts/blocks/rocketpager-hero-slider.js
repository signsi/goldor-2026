
$(document).ready(function () {

    $('.hero-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3500, //Time to show ()
        fade: true,
        cssEase: 'ease-in-out',
        speed: 1000, //Time of Transition
        pauseOnHover: false,
    });
});