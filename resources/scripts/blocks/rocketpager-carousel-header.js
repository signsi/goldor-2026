$(".carousel-header-slider").slick({
    dots: false,
    arrows: false,
    infinite: true,
    speed: 8500,
    autoplay: true,
    autoplaySpeed: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    variableWidth: true,
    cssEase: 'linear',
    responsive: [
    {
        breakpoint: 1024,
        settings: {
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,
        centerMode: true
        }
    },
    {
        breakpoint: 767,
        settings: {
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 300,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,
        centerMode: false
        }
    }
    ]
});