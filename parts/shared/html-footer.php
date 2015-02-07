
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

	<!-- NAVBAR SHRINKING -->

	<script type="text/javascript">
		$(window).scroll(function() {
		  if ($(document).scrollTop() > 50) {
		    $('nav').addClass('shrink');
		  } else {
		    $('nav').removeClass('shrink');
		  }
		});
	</script>

	<?php wp_footer(); ?>
	</body>
</html>