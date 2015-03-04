		</div>
	</div>
	
	<div id="footer-trigger">
		<div class="footbut">
			<a id="footer-open" class="brand-white-sm" href="#"></a>
		</div>
		<footer>
			<div class="container-fluid">
				<div class="pull-left">
					<a id="footer-close" class="brand-white-sm" href="#"></a>
				</div>
				<div class="pad5 pull-left">
					<?php wp_nav_menu( array('theme_location' => 'footer-menu')); ?>
				</div>
				<div id="site-search" class="pull-right">
					<!-- <?php get_search_form(); ?> -->
					<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<label class="form-group">
							<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'story, person, etc.', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
						</label>
						<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
					</form>
				</div>
			</div>
		</footer>

	</div>