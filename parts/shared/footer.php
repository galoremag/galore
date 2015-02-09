		</div>
	</div>
	
	<div id="footer-trigger">
		<footer>
			<div class="container-fluid">
				<div class="pull-left">
					<a class="brand-white-sm" href="#"></a>
				</div>
	<!-- 			<div class="pad5 pull-left">
					<ul class="legal">
						<li>
							<p>&copy; <?php echo date("Y"); ?> Galore Media.</p>
						</li>
					</ul>
				</div> -->
				<div class="pad5 pull-left">
					<?php wp_nav_menu( array('theme_location' => 'footer-menu')); ?>
				</div>
				<div class="pull-right">
					<?php get_search_form(); ?>
				</div>
			</div>
		</footer>

	</div>