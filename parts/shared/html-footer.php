
	<div id="signup">
		<?php get_template_part( 'signup' ); ?>
	</div>
		
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
		
	<script type="text/javascript">
		$('div#myModal').on('shown.bs.modal', function () {
			$('#CenterSignup').focus();
		});
	</script>

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

	<script>
	$(document).on('click',function(){
	$('.collapse').collapse('hide');
	})
	</script>

	<script type="text/javascript">
		$('#footer-trigger').hover(function() {
			$('footer').css('bottom: 0px;');
		});

		$('.footbut a.brand-white-sm').click(function() {
			$('footer').css('bottom: 0px;');
		});
	</script>

	<?php wp_footer(); ?>
	</body>
</html>