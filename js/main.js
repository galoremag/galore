jQuery(window).on('load', function($) {

});

jQuery(document).ready(function($) {

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
	};

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

	$(function() {
		if ($.cookie('sponsorLoaded')) {
			$('#superSpecial').css({'display' : 'none'}) && $('#scroll-down').css({'display' : 'none'}) && $('#global-inner').addClass('padTop120');
		} else if (isTouchDevice()===true) {
			$('#superSpecial').css({'display' : 'block'}) && $('#scroll-down').css({'display' : 'block'}) && $.cookie('sponsorLoaded', 14);
		} else {
			$('#superSpecial').css({'display' : 'none'}) && $('#scroll-down').css({'display' : 'none'}) && $('#global-inner').addClass('padTop120');
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
	        $("#email-signup").fadeOut(500) && $.cookie('newsletter', 14);
		});
	});

	$(function() {
		$('#fb-modal .back').click(function(e){
	        e.preventDefault();
	        $("#fb-modal").fadeOut(500) && $.cookie('facebook', 14);
		});
	});

	$(function() {
		$("a#newsletterClose").click(function() {
	        $("#email-signup").fadeOut(500) && $.cookie('facebook', 14);
	    });
	});

	$(function() {
		$("a#fbClose").click(function() {
	        $("#fb-modal").fadeOut(500) && $.cookie('facebook', 14);
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

