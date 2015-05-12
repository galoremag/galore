var disqus_shortname    = 'galoremag';
var commentsContainer = jQuery('.comments_container');

jQuery(document).ready(function(jQuery) {

	jQuery(function() {
		FastClick.attach(document.body);
	});

	// IDK What This Is
	// ( function( jQuery ) {
	//     jQuery( document.body ).on( 'post-load', function () {
	//         // New posts have been added to the page.

	//     } );
	// } )( jQuery );

	// Navbar Shrinking On Scroll
	jQuery(window).scroll(function() {
	  if (jQuery(document).scrollTop() > 50) {
	    jQuery('nav').addClass('shrink');
	  } else {
	    jQuery('nav').removeClass('shrink');
	  }
	});

	/////////////////////
	// Signup Modal  //
	/////////////////////

	jQuery('div#myModal').on('shown.bs.modal', function () {
		jQuery('#CenterSignup').focus();
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
	
	jQuery('.nav-collapse a[data-toggle]').click(function() {
	  jQuery('.nav-collapse').css('height', '100%');
	});

	/////////////////////
	// Footer Opener //
	/////////////////////

	jQuery('#footer-open').click(function(event) {
		event.preventDefault();
		jQuery('footer').css('bottom: 0px;');
	});

	jQuery('#footer-close').click(function(event) {
		event.preventDefault();
		jQuery('footer').css('bottom: -50px;');
	});

	jQuery('#glides').perfectScrollbar();

});

