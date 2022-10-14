$(".rocketpager-team.isSlider .slider-wrapper").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    adaptiveHeight: false,
    responsive: [
        {
        breakpoint: 1279,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 1023,
            settings: {
                slidesToShow: 2,
                dots: true,
                arrows: false
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                dots: true,
                arrows: false
            }
        }
    ]
});
