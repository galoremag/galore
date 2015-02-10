
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

		$('.footbut a.brand-white-sm').click(function() {
			$('footer').css('bottom: 0px;');
		}):

		function sticky_relocate() {
			var window_top = $(window).scrollTop();
			var div_top = $('#social-anchor').offset().top;
			if (window_top > div_top)
				$('#post-social').addClass('sticky')
			else
				$('#post-social').removeClass('sticky');
			}
			$(function() {
				$(window).scroll(sticky_relocate);
			sticky_relocate();
		});
	</script>

	<?php wp_footer(); ?>
	</body>
</html>