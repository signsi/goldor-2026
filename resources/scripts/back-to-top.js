var offset = 100;
var speed = 250;
var duration = 500;
$(window).scroll(function() {
  if ($(this).scrollTop() < offset) {
    $("#to-top-button").fadeOut(duration);
  } else {
    $("#to-top-button").fadeIn(duration);
  }
});
$("#to-top-button").on("click", function() {
  $("html, body").animate({ scrollTop: 0 }, speed);
  return false;
});
