import { Fancybox } from "@fancyapps/ui";

const toolbarGallery = {
  display: [
    "slideshow",
    "close",
  ],
};

const toolbarSingle = {
    display: [
      "close",
    ],
  };

const videoConfig = {
        video: {
            autoplay: false,
            ratio: 16 / 9,
        },
        youtube: {
            iv_load_policy: 3,
            modestbranding: 1,
            showinfo: 0,
            rel: 0,
            wmode: "transparent",
            enablejsapi: 1,
            html5: 1,
        },
};

function removeFancyboxForNotVisibleSlides(){
    const visibleSlides = $(this).find('.slick-slide.slick-active').length;
    const clonedVisibleSlides = visibleSlides - 1;

    $(this).find( '.slick-slide.slick-cloned [data-fancybox]' ).each(function( index ) {
        if(index < visibleSlides || index >= (visibleSlides + clonedVisibleSlides)){
            $(this).removeAttr('data-fancybox');
        }
    });
}

function removeClonedSlides(fancybox){
    const isOpenedWithClonedSlide = $(fancybox.options['$trigger']).closest('.slick-slide').hasClass('slick-cloned');
    const idOfOpenedSlide = $(fancybox.options['$trigger']).closest('.carousel-element').data('carousel-id');
    const slides = fancybox.Carousel.slides;

    for( var slideIndex = 0; slideIndex < slides.length; slideIndex++){
        const slideId = $(slides[slideIndex]['$trigger']).closest('.carousel-element').data('carousel-id');
        const isClonedSlide = $(slides[slideIndex]['$trigger']).closest('.slick-slide').hasClass('slick-cloned');

        if(isOpenedWithClonedSlide & !isClonedSlide & slideId === idOfOpenedSlide){
            fancybox.Carousel.slideTo(slideIndex);
            fancybox.Carousel.updatePage();
        }

        if ( isClonedSlide ) {
            slides.splice(slideIndex, 1);
            fancybox.Carousel.updatePage();
            slideIndex--;
        }
    }
}

export function setupLightbox() {

    $('.slick-slider').each(function(){
        removeFancyboxForNotVisibleSlides();
    })
    $('.slick-slider').on('breakpoint', function(){
        removeFancyboxForNotVisibleSlides();
    });

    Fancybox.bind('figure.wp-block-image a[href$=".webp"], figure.wp-block-image a[href$=".jpg"], figure.wp-block-image a[href$=".jpeg"], figure.wp-block-image a[href$=".png"], figure.wp-block-image a[href$=".svg"], figure.wp-block-media-text__media a[href$=".webp"], figure.wp-block-media-text__media a[href$=".jpg"], figure.wp-block-media-text__media a[href$=".jepg"], figure.wp-block-media-text__media a[href$=".png"], figure.wp-block-media-text__media a[href$=".svg"]', {
        groupAttr: false,
        Toolbar: toolbarSingle,
    });
    Fancybox.bind('.wp-block-gallery figure.wp-block-image a', {
        groupAll: true,
        Toolbar: toolbarGallery,
        Thumbs: {
            autoStart: false,
        },
        caption: function (fancybox, carousel, slide) {
            var $fig_element = $(slide.$trigger).closest('figure').children('figcaption');
            var $caption = $fig_element.length > 0 ? $fig_element[0].outerText : '';
            return (
                $caption
            );
        },
    });
    Fancybox.bind('[data-fancybox^="gallery"]', {
        on:{
            initCarousel: (fancybox) => {
                // Slides Entfernen welche von click-cloned entstanden sind
                removeClonedSlides(fancybox);
            },
        },
        Carousel: {
            on: {
              change: (carousel, to) => {
                // Sync Lightbox mit Karussel (Slick-Slider)
                const $slick_slide = $(carousel.slides[0]['$trigger']).closest('.slick-slider');
                if($slick_slide){
                    $($slick_slide).slick('slickGoTo', to, true);
                }
              }
            },
          },
        Toolbar: toolbarGallery,
        Thumbs: {
            autoStart: false,
        },
        Html: videoConfig,
        caption: function (fancybox, carousel, slide) {
            return (
                slide.caption
            );
        },
    });
    Fancybox.bind('[data-fancybox^="custom"]', {
        on:{
            initCarousel: (fancybox) => {
                // Slides Entfernen welche von click-cloned entstanden sind
                removeClonedSlides(fancybox);
            },
        },
        Toolbar: toolbarGallery,
        Thumbs: {
            autoStart: false,
        },
        Html: videoConfig,
        caption: function (fancybox, carousel, slide) {
            return (
                slide.caption
            );
        },
    });
    Fancybox.bind('[data-fancybox="single"]', {
        groupAttr: false,
        Toolbar: toolbarSingle,
        caption: function (fancybox, carousel, slide) {
            return (
                slide.caption
            );
        },
    });
    Fancybox.bind('[data-fancybox="video"]', {
        groupAttr: false,
        Html: videoConfig,
    });
};