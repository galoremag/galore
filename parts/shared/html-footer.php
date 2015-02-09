
	<script type="text/javascript">
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement('style')
		  msViewportStyle.appendChild(
		    document.createTextNode(
		      '@-ms-viewport{width:auto!important}'
		    )
		  )
		  document.querySelector('head').appendChild(msViewportStyle)
		}
	</script>

	<script type="text/javascript">
		$('#footer-trigger').hover(function() {
			$('footer').css('bottom: 0px;');
		});
	</script>

	<?php wp_footer(); ?>
	</body>
</html>