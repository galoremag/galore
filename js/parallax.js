(function() {
        var $sections = $('.listHero'),
            $firstSection = $sections.first(),
            $lastSection = $sections.last(),
            scrollClass = 'scroll',
            resized = true,
            scrollTriggerYMin = 0,
            scrollTriggerYMax = 0,
            scrollTriggeredMin = null,
            scrollTriggeredMax = null;

        // use an indirect approach to updating the trigger positions
        // this way we don't over do it with event handlers
        $window.on('resize load orientationchange', function() {
            resized = true;
        });
        // $('.ringly-item img').on('load', function() {
        //     resized = true;
        // });

        // when page size changes, recalculate trigger point for scroll change
        function updateYTriggers() {
            if (resized) {
                resized = false;

                // notify others of potential page changes
                $window.trigger('updated-y-position');

                // delay in case the above trigger causes other page
                // changes!
                window.setTimeout(function() {
                    scrollTriggerYMax = $lastSection.offset().top;
                    scrollTriggerYMin = $firstSection.offset().top;
                    $window.trigger('scroll');
                }, 1);
            }
        }

        updateYTriggers();
        window.setInterval(updateYTriggers, 200);

        // when page has scrolled see if we hit the scroll target
        $window.on('scroll', function() {
            var updateMin = false,
                updateMax = false,
                scrollY = $window.scrollTop();

            // var _data = {
            //     scrollY: scrollY,
            //     scrollTriggerYMin: scrollTriggerYMin,
            //     scrollTriggerYMax: scrollTriggerYMax,
            //     wasTriggeredMax: scrollTriggeredMax,
            //     wasTriggeredMix: scrollTriggeredMin
            // };

            if (scrollY >= scrollTriggerYMax) {
                if (scrollTriggeredMax !== true) {
                    updateMax = true;
                    scrollTriggeredMax = true;
                }
            } else {
                if (scrollTriggeredMax !== false) {
                    updateMax = true;
                    scrollTriggeredMax = false;
                }
            }

            if (updateMax) {
                $lastSection.toggleClass(scrollClass, scrollTriggeredMax);
            }

            if (scrollY <= scrollTriggerYMin) {
                if (scrollTriggeredMin !== true) {
                    updateMin = true;
                    scrollTriggeredMin = true;
                }
            } else {
                if (scrollTriggeredMin !== false) {
                    updateMin = true;
                    scrollTriggeredMin = false;
                }
            }

            if (updateMin) {
                $firstSection.toggleClass(scrollClass, scrollTriggeredMin);
            }

            // _data.updateMax = updateMax;
            // _data.updateMin = updateMin;
            // window._data = _data;

        }).trigger('scroll');

    })();