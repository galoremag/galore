// Variables
var content_container   = jQuery('div#single-content');
var nav_container       = jQuery('nav.post-navigation');
var comments_container  = jQuery('div#disqus_thread');
var post_title_selector = jQuery('h1.entry-title');
var curr_url            = window.location.href;

var disqus_shortname    = 'galoremag';

jQuery.noConflict();

jQuery( document ).ready(function() {
    // Don't do this if looking for comments
    // if ( window.location.href.indexOf( '#comments' ) > -1 ) {
    //  return;
    // }

    // jQuery( comments_container ).remove(); // Remove Comments

    // Add divider
    // 
    "use strict";

    jQuery( content_container ).prepend( '<hr style="height: 0" class="post-divider" data-title="' + window.document.title + '" data-url="' + window.location.href + '"/>' );

    initialise_Scrollspy();

    initialise_History();

    jQuery('#fb-single').click(function() {
        window.open('https://www.facebook.com/sharer/sharer.php?u='+ curr_url +'','Share this post on Facebook','width=600,height=400');
    });

});

function initialise_Scrollspy() {
    // Spy on post-divider - changes the URL in browser location, loads new post 
    "use strict";

    jQuery('.post-divider').on('scrollSpy:exit', changeURL ); 
    jQuery('.post-divider').on('scrollSpy:enter', changeURL );
    jQuery('.post-divider').scrollSpy();

}

function initialise_History() {
    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state

        if ( State.url != curr_url ) {
            window.location.reload(State.url);
        }
    });
}

function changeURL() {
    // var _gaq = _gaq || [];
    var el         = jQuery(this);
    var this_url   = el.attr('data-url');
    var this_title = el.attr('data-title');
    var offset     = el.offset();
    var scrollTop  = jQuery(document).scrollTop();

    // If exiting or entering from top, change URL 
    if ( ( offset.top - scrollTop ) < 150 && curr_url != this_url) {
        curr_url = this_url;
        curr_title = this_title;

        // update the browser location
        History.pushState(null, null, this_url);
        window.document.title = this_title;
        jQuery( 'h4.social-title' ).text(this_title);

        updategoogle_analytics();

        jQuery('#disqus_thread').remove();

        scrollTop.append('<div id="disqus_thread"></div>');

        // Disqus
        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();

        DISQUS.reset({
          reload: true,
          config: function () {  
            this.page.identifier = this_title;  
            this.page.url = this_url;
          }
        });

        // _gaq.push(['_setAccount', 'UA-36901236-1']);
        // _gaq.push(['_trackPageview', this_url])
    }

    auto_load_next_post();

}

function updategoogle_analytics() {
    if( typeof ga === 'undefined' ) {
        return;
    }

    ga('send', 'pageview', window.location.pathname);
}

function auto_load_next_post() {
    // Grab the url for the next post
    "use strict";

    var post_url = jQuery('a[rel="prev"]').attr('href');
    var np_url;

    if ( !post_url ) { return };

    // Check to see if pretty permalinks, if not then add partial=1
    if ( post_url.indexOf( '?p=' ) > -1 ) {
        np_url = post_url + '&partial=1'
    } else {
        var partial_endpoint = 'partial/';

        if( post_url.charAt(post_url.length - 1) != '/')
            partial_endpoint = '/' + partial_endpoint;

        np_url = post_url + partial_endpoint;
    }

    // Remove the post navigation HTML once the next post has loaded.
    jQuery( nav_container ).remove();

    jQuery.get( np_url , function( data ) { 
        var post = jQuery("<div>" + data + "</div>");

        data = post.html(); // Return the HTML data of the next post that was loaded.

        var post_html  = jQuery( '<hr class="post-divider" data-url="' + post_url + '"/>' + data );
        var post_title = post_html.find( post_title_selector );

        jQuery( content_container ).append( post_html ); // Add next post

        // get the HR element and add the data-title
        jQuery( 'hr[data-url="' + post_url + '"]').attr( 'data-title' , post_title.text() ).css( 'display', 'inline-block' );

        // need to set up ScrollSpy on new content
        initialise_Scrollspy();

        return;
    });

}