
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
			$().css('-webkit-transform: rotate(90deg);');
			$('.collapse').collapse('hide');
		})

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


	});

