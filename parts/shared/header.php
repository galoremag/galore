<header>
	<div class="container-fluid">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<div id="modal-nav-button" class="nav-button pull-left">
						<a id="nav-button" href="#"><div class="hmbrgr"></div></a>
					</div>
					<div id="site-search" class="pull-left hidden-xs">
						<!-- <?php get_search_form(); ?> -->
						<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
							<label class="form-group">
								<input type="search" class="form-control" placeholder="Search" value="Search" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
							</label>
							<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
						</form>
					</div>
					<!-- <button id="modal-nav-button" type="button" class="nav-button">
					<i class="fa fa-bars"></i>
					</button> -->
					<a id="navbar-brand" class="navbar-brand" href="<?php bloginfo('url'); ?>"></a>
				</div>
				<div>
					<ul class="top-social navbar-right tab hidden-xs">
						<li><a href="<?php bloginfo('url'); ?>/shop" title="Galore Shop">Shop</a></li>
						<?php if(shopp('cart','hasitems')) : ?>
							<li><a href="<?php shopp('cart','url'); ?>" title="Galore Shopping Cart"><span class="badge"><?php shopp('cart','totalitems'); ?></span> <i class="fa fa-shopping-cart"></i></a></li>
						<?php endif ?>
						<li><a id="signupButton" href="#"><i class="fa fa-envelope"></i></a></li>
						<li><a href="https://www.facebook.com/galoremag" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://instagram.com/kittengalore/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://twitter.com/thegaloremag" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<!-- <li><a href="http://princeandjacob.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a></li> -->
						<!-- <li><a href="https://www.youtube.com/channel/UCyzzsgpNlmLBKYcXLM3Ro3g" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
						<!-- <li class=""><a href="http://www.slashergirl.com/collections/shop-galore?ref=galore" target="_blank">SHOP</a></li> -->
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	</div>
</header>

<div class="modal-nav">
	<div class="modal-nav-content">
		<!-- <div class="modal-nav-header">
			<div class="modal-nav-close">
				<i class="fa fa-close"></i>
			</div>
		</div> -->
		<ul class="modal-nav-menu text-center">
			<li><a href="<?php bloginfo('url'); ?>/category/style" title="Style">Style</a></li>
			<li><a href="<?php bloginfo('url'); ?>/category/beauty" title="Beauty">Beauty</a></li>
			<li><a href="<?php bloginfo('url'); ?>/category/sex-dating" title="Sex + Dating">Sex + Dating</a></li>
			<li><a href="<?php bloginfo('url'); ?>/category/fitness" title="Fitness">Fitness</a></li>
			<li><a href="<?php bloginfo('url'); ?>/category/pop" title="Pop">Pop</a></li>
			<div id="site-search" class="visible-xs">
				<!-- <?php get_search_form(); ?> -->
				<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<label class="form-group">
						<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					</label>
					<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
				</form>
			</div>
			<!-- <li><a href="//tv.galoremag.com" target="_blank">TV</a></li> -->
			<!-- <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">Nav header</li>
					<li><a href="#">Separated link</a></li>
					<li><a href="#">One more separated link</a></li>
				</ul>
			</li> -->
		</ul>
	</div>
</div>

<div id="global-container" <?php body_class(); ?>>
	<div id="global-inner" <?php body_class(); ?>>