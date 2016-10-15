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

  //If window location contains /tag or /category , then do the function, else return false or null
  var current_url = window.location.href;
  var current_url_path = current_url.match(/(\/tag\/)|(\/category\/)/g);

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

  loadNewsletter();

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
    if (target.is('.tag,.category')) {
      debugger;
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
              createCookie("newsletter", "read", 14);
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
          createCookie("snapchat", "read", 1);
    });
  });

  $(function() {
    $("#newsletterClose").on('click tap', function(e) {
      e.preventDefault();
          $("#email-signup").hide();
          createCookie("newsletter", "read", 14);
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
          createCookie("snapchat", "read", 1);
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
      $('.hmbrgr').click();
    });
  });

  // HAMBURGER
  $(function() {
    $('.hmbrgr').hmbrgr({
      width     : 14,
      height    : 10,
      barHeight : 1,
      barColor  : '#fff',
      onOpen    : function(){
        $('body').addClass('menu-open');
      },   // optional - callback when the hamburger is opening
      onClose   : function(){
        $('body').removeClass('menu-open');
      }
    });
  });

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
      // createCookie("newsletter", "read", 14);
    });
  });

  // Fancy List Body Toggle
  $(function() {
    $('.listBodyContainer .listBodyToggle, .listItem a.listReadMore, .listItem a.itemTitle, .listHeroCover').on('click tap', function(event) {
      event.preventDefault();
      $('.listBodyContainer, .listHeroCover').toggleClass('open');
    });
  });

  // Color Fancy list bodies
  // var colors = ["bluePinkGradientFade", "yellowBlueGradient", "purpleGradientFade", "brandGradientFade"]
  // var randomColor = Math.floor(Math.random()*colors.length);
  //
  // $(".listBodyContainer").each(function () {
  //     $(this).addClass(colors[randomColor]);
  //     randomColor = (randomColor + 1) % colors.length;
  // });

  // CLOSE Facebook LIKE BAR
  // $(function() {
  //   $("#likeBar-close").on('click tap', function(event) {
  //     event.preventDefault();
  //         $('#likeBar').animate({bottom: "-60px"});
  //         createCookie("facebook", "read", 7);
  //     });
  // });

  // console.log(isMobile);
  // Fancy List Panels
  // $(function() {
  //   if ($('#global-container').is('.single-list')) {
  //     if (isMobile) {
  //       $.scrollify({
  //         section: ".listItem",
  //         sectionName : "section-name",
  //         offset: 0,
  //         // interstitialSection : "header, #footer-open, #ctoolbar, #listBodyToggle",
  //         standardScrollElements: ".listBodyContainer, .everything, .listItem:last-child",
  //         scrollSpeed: 400
  //       });
  //     } else {
  //       $.scrollify({
  //         section: ".listItem",
  //         offset: 0,
  //         sectionName : "section-name",
  //         // interstitialSection : "header, #footer-open, #ctoolbar, #listBodyToggle",
  //         standardScrollElements: ".listBodyContainer, .everything, .listItem:last-child",
  //         scrollSpeed: 400
  //       });
  //     }
  //   }
  // });
  //
  // // Trigger something after the infinite scroll loads more content
  // $(function() {
  //   if ($('#global-container').is('.single')) {
  //     $.fn.almComplete = function(alm) {
  //       console.log("Ajax Load More Complete!");
  //       var isMobile = false; //initiate as false
  // 			// device detection
  // 			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
  // 			|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
  //
  //       googletag.cmd.push(function() {
  // 		    googletag.defineSlot('/60899964/Article_300x250_970x250', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-0').addService(googletag.pubads());
  // 		    googletag.defineSlot('/60899964/Article_300x250_970x250_pos2', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-1').addService(googletag.pubads());
  //
  // 				// Mobile ad units
  // 				if (isMobile) {
  // 					googletag.defineSlot('/60899964/Article_Mobile_300x250', [300, 250], 'div-gpt-ad-1465835581876-3').addService(googletag.pubads());
  // 					googletag.defineSlot('/60899964/Article_Mobile_300x250_pos2', [300, 250], 'div-gpt-ad-1465835581876-4').addService(googletag.pubads());
  // 				}
  //
  // 		    googletag.pubads().enableSingleRequest();
  // 		    googletag.pubads().collapseEmptyDivs();
  // 		    googletag.pubads().setTargeting('Category', []).setTargeting('Article', []);
  // 		    googletag.enableServices();
  //       }
  //     };
  //   }
  // });

  $(function() {
    $.fn.almComplete = function(alm){
      console.log("Ajax Load More Complete!");
      googletag.cmd.push(function() {
		    googletag.defineSlot('/60899964/Article_300x250_970x250', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-0').addService(googletag.pubads());
		    googletag.defineSlot('/60899964/Article_300x250_970x250_pos2', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-1').addService(googletag.pubads());

				// Mobile ad units
				if (isMobile) {
					googletag.defineSlot('/60899964/Article_Mobile_300x250', [300, 250], 'div-gpt-ad-1465835581876-3').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Article_Mobile_300x250_pos2', [300, 250], 'div-gpt-ad-1465835581876-4').addService(googletag.pubads());
				}

		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().collapseEmptyDivs();
		    googletag.pubads().setTargeting('Category', []).setTargeting('Article', []);
		    googletag.enableServices();
      });
    };
  });

  // Fancy List Scrolling
  // $(function() {
  //     if ($('#global-container').is('.tag, .category, .single')) {
  //         var shareButton = document.querySelector('post-social');
  //         shareButton.addEventListener('click', recordShare, false);
  //     } else {
  //         return;
  //     }
  // });

  // Try to force page reload on back button
  // if ($('#global-container').is('.single') && $(document).scrollTop() > 500) {
  //   window.onpopstate = function() {
  //     $('global-container').load(location.href);
  //   };
  // }

});
