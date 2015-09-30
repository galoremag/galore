		</div>
	</div>

	<div id="likeBar" class="">
		<a class="col-xs-6 twitterButton font1" href="https://twitter.com/thegaloremag" target="_blank"><i class="fa fa-twitter"></i> Tweet</a>
		<a class="col-xs-6 facebookButton font1 pull-right" href="https://www.facebook.com/galoremag" target="_blank"><i class="fa fa-facebook"></i> Share</a>
	</div>

	<div class="footbut">
		<a id="footer-open" class="brand-white-sm" href="#"></a>
	</div>
	<footer id="footer">
		<div class="footer-content container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<p class="text-center">GALORE is a media brand for the modern bombshell, speaking to the edgy, sexy and creative woman in her 20's surrounding Style, Beauty, Pop, Sex + Dating and Fitness.</p>
				</div>
			</div>
			
			<hr />

			<div class="row">
				<div class="col-xs-6">
					<h1>Links</h1>
					<div>
						<?php wp_nav_menu( array('theme_location' => 'footer-menu')); ?>
					</div>
				</div>

				<div class="col-xs-6">
					<h1>Feeds</h1>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>/feed" title="Everything">Everything &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/style/feed" title="Style">Style &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/beauty/feed" title="Beauty">Beauty &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/sex-dating/feed" title="Sex + Dating">Sex + Dating &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/fitness/feed" title="Fitness">Fitness &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/pop/feed" title="Pop">Pop &nbsp;<i class="fa fa-rss"></i></a></li>
					</ul>
				</div>

			</div>
		</div>
		
		<a class="cat-icon" href="http://kittenagency.com"></a>
	</footer>

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
	                    Get updates right in your inbox.
	                </p>
	                <!-- <h2 class="text-center">Get On The List</h2> -->
	                <form action="https://galoremag.createsend.com/t/i/s/tjcj/" method="post">
	                    <div class="form-group">
	                        <input class="form-control" id="fieldName" name="cm-name" type="text" placeholder="Your Name" required />
	                    </div>
	                    <div class="form-group">
	                        <input class="form-control" id="fieldEmail" name="cm-tjcj-tjcj" type="email" placeholder="Your Email" required />
	                    </div>
	                    <div class="form-group">
	                        <button class="btn btn-bp" type="submit">Subscribe</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <div class="back"></div>
	</div>