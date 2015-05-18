
	<div id="signup">
		<?php get_template_part( 'signup' ); ?>
	</div>
		
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>

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