
	jQuery(document).ready(function($) {

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
		
		$('.navbar-toggle').click(function(){
			event.preventDefault();
			// $(this).css('-webkit-transform: rotate(90deg);');
			$('.collapse').collapse('hide');
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

		//////////////////////
		// CUSTOM SLIDER  //
		//////////////////////

		// function reSize($target){
	 //        $target.css('width', $(window).width()+'px');
	 //    }
  //       $(window).bind('resize', reSize($('#latest')));
  //       $(window).trigger('resize');

  //       $(function () {
		//   var sliding = startClientX = startPixelOffset = pixelOffset = currentSlide = 0,
		//   slideCount = $('.slide').length;

		// $('#latest').live('mousedown touchstart', slideStart);
		// $('#latest').live('mouseup touchend', slideEnd);
		// $('#latest').live('mousemove touchmove', slide);

		// function slideStart(event) {
		//     if (event.originalEvent.touches)
		//       event = event.originalEvent.touches[0];
		//     if (sliding == 0) {
		//       sliding = 1;
		//       startClientX = event.clientX;
		//     }
		//   }

		// function slide(event) {
		//     event.preventDefault();
		//     if (event.originalEvent.touches)
		// 		event = event.originalEvent.touches[0];
		// 		var deltaSlide = event.clientX - startClientX;

		// if (sliding == 1 && deltaSlide != 0) {
		//       sliding = 2;
		//       startPixelOffset = pixelOffset;
		//     }

		// if (sliding == 2) {
		//       var touchPixelRatio = 1;
		//       if ((currentSlide == 0 && event.clientX > startClientX) ||
		//           (currentSlide == slideCount - 1 && event.clientX < startClientX))
		//         touchPixelRatio = 3;
		//       pixelOffset = startPixelOffset + deltaSlide / touchPixelRatio;
		//       $('#glides').css('transform', 'translate3d(' + pixelOffset + 'px,0,0)').removeClass();
		//     }
		//   }

		// function slideEnd(event) {
		//     if (sliding == 2) {
		//       sliding = 0;
		//       currentSlide = pixelOffset < startPixelOffset ? currentSlide + 1 : currentSlide - 1;
		//       currentSlide = Math.min(Math.max(currentSlide, 0), slideCount - 1);
		//       pixelOffset = currentSlide * -$('#glides').width();
		//       $('#temp').remove();
		//       $('<style id="temp">#glides.animate{transform:translate3d(' + pixelOffset + 'px,0,0)}</style>').appendTo('head');
		//       $('#glides').addClass('animate').css('transform', '');
		//     }
		//   }
		// });

		$('#glides').perfectScrollbar();

	});

