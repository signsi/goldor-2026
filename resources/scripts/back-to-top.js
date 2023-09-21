import { debounce } from './helpers.js';

export function setupBackToTop(scrollDuration = 250, offsetVisibility = 100, durationVisibilityAnimation = 500){
  const $backToTop = $("#to-top-button");

  $backToTop.removeClass('hidden').hide();

  $(window).on('scroll',
    debounce(
      function setVisibilityBtn(){
        $(this).scrollTop() < offsetVisibility ? $backToTop.fadeOut(durationVisibilityAnimation) : $backToTop.fadeIn(durationVisibilityAnimation);
      },
      50,
      false
    )
  );

  $backToTop.on("click", function() {
    $("html, body").animate({ scrollTop: 0 }, scrollDuration);
    return false;
  });
}

