
	<div id="signup">
		<?php get_template_part( 'signup' ); ?>
	</div>
		
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-36901236-1', 'auto');
		ga('send', 'pageview');
	</script>

	<!-- Perfect Scrollbar JS -->
	<!-- <script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/perfect-scrollbar.min.js'></script> -->

	<!-- Create it with slider online build tool for better performance. -->
	<script src="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>		

	<!-- REMOVE THE TAP DELAY -->
	<script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/js/fastclick.js'></script>

	<!-- Inline Disqussions -->
	<!-- <script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/js/inlineDisqussions.js'></script> -->

	<!-- ScrollSpy -->
	<!-- <script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/js/scrollspy.min.js'></script> -->

	<!-- JS History -->
	<!-- <script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/js/jquery.history.js'></script> -->

	<!-- Infiniscroll -->
	<!-- <script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/js/infiniscroll.js'></script> -->

	<!-- Main slider JS script file --> 
	<script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/js/site.js'></script>

	</body>
</html>