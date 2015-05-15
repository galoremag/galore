// self executing anonymous function passing jquery into $ scope


(function($) {

	$(document).ready(function() {


		/////////////////
		// Constants //
		/////////////////

		var CONTAINER = $('#single-content'),
			FOOTER_ELEMENT = $('h4.social-title'),
			POST_CLASS = $('.post'),
			LAZY_LOAD_OFFSET = 200;

		/////////////
		// State //
		/////////////

		var current_target = $('.post'),
			next_post = $('a[rel="next"]').attr('href'),
			prev_post = $('a[rel="prev"]').attr('href'),
			post_id = $('.current-post-id').text();

		///////////////
		// History //
		///////////////

		initializeHistory();

		/////////////////////
		// Init Comments //
		/////////////////////



		//////////////
		// Events //
		//////////////

		$(window).scroll(function() {

			if (calculateScroll(current_target, LAZY_LOAD_OFFSET)) {

				// Inject Partial
				injectPartial(prev_post);
			}

		});

		///////////////
		// Methods //
		///////////////

		// Update Browser History
		function initializeHistory() {
			// Bind to StateChange Event
			History.Adapter.bind(window, 'statechange', function() { // Note: We are using statechange instead of popstate
				var State = History.getState(); // Note: We are using History.getState() instead of event.state

				if (State.url != curr_url) {
					window.location.reload(State.url);
				}
			});
		}

		// Inject Disqus
		function injectDisqus(element) {}

		// Change URL
		function changeURL(element, url) {

			// Change Footer text
			element.html()

			// var _gaq = _gaq || [];
			var el = jQuery(this);
			var this_url = el.attr('data-url');
			var this_title = el.attr('data-title');

			curr_url = this_url;
			curr_title = this_title;

			// update the browser location
			History.pushState(null, null, this_url);
			window.document.title = this_title;
			// jQuery( 'h4.social-title' ).text(this_title);

			// updategoogle_analytics();

			// _gaq.push(['_setAccount', 'UA-36901236-1']);
			// _gaq.push(['_trackPageview', this_url])
		}



		// Inject partial
		function injectPartial(url) {
			$.get(url + '/partial', function(data) {
				var partial = CONTAINER.append(data);
				current_target = $(partial);
			});
		}

		// Calculate Scroll for target
		function calculateScroll(target, offset) {

			var scroll_top = $(window).scrollTop(),
				target_offset_top = current_target.offset().top;

			if ((target_offset_top - scroll_top) < offset) return true;

			// return true when cal - offset 
			return false;

		}

	});

})(jQuery);