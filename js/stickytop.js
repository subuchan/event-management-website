var yourNavigation = $(".navigation");
    stickyDiv = "sticky";
    yourHeader = $('.banner').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > yourHeader ) {
    yourNavigation.addClass(stickyDiv);
  } else {
    yourNavigation.removeClass(stickyDiv);
  }
});