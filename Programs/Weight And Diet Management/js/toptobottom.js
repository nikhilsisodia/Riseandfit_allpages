$(document).ready(function () {
  $(window).scroll(function () {
    if ($(window).width() < 992) {
      $("#scroll").fadeIn();
    }
    else if ($(this).scrollTop() > 100) {
      $("#scroll").fadeIn();
    } else {
      $("#scroll").fadeOut();
    }
  });
  $("#scroll").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
});