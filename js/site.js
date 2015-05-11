var commentTrigger = $('#commentTrigger');

jQuery(document).ready(function($) {

	$(function() {
		FastClick.attach(document.body);
	});

	// IDK What This Is
	( function( $ ) {
	    $( document.body ).on( 'post-load', function () {
	        // New posts have been added to the page.

	    } );
	} )( jQuery );

	// Navbar Shrinking On Scroll
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

	// Open Comments
	$(commentTrigger).click(function() {
		var this_url = $('a[rel="prev"]').attr('href');
		var this_title = $('a[rel="prev"]').attr('data-title');
		var this_id = '<?php get_page_by_title('+ this_title +'); ?>';
		var commentTrigger = $('#commentTrigger');
		var disqus_shortname 	= 'galoremag';

		$('#comments_container').html('<div id="disqus_thread"></div>');
			
		/* * * DON'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();

	    /* * * Disqus Reset Function * * */
	    function reset(next_id, next_url, next_title) {
	        DISQUS.reset({
	            reload: true,
	            config: function () {
	                this.page.identifier = this_id;
	                this.page.url = this_url;
	                this.page.title = this_title;
	            }
	        });
	    };
	});

});

