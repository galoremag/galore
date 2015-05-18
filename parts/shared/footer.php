		</div>
	</div>
	
	<div id="footer-trigger">
		<div class="footbut">
			<a id="footer-open" class="brand-white-sm" href="#"></a>
		</div>
		<footer>
			<div class="container-fluid">
				<div class="footer-icon pull-left">
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

	<!-- Newsletter Signup -->

	<div id="email-signup">
	    <div class="email-signup-dialog col-md-4 col-md-offset-4">
	        <div class="email-signup-content">
	            <div class="email-signup-header">
	                <button id="newsletterClose" type="button" class="close" data-dismiss="email-signup" aria-label="Close"><span aria-hidden="true" class="fa fa-close"></span></button>
	            </div>
	            <div class="email-signup-body">
	                <div class="brand-white" style="margin: 0 auto -100px auto;"></div>
	                <p class="text-center">
	                    Get Galore updates right in your inbox.
	                </p>
	                <h2 class="text-center"><span>Get On The List</span></h2>
	                <form action="http://galoremag.createsend.com/t/i/s/tjcj/" method="post">
	                    <div class="form-group">
	                        <input placeholder="Name" class="form-control" id="fieldName" name="cm-name" type="text" required />
	                    </div>
	                    <div class="form-group">
	                        <input placeholder="Email" class="form-control" id="fieldEmail" name="cm-tjcj-tjcj" type="email" required />
	                    </div>
	                    <div class="form-group">
	                        <button class="btn btn-bp" type="submit">Subscribe</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>