
	jQuery(document).ready(function($) {

		// Mobile Detection

		// var isMobile = {
		// 	Android: function() {return navigator.userAgent.match(/Android/i);},
		// 	BlackBerry: function() {return navigator.userAgent.match(/BlackBerry/i);},
		// 	iOS: function() {return navigator.userAgent.match(/iPhone|iPad|iPod/i);},
		// 	Opera: function() {return navigator.userAgent.match(/Opera Mini/i);},
		// 	Windows: function() {return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);},
		// 	any: function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());}
		// };


		$(function() {
			FastClick.attach(document.body);
		});

		$(window).scroll(function() {
			if ($(document).scrollTop() > 50) {
				$('nav').addClass('shrink');
			} else {
				$('nav').removeClass('shrink');
			}
		});

		function sticky_relocate() {
			var window_height = window.innerHeight;
		    var window_top = $(window).scrollTop();
		    var div_top = $('#sidebar-anchor').offset().top;
		    if (window_top > (div_top + 240)) {
		        $('#sidebar').addClass('sticky').css({'height': window_height, 'overflow':'scroll'});
		    } else {
		        $('#sidebar').removeClass('sticky');
		    }
		}

		$(function () {
		    $(window).scroll(sticky_relocate);
		    sticky_relocate();
		});

		/////////////////////
		// Signup Modal  //
		/////////////////////

	    $(window).scroll(function() {
	    	if ($.cookie('newsletter')) {
	    		$('#email-signup').hide();
	    	} else if ($(document).scrollTop() > 150) {
	    		$("#email-signup").fadeIn(500);
	    		$('#fieldName').focus();
		        $("#newsletterClose").click(function() {
		            $("#email-signup").fadeOut(500);
		            $.cookie('newsletter', 14);
		        });
	    	}
		});

		$('#signupButton').on('click', function() {
			$("#email-signup").fadeIn(500);
    		$('#fieldName').focus();
	        $("#newsletterClose").click(function() {
	            $("#email-signup").fadeOut(500);
	        });
		});

		// Detect User Agent

		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement('style')
		  msViewportStyle.appendChild(
		    document.createTextNode(
		      '@-ms-viewport{width:auto!important}'
		    )
		  )
		  document.querySelector('head').appendChild(msViewportStyle)
		}

		//////////////////////////
		// Bootstrap Collapse   //
		//////////////////////////
		
		$('.nav-collapse a[data-toggle]').click(function() {
		  $('.nav-collapse').css('height', '100%');
		});

		$('#glides').perfectScrollbar();

		// $('#modal-nav-button').click(function() {
		// 	$('.modal-nav').fadeIn(200);
		// });

		// $('.modal-nav-close').click(function() {
		// 	$('.modal-nav').fadeOut(200);
		// });

		$("#newsletterClose").click(function() {
            $("#email-signup").fadeOut(500);
            $.cookie('newsletter', 14);
        });

		$('.hmbrgr').hmbrgr({
		  width     : 13,
		  height    : 11,
		  barHeight : 1,
		  barColor  : '#fff'
		});

		// Nav Button

		$('#nav-button').on('click', function(event) {        
             $('.modal-nav').fadeToggle('show');
        });

        /////////////////////
		// Footer Opener //
		/////////////////////

		$('#footer-open').on('click', function(event) {
            $('#footer').toggleClass('footerOn');
        });

		// Recommendations on scroll
	    // var isBusy = false,
	    //     $active = $('.bottom-nav a.active'),
	    //     category = $active.data('category'),
	    //     body_post_id = $('body').data('post_id');

	    // function processScroll() {
	    //     var seen_post_ids = [];
	    //     if (body_post_id) {
	    //         seen_post_ids.push(body_post_id);
	    //     }
	    //     var $posts = $('.recs li');
	    //     $posts.each(function(i, e) {
	    //         var $e = $(e),
	    //             e_data = $e.data('post_id');
	    //         if (e_data) {
	    //             seen_post_ids.push(e_data);
	    //         }
	    //     });

	    //     $.ajax({
	    //         url: endpoint_prefix + '/api/recs/recs/',
	    //         data: {category: category,
	    //                seen_post_ids: seen_post_ids.join(',')},
	    //         dataType: 'jsonp',
	    //         success: function(data) {
	    //             if (!data || data.status != 'ok') {
	    //                 return false;
	    //             }
	    //             $('.recs').append($("<div/>").html(data.message).text());
	    //             setTimeout(function() {
	    //                 isBusy = false;
	    //             }, 1000);
	    //         }
	    //     });
	    // }
	    // if ($('body').hasClass('single')) {
	    //     $.pagescroll({
	    //         container: "body > .container",
	    //         threshold: 1400,
	    //         callback: function() {
	    //             if (isBusy) {
	    //                 return;
	    //             }
	    //             isBusy = true;
	    //             processScroll();
	    //         }
	    //     });
	    // }

	});

