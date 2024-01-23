/*global window*/
//@codekit-prepend "plugins.js";

$(document).ready(function(){

    var endpoint_prefix = window.location.host.indexOf('localhost') == -1 ?
            '' : '/wordpress';

    // Spotify Embeds Responsive
    // http://stackoverflow.com/questions/13039311/making-spotify-embeds-responsive
    // http://codepen.io/jbasoo/pen/gDkoc
    $('iframe[src*="embed.spotify.com"]').each( function() {
        $(this).css('width',$(this).parent(1).css('width'));
        $(this).attr('src',$(this).attr('src'));
    });

    // Shipping the same
    $('#same-address-shipping').click(function() {
        if( $(this).is(':checked')) {
            $("#shipping-address-fields").hide();
        } else {
            $("#shipping-address-fields").show();
        }
    });

    var carousel_alt = $('.carousel-alt .carousel'),
        items = carousel_alt.find('.item');

    function resizeCarousel(delay) {
        carousel_alt.css('height', 'auto');
        items.css('height', 'auto');
        var carousel_height = carousel_alt.height();
        if (carousel_height < 100) {
            setTimeout(function() {
                resizeCarousel(100);
            }, 500)
            return;
        }
        if (carousel_height > 780) {
            carousel_height = 780;
        }
        items.css('height', carousel_height + 'px');
        setTimeout(function() {
            carousel_alt.css('height', carousel_height + 'px');
            items.css('height', carousel_height + 'px');
        }, delay);
    }

    // Start alt carousel
    if (carousel_alt.length >= 1) {
        carousel_alt.carousel();
        resizeCarousel(2000);
        $(window).resize(function() {
            resizeCarousel(300);
        });
    }

    // Newsletter signup with cookie
    /*
     $(function() {
     "use strict";
     if ($.cookie('shownNewsletter') !== 'true') {
     $('#newsletter-signup').delay('fast').slideDown({
     duration: 600,
     easing: 'easeOutBounce'
     });
     }
     $.cookie('shownNewsletter', 'true', {expires: 7});
     });
     $('#newsletter-signup i').click(function() {
     $('#newsletter-signup').slideUp('slow');
     });
     */

    // Recommendations on scroll
    var isBusy = false,
        $active = $('.bottom-nav a.active'),
        category = $active.data('category'),
        body_post_id = $('body').data('post_id');

    function processScroll() {
        var seen_post_ids = [];
        if (body_post_id) {
            seen_post_ids.push(body_post_id);
        }
        var $posts = $('.recs li');
        $posts.each(function(i, e) {
            var $e = $(e),
                e_data = $e.data('post_id');
            if (e_data) {
                seen_post_ids.push(e_data);
            }
        });

        $.ajax({
            url: endpoint_prefix + '/api/recs/recs/',
            data: {category: category,
                   seen_post_ids: seen_post_ids.join(',')},
            dataType: 'jsonp',
            success: function(data) {
                if (!data || data.status != 'ok') {
                    return false;
                }
                $('.recs').append($("<div/>").html(data.message).text());
                setTimeout(function() {
                    isBusy = false;
                }, 1000);
            }
        });
    }
    if ($('body').hasClass('single')) {
        $.pagescroll({
            container: "body > .container",
            threshold: 1400,
            callback: function() {
                if (isBusy) {
                    return;
                }
                isBusy = true;
                processScroll();
            }
        });
    }
});

$(window).resize(function() {
    "use strict";
    $('iframe[src*="embed.spotify.com"]').each( function() {
        $(this).css('width',$(this).parent(1).css('width'));
        $(this).attr('src',$(this).attr('src'));
    });
});
