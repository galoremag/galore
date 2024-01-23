(function($, window) {
    var PageScroll = function(cfg) {
        var self = this,
            $container = $(cfg.container),
            $window = $(window),
            threshold = cfg.threshold,
            stopResponseScroll = false;

        $.extend(self, {
            bottomReached : function() {
                var $body = $('body'),
                    scrollableDistance = $window.scrollTop(),
                    totalScrollableDistance = $body.outerHeight( true ) - $window.outerHeight( true ),
                    distanceToBottom = totalScrollableDistance - scrollableDistance;
                return distanceToBottom < threshold;
            }
        });

        // check scroll in a separate method to prevent the handler from
        // going nuts during a scroll event:
        // http://ejohn.org/blog/learning-from-twitter/
        var didScroll = false;
        var scrollHandler = function() {
            didScroll = true;
        };
        $window.on("scroll", scrollHandler);

        window.setInterval(function scrollChecker() {
            if (didScroll) {
                didScroll = false;
                var exceededMaxHeight = cfg.maxHeight > 0 && $container.height() > cfg.maxHeight;
                if (!exceededMaxHeight && !stopResponseScroll && cfg.callback && self.bottomReached()) {
                    cfg.callback();
                }
                if (exceededMaxHeight) {
                    $window.off("scroll", scrollHandler);
                    if (cfg.maxReachCallback) {
                        cfg.maxReachCallback();
                    }
                }
            }
        }, 250);
    };

    var settings = {
        threshold: 1400,
        container: "body",
        callback: undefined,
        maxReachCallback: undefined,
        maxHeight: -1
    };

    $.pagescroll = function(config) {
        var cfg = $.extend({}, settings, config);
        return new PageScroll(cfg);
    };
})(jQuery, window);
