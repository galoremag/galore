/**
 * infinite-single.js
 *
 * Creates a single post infinite scroll capability
 * Will only currently work on single pages with no
 * planned support for search or other implementations
 */
( function( $ ) {

	$( window ).load( function() {

		// Dimension the variables we'll use
		// Define the vertical offset position of the scroll event
		var position = $( window ).scrollTop(),

			// Define the main container that we will need to append our content to
			main_container = $( document.getElementById( 'single-content' ) ),

			// Detect if the scroll has already been initiated this is only in the context of infinite scroll loading the next article and NOT the push state
			scroll_detection = false,

			// Determine the page offset from the top of the window
			page_sidebar_offset = $( '#secondary' ).position().left,

			// Create a placeholder for our scroll timer this will help prevent bloating the dom with scroll requests for our pushstate
			scroll_time, last_scroll_time = 0,

			// The main selector for all articles on single post
			articles_selector = '#single-content article',

			// To parse facebook comments we are wrapping this in this div for now
			article_wrap = 'article-wrap',

			article_last_active = 'single-content article.active:visible',

			// Determine the first post on page load
			first_article = $( articles_selector + ':first' ),

			// Define the default current post id by getting the current post id for the first article on the page
			current_post_id = first_article.data( 'post' ),

			// Defines the primary channel to use in our query
			primary_channel = first_article.data( 'primary-channel' ),

			// Defines the date range to use in our query
			before_date = first_article.data( 'date' ),

			// Define the infinite loading container
			single_infinite_loading = 'single-infinite-loading',

			// Set an active class for the current post that's in the spotlight
			active_post_class = 'active',

			// Establish a success_count for the AJAX call which will determine the wp_query offset
			success_offset = 0,

			// Header outer height
			header_outer_height = $( 'header#masthead' ).outerHeight(),

			load_status = 'load',

			sticky_selector = '.single #secondary',

			// Facebook comments id that we will append the post id to to show hide the comments
			facebook_comments_id = '#facebook-comments-box-',

			// Define the width for the sidebar so that it doesn't get confused and display improperly
			sticky_width = $( sticky_selector ).width(),

			gpt_wildcard = '[id^=div-gpt-ad-]',
			slot_name    = 'slot-name',

			// Setup an array that contains all posts already sent to Google Analytics
			ga_sent = [current_post_id],

			// Set the id for no more results
			no_more_results_id = '#no-more-results',
			no_more_results = false,

		// Create blank variables
			article_divs, article_id, $article, comment_id, gpt_slot, minimum_scroll_time, new_html,
			new_sidebar, new_title, new_url, new_id, new_page_url, new_author, new_channel, new_style, now, post_article, scroll, sidebar_id, slot, the_top, sidebar_display_on_resize, scrollTimer;

		// Create the infinite loading div
		$('<div/>', { id: single_infinite_loading } )
			.insertAfter( main_container );

		// Set a default article min-height because the ads overtake the page and flow into other ads
		if ( '0' === infiniteSingle.is_mobile && 768 < $( window ).width() ) {
			$( '.' + article_wrap )
				.first()
				.css( 'min-height', $( '#secondary' ).outerHeight() + 'px' );
		}

		// pre-load the first article on page load if it's the first page load
		if ( 'load' === load_status ) {
			load_next_article();
		}

		//This will keep the sidebars aligned with the main sidebar in case the window is resized
		$( window ).on( 'resize', function() {
			if ( 768 >= $( window ).width() ) {
				sidebar_display_on_resize = 'none';
			} else {
				sidebar_display_on_resize = 'block';
			}
			page_sidebar_offset = $( '#secondary' ).position().left;

			$( 'div[id^=infinite-single-sidebar-]' ).css( {
				'left': parseInt( page_sidebar_offset, 10 ) + 'px',
				'display': sidebar_display_on_resize
			} );
		} );

		// show hide subnav depending on scroll direction
		$( window ).on( 'scroll', function() {
			minimum_scroll_time = 2000;
			now                 = new Date().getTime();
			scroll              = $( this ).scrollTop();
			article_divs        = $( articles_selector );

			// When article reaches the top of the dom lets start loading the next post
			if ( ! scroll_detection ) {
				// By adding 500 to the scrollTop we can begin loading posts way before
				// the user ever reaches the bottom of the page. This way the posts are
				// just waiting for them before they even know they want them. This *should*
				// make it so no one ever even sees the waiting animation.
				if ( $( window ).scrollTop() >= $( document ).height() - ( $( window ).height() + 300 ) ) {
					scroll_detection = true;
					load_next_article();
				}
			}

			// If the scroll timer isn't restricted or is new
			if ( ! scroll_time ) {

				// Take the now and reduce by the last scroll time and determine if that is less than the minimum scroll time
				if ( now - last_scroll_time >= minimum_scroll_time ) {
					// Set the active article
					setActiveArticle( article_divs, scroll );
					// Set the last scroll time to now
					last_scroll_time = now;
				}

				// Set the new Throttled scroll timer
				scrollTimer = setTimeout( function() {
					scroll_time      = null;
					last_scroll_time = new Date().getTime();
					setActiveArticle( article_divs, scroll );
				}, minimum_scroll_time );
			}
		} );

		// This will add a show/hide toggle for the Facebook comments
		$( document ).on( 'click', '.entry-comments a', function( event ) {
			event.preventDefault();
			comment_id = $( this ).data( 'post-id' );
			comment_id = facebook_comments_id + parseInt( comment_id, 10 );
			if ( $( comment_id ).length ) {
				$( comment_id ).toggle();
			} else {
				$( '#comments' ).toggle();
			}
			return false;
		} );

		// Push whatever we can to ga
		function push_analytics( article_id, article_author, article_channel, article_style, article_title, article_url ) {
			if ( -1 >= $.inArray( article_id, ga_sent ) ) {
				_gaq.push( ['_setCustomVar', 1, 'contentId', '' + article_id + '', 3] );
				_gaq.push( ["_setCustomVar", 2, 'author', '' + article_author + '', 3] );
				_gaq.push( ['_setCustomVar', 3, 'Story Channel', '' + article_channel + '', 3] );
				_gaq.push( ['_setCustomVar', 4, 'post style', '' + article_style + '', 3] );
				_gaq.push( ['_set', 'title', '' + article_title + ''] );
				_gaq.push( ['_trackPageview', '' + article_url + ''] );
				ga_sent.push( article_id );
			}
		}

		/**
		 * Set the active article by determining the offset of all
		 * article dom elements with an offset
		 *
		 * @param  object article_divs A jQuery matched set of article elements
		 * @param  object scroll       The current scroll position
		 * @return null
		 */
		function setActiveArticle( article_divs, scroll ) {
			// Determines the currently active element on the page with an offset
			the_top = $.grep( article_divs, function( item ) {
				return ( $( item ).offset().top - header_outer_height ) <= scroll;
			} );
			article_divs.removeClass( active_post_class );
			$( the_top ).addClass( active_post_class );

			new_url = $( article_last_active ).last().data( 'url' );
			new_title = $( article_last_active ).last().data( 'title' );
			new_id = $( article_last_active ).last().data( 'post' );
			new_page_url = $( article_last_active ).last().data( 'page-url' );
			new_author = $( article_last_active ).last().data( 'author' );
			new_channel = $( article_last_active ).last().data( 'primary-channel-name' );
			new_style = $( article_last_active ).last().data( 'style' );

			// Keep this from firing if the URL was already updated
			if ( new_url !== document.URL && 'undefined' !== typeof new_title ) {

				// Update the title for the browser
				document.title = new_title;

				// Accepts state object, title, url
				window.history.pushState( null, null, new_url );

				// Push Google Analytics for the new article
				push_analytics( new_id, new_author, new_channel, new_style, new_title, new_page_url );

				// Refresh the addthis share bar that's inserted
				addthis.layers.refresh();
			}

			position = scroll;
		}

		/**
		 * Query for the next article and append it to the DOM
		 *
		 * @param  null
		 * @return null
		 */
		function load_next_article() {
			$.ajaxSetup( { cache: false } );
			$.ajax( {
				url      : infiniteSingle.admin_url,
				type     : 'POST',
				cache    : false,
				dataType : 'html',
				data     : {
					action          : 'infinite_scroll',
					current_post_id : current_post_id,
					offset          : success_offset,
					primary_channel : primary_channel,
					before_date     : before_date
				},

				/**
				 * Run some code before the AJAX is sent
				 *
				 * @return null
				 */
				beforeSend: function() {
					// Bail if there are no more results/articles to load
					if ( true === no_more_results ) {
						return false;
					}

					// Display the loading animation
					$( document.getElementById( single_infinite_loading ) ).show();

					// load_status is set to 'show' after the initial page load
					// this keeps IS from immediately loading
					if ( 'show' === load_status ) {

						// Find the last article and display it
						$( document.getElementsByClassName( article_wrap ) )
							.last()
							.css( {
								'position' : 'relative',
								'left'     : 'auto',
								'width'    : 'auto'
							} );

						// We are only using the sidebar on desktop
						// we'll just skip this if we're not on desktop
						if ( '0' === infiniteSingle.is_mobile && 768 < $( window ).width() ) {

							// Ascertain the article HTML id
							article_id = $( document.getElementsByClassName( article_wrap ) )
											.last()
											.find( 'article' )
											.attr( 'ID' );
							$article = $( document.getElementById( article_id ) );

							// Set the position of the ads for this article after everything has rendered so that we are getting the proper heights
							new_sidebar = $( '[id^=infinite-single-sidebar-]', $( '.' + article_wrap ).last() ).css( {
								'position' : 'absolute',
								'width'    : parseInt( sticky_width, 10 ) + 'px',
								'height'   : 'auto',
								'top'      : '0px',
								'left'     : parseInt( page_sidebar_offset, 10 ) + 'px'
							} );

							// Set a min-height on the newly loaded article so that it matches
							// the height of the sidebar
							$article
								.parent()
								.css( 'min-height', new_sidebar.outerHeight() + 'px' );
						}
					}
				},

				/**
				 * AJAX Error Callback
				 *
				 * @return null
				 */
				error: function() {
				},

				/**
				 * AJAX Success Callback
				 *
				 * @param  string html The article HTML returned from the server
				 * @return null
				 */
				success: function( html ) {
					// Hide the loading animation
					$( '#' + single_infinite_loading ).hide();

					// Only should run on the first load
					if ( 'load' === load_status ) {
						load_status = 'show';
					}

					// When building the HTML serverside we add an HTML id
					// if there are no more results to be had
					// Let's check that value and proceed accordingly
					if ( $( html ).is( no_more_results_id ) ) {
						$( main_container ).append( html );
						return no_more_results = true;
					}

					// Create the new html element, append it to the DOM and hide it
					new_html = $( '<div/>', {
						class: article_wrap,
						html: html,
						style: 'position: fixed; left: -9999px; width: 635px;' // So we can get an accurate height;
					} ).appendTo( main_container );

					//----- Start google ad slots -----
					// Foreach ad injected lets find the slot name and the slot defined for gpt and render them
					$.each( $( new_html ), function( i, html ) {
						$( gpt_wildcard, html ).each( function() {
							gpt_slot = $( this ).data( slot_name );
							// Find and refresh the ads asap because this should take higher priority than the comments for the newly appended content
							slot = googletag.defineSlot( gpt_slot, [300, 250], this.id ).addService( googletag.pubads().setTargeting( 'page_type', [ infiniteSingle.targeting ] ) );

							// Display has to be called before
							googletag.display( this.id );

							// refresh and after the slot div is in the page.
							googletag.pubads().refresh( [ slot ] );
						} );
					} );

					//----- End Google ad slots ---

					// Parse the facebook html for the newly appended items so that only those are refreshed and not all of them on the page
					FB.XFBML.parse( new_html[0] );

					// Update the offset for the DB by one
					success_offset++;
					// Set the scroll detection to false so we aren't firing this a bunch of times
					scroll_detection = false;

				} // AJAX success callback function
			} ); // $.ajax

			return false;

		} // load_next_article function

	} ); // window.load

} )( jQuery );