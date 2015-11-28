jQuery(window).on('load', function($) {

});

jQuery(document).ready(function($) {

	var isMobile = false; //initiate as false
	// device detection

	$(function() {
		if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
		|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
	});

	$(function() {
		if ($.cookie("sponsorLoaded")) {
			$("a#superhero").css({"display" : "none"});
			$("#scroll-down").css({"display" : "none"});
		} else if (isMobile == true) {
			$("a#superhero").css({"display" : "table"});
			$("#scroll-down").css({"display" : "block"});
			$("#global-inner").addClass("nopad");
			$.cookie("sponsorLoaded", 14);
		} else {
			$("a#superhero").css({"display" : "none"});
			$("#scroll-down").css({"display" : "none"});
		}
	});

	function loadNewsletter() {
		if (isTouchDevice()===true) {
			return;
		} else if ($.cookie('newsletter')) {
			return;
		} else {
			$('#email-signup').delay(6000).fadeIn(600);
		}
	};

	function loadFacebookModal() {
		if (isTouchDevice()===false) {
			return;
		} else if ($.cookie('facebook')) {
			return;
		} else if ($('#global-container').is('.tag, .category, .single')) {
			$('#fb-modal').delay(3200).fadeIn(600);
		}
	};

	function loadLikeBar() {
		if ($('#global-container').is('.tag, .category, .home, .archive')) {
			$('#likeBar').delay(22000).animate({bottom: "0px"}, 500);
		}
	}

	setTimeout(loadLikeBar, 7000);

	function sticky_relocate() {
		var window_height = window.innerHeight;
	    var window_top = $(window).scrollTop();
	    var div_top = $('#sidebar-anchor').offset().top;
	    if (window_top > (div_top + 240)) {
	        $('#sidebar').addClass('sticky').css({'height': window_height, 'overflow':'scroll'});
	    } else {
	        $('#sidebar').removeClass('sticky');
	    }
	};

	function isTouchDevice() {
		return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
	};

	function defaultSelect() {
		var firstOpt = $('select option:first-child');

		if (firstOpt.val() == '') {
			firstOpt.attr('default', '');
			firstOpt.attr('selected', '');
			firstOpt.val('Choose');
			firstOpt.text('Choose');
		}
	};

	function recordShare(e) {
		if (e.target !== e.currentTarget) {
	        var clickedItem = $(event.target).attr('class');
	        alert("You clicked " + clickedItem);
	        _kmq.push(['record', clickedItem]);
	        _gaq.push(['_trackEvent', 'Social Share', clickedItem]);
	    }
	    e.stopPropagation();
	};

	loadNewsletter();

	loadFacebookModal();

	loadLikeBar();

	defaultSelect();

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
	   $('a[href="#"]').click( function(e) {
	      e.preventDefault();
	   } );
	});

	// Navbar Shrinks on Scroll

	$(window).scroll(function() {
		if ($(document).scrollTop() > 50) {
			$('nav').addClass('shrink') && $('.footbut').addClass('appear');
		} else {
			$('nav').removeClass('shrink') && $('.footbut').removeClass('appear');
		}
	});

	// Scroll down Button Actually Scrolls Down

	var body = $('html, body');

	$(function() {
		$('#scroll-down').click(function(e){
	        e.preventDefault();
	        body.animate({scrollTop:520}, '2000', 'swing');
		});
	});

	// Sticky Sidebar
	$(function() {
		if ($('#global-container').is('.tag, .category, .single')) {
			if (isTouchDevice()===true) {
				return;
			} else {
				$(function () {
				    $(window).scroll(sticky_relocate);
				    sticky_relocate();
				});
			}
		} else {
			return;
		}
	});

	/////////////////////
	////// MODALS  //////
	/////////////////////

	$(function() {
		$('#signupButton').on('click', function(e) {
			e.preventDefault();
			$("#email-signup").fadeIn(500);
			// $('#fieldName').focus();
	        $("#newsletterClose").click(function() {
	            $("#email-signup").fadeOut(500);
	        });
		});
	});
	
	$(function() {
		$('#email-signup .back').click(function(e){
	        e.preventDefault();
	        $("#email-signup").fadeOut(500);
	        $.cookie('newsletter', 14);
		});
	});

	$(function() {
		$('#fb-modal .back').click(function(e){
	        e.preventDefault();
	        $("#fb-modal").fadeOut(500);
	        $.cookie('facebook', 14);
		});
	});

	$(function() {
		$("#newsletterClose").click(function() {
	        $("#email-signup").fadeOut(500);
	        $.cookie('newsletter', 14);
	    });	
	});

	$(function() {
		$("#fbClose").click(function() {
	        $("#fb-modal").fadeOut(500);
	        $.cookie('facebook', 14);
	    });	
	});

	// Detect User Agent

	// if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	//   var msViewportStyle = document.createElement('style')
	//   msViewportStyle.appendChild(
	//     document.createTextNode(
	//       '@-ms-viewport{width:auto!important}'
	//     )
	//   )
	//   document.querySelector('head').appendChild(msViewportStyle)
	// }

	//////////////////////////
	/// Bootstrap Collapse ///
	//////////////////////////
	
	// $('.nav-collapse a[data-toggle]').click(function() {
	//   $('.nav-collapse').css('height', '100%');
	// });

	$(function() {
		$('#glides').perfectScrollbar({
			suppressScrollY: true
		});
	});

	// Nav Button
	$(function() {
		$('#nav-button').on('click', function(event) {
	        $('.hmbrgr').click();
	    });
	});

	$(function() {
		$('.hmbrgr').on('click', function(e) {
			$('.modal-nav').fadeToggle('show');
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
		$('#footer-open').on('click', function(event) {
			event.preventDefault();
	        $('#footer').toggleClass('footerOn');
	    });
	});

	$(function() {
		$("#footer-close").click(function(e) {
			e.preventDefault();
	        $('#footer').toggleClass('footerOn');
	        $.cookie('newsletter', 14);
	    });
	});

	// CLOSE Facebook LIKE BAR
	$(function() {
		$("#likeBar-close").click(function(e) {
			e.preventDefault();
	        $('#likeBar').animate({bottom: "-60px"});
	        $.cookie('facebook', 7);
	    });
	});

	// Google Analytics Events

	$(function() {
		if ($('#global-container').is('.tag, .category, .single')) {
			var shareButton = document.querySelector('post-social');
			shareButton.addEventListener('click', recordShare, false);
		} else {
			return;
		}
	});

	// shareButton.addEventListener(shareFacebook, 'click', function() { 
	// 	console.log(shareFacebook);
	// 	// ga('send', 'event', 'button', 'click', 'share on facebook'); 
	// 	_kmq.push(['record', 'Share on Facebook']);
	// 	_kmq.push(['record', 'Share on Facebook']);
	// });

});

