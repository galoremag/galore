//@codekit-prepend "bootstrap.js";
//@codekit-prepend "jquery.easing.1.3.js";
//@codekit-prepend "jquery.cookie.js";
//@codekit-prepend "ss-social.js";
//@codekit-prepend "ss-standard.js";
//@codekit-prepend "fitvids.js";
//@codekit-prepend "diarie-carousel.js";
//@codekit-prepend "photoset-grid.js";

$(document).ready(function(){

  "use strict";

  //Twitter Bootstrap Carousel
  $('.carousel-top div.carousel').carousel();

  // Basic FitVids Test
  $(".container").fitVids();

  // Photoset Grid
  var width = $(window).width();
  if (width > 767){
    $('.photoset-grid').photosetGrid({
        gutter: '5px'
      });
  } else if (width < 767){
    $('.photoset-cell').width("100%");
    $('.photoset-grid img').css("margin-bottom","4px");
  }

});
