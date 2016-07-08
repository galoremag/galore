var recordShare = function (e) {
  var el = event.target;
  var clickedItem = el.getAttribute('class');
  console.log("You clicked " + clickedItem);
  // _kmq.push(['record', clickedItem]);
  ga(
      "send", "event", "Social Share", clickedItem,
      document.location.pathname + document.location.search
  );
}

jQuery(window).on('load', function($) {

  "use strict";

});

jQuery(document).ready(function($) {

  "use strict";

  // Create cookie
  function createCookie(name, value, days) {
      var expires;
      if (days) {
          var date = new Date();
          date.setTime(date.getTime()+(days*24*60*60*1000));
          expires = "; expires="+date.toGMTString();
      }
      else {
          expires = "";
      }
      document.cookie = name+"="+value+expires+"; path=/";
  }

  // Read cookie
  function readCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for(var i=0;i < ca.length;i++) {
          var c = ca[i];
          while (c.charAt(0) === ' ') {
              c = c.substring(1,c.length);
          }
          if (c.indexOf(nameEQ) === 0) {
              return c.substring(nameEQ.length,c.length);
          }
      }
      return null;
  }

  function loadNewsletter() {
    if (isTouchDevice()===true) {
      return;
    } else if (readCookie("newsletter")) {
      return;
    } else {
      $('#email-signup').delay(6000).show();
    }
  }

  function loadFacebookModal() {
    if (isTouchDevice()===false) {
      return;
    } else if (readCookie("facebook")) {
      return;
    } else if ($('#global-container').is('.tag, .category, .single')) {
      $('#fb-modal').delay(3200).fadeIn(600);
    } else {
      return;
    }
  }

  function loadSnapchatModal() {
    if (isTouchDevice()===false) {
      return;
    } else if (readCookie("snapchat")) {
      return;
    } else {
      $('#snapchat-modal').delay(3000).show();
    }
  }

  // function loadLikeBar() {
  //   if ($('#global-container').is('.tag, .category, .home, .archive')) {
  //     $('#likeBar').delay(22000).animate({bottom: "0px"}, 500);
  //   }
  // }

  // setTimeout(loadLikeBar, 22000);

  function sticky_relocate() {
    var window_height = window.innerHeight;
      var window_top = $(window).scrollTop();
      var div_top = $('#sidebar-anchor').offset().top;
      if (window_top > (div_top - 50)) {
          $('#sidebar').addClass('sticky').css({'height': window_height, 'overflow':'scroll'});
      } else {
          $('#sidebar').removeClass('sticky');
      }
  }

  function isTouchDevice() {
    return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
  }

  function defaultSelect() {
    var firstOpt = $('select option:first-child');

    if (firstOpt.val() == '') {
      firstOpt.attr('default', '');
      firstOpt.attr('selected', '');
      firstOpt.val('Choose');
      firstOpt.text('Choose');
    }
  }

  // Tracking Info

  // function setCookie(cname, cvalue, exdays) {
  //   var d = new Date();
  //   d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  //   var expires = "expires=" + d.toGMTString();
  //   document.cookie = cname + '=' + cvalue + ';path="/";' + expires;
  // }

  // function checkHistory(targetId) {
  //   var history = getCookie("history");
  //   var htmlContent = '';

  //   if (history != "") {
  //       var insert = true;
  //       var sp = history.toString().split(",");
  //       for ( var i = sp.length - 1; i >= 0; i--) {
  //           htmlContent += '<a style="color: white;" class="demo-pricing demo-pricing-1"  href="'
  //                   + sp[i]
  //                   + '">'
  //                   + sp[i].substring(sp[i].lastIndexOf('/') + 1) + '</a><br>';
  //           if (sp[i] == document.URL) {
  //               insert = false;
  //           }
  //           // document.getElementById(targetId).innerHTML = htmlContent;
  //           console.log(htmlContent);
  //       }
  //       if (insert) {
  //           sp.push(document.URL);
  //       }
  //       createCookie("history", sp.toString(), 30);
  //   } else {
  //       var stack = new Array();
  //       stack.push(document.URL);
  //       createCookie("history", stack.toString(), 30);
  //   }
  // }

  // function getCookie(cname) {
  //   var name = cname + "=";
  //   var ca = document.cookie.split(';');
  //   for ( var i = 0; i < ca.length; i++) {
  //       var c = ca[i].trim();
  //       if (c.indexOf(name) == 0)
  //           return c.substring(name.length, c.length);
  //   }
  //   return "";
  // }

  // setCookie("history", window.location, 80);
  // checkHistory("recentPageViews");

  // End of Tracking

  // loadNewsletter();

  // loadSnapchatModal();

  // loadLikeBar();

  defaultSelect();

  $(function() {
    if (readCookie("sponsorLoaded")) {
      $('#superhero').css({'display' : 'none'}) && $('#scroll-down').css({'display' : 'none'}) && $('#global-inner').addClass('padTop120');
    } else if (isTouchDevice()===true) {
      $('#superhero').css({'display' : 'block'}) && $('#scroll-down').css({'display' : 'block'}) && createCookie("sponsorLoaded", "read", 1);
    } else {
      $('#superhero').css({'display' : 'none'}) && $('#scroll-down').css({'display' : 'none'}) && $('#global-inner').addClass('padTop120');
    }
  });

  $('input[type=text]').addClass('form-control');
  $('input#discount-code[type=text]').attr('size','5').addClass('pull-left');
  $('form#cart input[type=text]').css('width','auto');

  // FIX PLACEHOLDERS
    $('[placeholder]').focus(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
        }
    }).blur(function() {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur();

  // Snappy Taps
  $(function() {
    FastClick.attach(document.body);
  });

  // Prevent Default on All Hash Links
  $(function() {
    $('a[href="#"]').on('click', function(e) {
      e.preventDefault();
    });
  });

  // // Navbar Shrinks on Scroll

  $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $('#deskNav').addClass('shrink');
    } else {
      $('#deskNav').removeClass('shrink');
    }
  });

  // Shrink Navbar if page LOADS scrolled
  $(function() {
    if ($(document).scrollTop() > 50) {
      $('#deskNav').addClass('shrink') && $('.footbut').addClass('appear');
    } else {
      return;
    }
  });

  // Show footer button on scroll
  $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $('.footbut').addClass('appear');
    } else {
      $('.footbut').removeClass('appear')
    }
  });

  // Scroll down Button Actually Scrolls Down

  var body = $('html, body');

  $(function() {
    $('#scroll-down').on('click tap', function(e){
          e.preventDefault();
          body.animate({scrollTop:520}, '2000', 'swing');
    });
  });

  // Sticky Sidebar
  $(function() {
    var target = $('#global-container');
    if (target.is('.tag,.category,.single')) {
      if (isTouchDevice()===true) {
        return;
      } else {
          $(window).scroll(sticky_relocate);
          sticky_relocate();
      }
    } else {
      return;
    }
  });

  /////////////////////
  ////// MODALS  //////
  /////////////////////

  $(function() {
    $('#signupButton').on('click tap', function(e) {
      e.preventDefault();
      $("#email-signup").show();
          $("#newsletterClose").click(function() {
              $("#email-signup").hide();
          });
    });
  });

  $(function() {
    $('#email-signup .back').on('click tap', function(e){
          e.preventDefault();
          $("#email-signup").hide();
          createCookie("newsletter", "read", 14);
    });
  });

  $(function() {
    $('#fb-modal .back').on('click tap', function(e){
          e.preventDefault();
          $("#fb-modal").fadeOut(500);
          createCookie("facebook", "read", 7);
    });
  });

  $(function() {
    $('#snapchat-modal .back').on('click tap', function(e){
          e.preventDefault();
          $("#snapchat-modal").fadeOut(500);
          createCookie("snapchat", "read", 7);
    });
  });

  $(function() {
    $("#newsletterClose").on('click tap', function(e) {
      e.preventDefault();
          $("#email-signup").hide();
          createCookie("facebook", "read", 7);
      });
  });

  $(function() {
    $("#fbClose").on('click tap', function() {
          $("#fb-modal").fadeOut(500);
          createCookie("facebook", "read", 7);
      });
  });

  $(function() {
    $("#snapchatClose").on('click tap', function() {
          $("#snapchat-modal").fadeOut(500);
          createCookie("snapchat", "read", 7);
      });
  });

  $(function() {
    $('#glides').perfectScrollbar({
      suppressScrollY: true
    });
  });

  // Nav Button
  $(function() {
    $('#nav-button').on('click tap', function(event) {
      $('.modal-nav').fadeToggle('show');
      $('body').toggleClass('menu-open');
      $('.hmbrgr').click();
    });
  });

  // HAMBURGER
  $(function() {
    $('.hmbrgr').hmbrgr({
      width     : 14,
      height    : 10,
      barHeight : 1,
      barColor  : '#fff'
    });
  });

    /////////////////////
  // Footer Toggle //
  /////////////////////

  $(function() {
    $('#footer-open').on('click tap', function(event) {
      event.preventDefault();
          $('#footer').toggleClass('footerOn');
      });
  });

  $(function() {
    $("#footer-close").on('click tap', function(event) {
      event.preventDefault();
          $('#footer').toggleClass('footerOn');
          createCookie("newsletter", "read", 14);
      });
  });

  // CLOSE Facebook LIKE BAR
  // $(function() {
  //   $("#likeBar-close").on('click tap', function(event) {
  //     event.preventDefault();
  //         $('#likeBar').animate({bottom: "-60px"});
  //         createCookie("facebook", "read", 7);
  //     });
  // });

  // Ad scripts
  $(function() {
    $.fn.almComplete = function(alm) {
      console.log("Ajax Load More Complete!");
      $('ul.alm-listing').append(function() {
        return (
          <div id='div-gpt-ad-1465835581876-15' style='height:250px; width:300px;' class="thumbnail col-sm-4 visible-xs">
          <script type='text/javascript'>
          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-15'); });
          </script>
          </div>

          <div id='div-gpt-ad-1465835581876-11' class="thumbnail col-sm-4 hidden-xs">
          <script type='text/javascript'>
          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-11'); });
          </script>
          </div>
        );
      });
    };
  });

});
