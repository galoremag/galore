		</div>
	</div>

	<!-- <div id="likeBar" class="">
		<h1 class="pull-left">Get Exclusives</h1>
		<div class="pad10 fb-like pull-left" data-href="https://www.facebook.com/galore" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
		<div>
			<a id="likeBar-close" href="javascript:;"><i class="fa fa-lg fa-close"></i></a>
		</div>
	</div> -->

	<!-- Newsletter Signup -->
	<div id="fb-modal">
	    <div class="fb-modal-dialog col-md-4 col-md-offset-4">
	        <div class="fb-modal-content">
	            <div class="fb-modal-header">
	                <a id="fbClose" class="close" data-dismiss="fb-modal" aria-label="Close"><span aria-hidden="true" class="btr bt-times"></span></a>
	            </div>
	            <div class="fb-modal-body">
	                <div class="brand-white" style="margin: 0 auto -100px auto;"></div>
	                <h1 class="horPad20 text-center">Do You Like?</h1>
	                <p class="text-center">
	                    Some things are only found on Facebook. Don't miss out.
	                </p>
	                <div class="pad10 fb-like" data-href="https://www.facebook.com/galore" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
	            </div>
	        </div>
	    </div>
	    <div class="back"></div>
	</div>

	<!-- Snapchat Follow -->
	<div id="snapchat-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="email-signup" aria-hidden="true">
			<div class="snapchat-modal-dialog col-md-4 col-md-offset-4">
					<div class="snapchat-modal-content">
							<div class="snapchat-modal-header">
									<a id="snapchatClose" class="close" data-dismiss="snapchat-modal" aria-label="Close"><span aria-hidden="true" class="btr bt-times"></span></a>
							</div>
							<div class="snapchat-modal-body">
									<!-- <div class="brand-white" style="margin: 0 auto -100px auto;"></div> -->
									<div class="pad10 snapchat-like">
										<a href="//snapchat.com/add/galoremag"><img src="<?php echo content_url(); ?>/themes/galore/images/galore_snapcode.svg" title="Galore Snapchat - Snapcode" alt="Galore Snapchat - Snapcode" /></a>
									</div>
									<h1 class="horPad20 text-center">Watched by over 100k daily</h1>
									<p class="text-center">
										The craziest channel on Snapchat for beauty, fashion and pop. Screenshot the ^^^ or click the code to add now to join the fun.
									</p>
							</div>
					</div>
			</div>
			<div class="back"></div>
	</div>

	<!-- Newsletter Signup -->
	<!-- <div id="email-signup" class="modal" tabindex="-1" role="dialog" aria-labelledby="email-signup" aria-hidden="true">
	    <div class="email-signup-dialog col-md-4 col-md-offset-4">
	        <div class="email-signup-content">
	            <div class="email-signup-header">
	                <a href="javascript:;" id="newsletterClose" class="close" data-dismiss="email-signup" aria-label="Close"><span aria-hidden="true" class="btr bt-times"></span></a>
	            </div>
	            <div class="email-signup-body">
	                <div class="brand-white" style="margin: 0 auto -100px auto;"></div>
	                <h1>For fashion and beauty news, celeb tea, the down and dirty on sex and dating <br/>— <span>AND MORE</span> —<br/> sign up below and join the Girl Cult.</h1>
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

	<!-- FOOTER STUFF -->

	<div class="footbut">
		<a id="footer-open" class="brand-white-sm" href="#"></a>
	</div>

	<footer id="footer">
		<div class="footer-content container-fluid">
			<a id="footer-close" href="#"><i class="btr bt-times"></i></a>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<p class="text-center">GALORE is a media brand for the modern bombshell, speaking to the edgy, sexy and creative woman in her 20's surrounding Fashion, Beauty, Pop, Sex + Dating and Health.</p>
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
						<li><a href="<?php bloginfo('url'); ?>/category/fashion/feed" title="Style">Style &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/beauty/feed" title="Beauty">Beauty &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/dating/feed" title="Sex + Dating">Dating &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/health/feed" title="Fitness">Fitness &nbsp;<i class="fa fa-rss"></i></a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/pop/feed" title="Pop">Pop &nbsp;<i class="fa fa-rss"></i></a></li>
					</ul>
				</div>

			</div>
		</div>

		<a class="cat-icon" href="http://kittenagency.com"></a>
	</footer>
