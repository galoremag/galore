		
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
	</script>

	<script type="text/javascript">
	// $(document).ready(function() {

	// 	$('#email-signup').show();
	//   var isMobile = {
	//     Android: function() {
	//         return navigator.userAgent.match(/Android/i);
	//     },
	//     BlackBerry: function() {
	//         return navigator.userAgent.match(/BlackBerry/i);
	//     },
	//     iOS: function() {
	//         return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	//     },
	//     Opera: function() {
	//         return navigator.userAgent.match(/Opera Mini/i);
	//     },
	//     Windows: function() {
	//         return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
	//     },
	//     any: function() {
	//         return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	//     }
	//   };

	//   	$(window).scroll(function() {
	// 		if (($(document).scrollTop() > 50) || ($.cookie('newsletter') == null)) {
	// 			$('#email-signup').show();
	//     		$.cookie('newsletter', '999');
	// 		}
	// 	});

	//   	if ($(document).scrollTop() > 100) {
	// 		$('#email-signup').show();
	// 	}
	//   if (isMobile.any()) {
	//     $('#email-signup').hide();
	//   } else if ($.cookie('newsletter') == null && window.location.pathname === "/") {
	//     $('#email-signup').show();
	//     $.cookie('newsletter', '999');
	//   }
	// });
	</script>

	<!-- Chartbeat -->
	<script type="text/javascript">
	  var _sf_async_config = { uid: 60543, domain: 'galoremag.com', useCanonical: true };
	  (function() {
	    function loadChartbeat() {
	      window._sf_endpt = (new Date()).getTime();
	      var e = document.createElement('script');
	      e.setAttribute('language', 'javascript');
	      e.setAttribute('type', 'text/javascript');
	      e.setAttribute('src','//static.chartbeat.com/js/chartbeat.js');
	      document.body.appendChild(e);
	    };
	    var oldonload = window.onload;
	    window.onload = (typeof window.onload != 'function') ?
	      loadChartbeat : function() { oldonload(); loadChartbeat(); };
	  })();
	</script>

	</body>
</html>