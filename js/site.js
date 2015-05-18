
	jQuery(document).ready(function($) {

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

		/////////////////////
		// Signup Modal  //
		/////////////////////

		// Set Focus
		$('div#myModal').on('shown.bs.modal', function () {
			$('#CenterSignup').focus();
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

		/////////////////////
		// Footer Opener //
		/////////////////////

		$('#footer-open').click(function(event) {
			event.preventDefault();
			$('footer').css('bottom: 0px;');
		});

		$('#footer-close').click(function(event) {
			event.preventDefault();
			$('footer').css('bottom: -50px;');
		});

		$('#glides').perfectScrollbar();

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

