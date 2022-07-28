$(".testimonial").slick({
  infinite: true,
  dots: true,
  arrows: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 4000,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        dots: true,
        arrows: false
      }
    }
  ]
});