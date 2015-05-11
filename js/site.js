var commentTrigger = jQuery('button#comment_trigger');

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

	// Open Comments
	jQuery(commentTrigger).on('click', function() {
		var this_url = jQuery('a[rel="prev"]').attr('href');
		var this_title = jQuery('a[rel="prev"]').attr('data-title');
		var this_id = '<?php get_page_by_title('+ this_title +'); ?>';
		var disqus_shortname 	= 'galoremag';

		jQuery('#comments_container').html('<div id="disqus_thread"></div>');
			
		/* * * DON'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();

	    /* * * Disqus Reset Function * * */
	    function reset (next_id, next_url, next_title) {
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

