
// http://stackoverflow.com/questions/12518412/twitter-bootstrap-responsive-carousel-with-multiple-items
(function($) {
  var _next, _prev;
/* lets safely prototype the next/prev function to allow for this solution to withstand upgrades in TB
=====================================================*/
  _next = $.fn.carousel.Constructor.prototype.next;
  _prev = $.fn.carousel.Constructor.prototype.prev;
  $.fn.carousel.Constructor.prototype.next = function() {
    this.$element.trigger('pln.next');
    return _next.call(this);
  };
  $.fn.carousel.Constructor.prototype.prev = function() {
    this.$element.trigger('pln.prev');
    return _prev.call(this);
  };
/* in short we simply cloned the TB function and triggered our own custom event to allow us to bind in our own logic
    jQuery style
=====================================================*/
  $('div.carousel.jcarousel').each(function() { /* we are only interested in .jcarousel optioned carousel */
      /* create our variables safely in local scope */
      var item_width, stop_pos, total_items, total_width, visible_items, visible_width, _carousel, _slider;

      _carousel = $(this); /* lets jQuerify our carousel */
      /**
       * Gather some dimensions for our next/prev events to be able to calculate the correct carousel movements
       * total_items = the count how many items we have in the carousel window to move.
       *                 Note: that we are counting the spanX in the carousel.
       * item_width = the width of the first spanX. We are going to assume that all items are created of equal width.
       *                 (this could be extended to handle multiple widths but it would change the dynamics of the movement to more a per click algorithm instead of global on init like this)
       * total_width = the total width of the carousel items
       *                  (since our CSS uses an arbitary width on the .item.active in the carousel of 20000em we need to get the real dimensions to shrink it down to is actual size.
       *                     If not the next/prev would not function correctly)
       * visible_items = how many items do we see at one time in our viewport
       * stop_pos = our viewport width will act as a stop position when we reach the last of the items that are visible
       * _slider = the jQuery object which we animate left/right as user clicks the next/prev. This is a performance variable since if we did not create it then you would have to $(..) the
       *             node at every click of next/prev. We also set the .data('to') property to 0 at this point since we want to prevent .animate queue mishaps of people rapidly clicking
       *             either prev/next
       *
       */
      total_items = _carousel.find('div[class^=span]').length;

      item_width = _carousel.find('div[class^=span]:first').outerWidth(true);

      total_width = item_width * total_items;

      _carousel.find('.item:first').width(total_width); // lets shrink the actual container to it's real size

      visible_items = Math.round(_carousel.find('.carousel-inner').width() / item_width);

      visible_width = visible_items * item_width;

      stop_pos = visible_width - total_width;

      _slider = _carousel.find('.item:first');

      _slider.data('to', 0);

    /* Event binding
     * ======================*/
    /* Since we have created our own events that get fired first and then return back to the Bootstrap Carousel original methods
     *  we now have complete control of what happens when people click next/prev.. safely.
     */
     _carousel.carousel('pause').on({
          'pln.prev': function() {
              /* Event: User has clicked prev ( wanting to go back and item )
               *  - we need to check a few things to ensure that we can indeed advance our carousel.
               *    1. Is the carousel back at the starting position ( .position().left < 0 )
               *    2. Since we animate we want to make sure the carousel is not animating or already in motion.
               *             * Originally I did use the $(..).is(':animated') but since Twitter Bootstrap uses it's own $.Event method I was getting
               *               some wierd results from that and chose to use my own logic for when the slider was not moving
               */
            if (_slider.position().left < 0 && _slider.position().left === _slider.data('to')) {
              _slider.data('to', _slider.position().left + item_width); // lets set the .data('to') property to the final value so we can check if the carousel is at it's final destination before moving it again
              _slider.animate({
                left: "+=" + item_width + "px"
              }, 'fast'); // lets move the slider
            }
            return false;
          },
          /**
           * Same logic as pln.prev but the math is different cause we are going in the other direction
           */
          'pln.next': function() {
            if (_slider.position().left > stop_pos && _slider.position().left === _slider.data('to')) {
              _slider.data('to', _slider.position().left - item_width);
              _slider.animate({
                left: "-=" + item_width + "px"
              }, 'fast');
            }
            return false;
          }
        });

  });

})(jQuery);
