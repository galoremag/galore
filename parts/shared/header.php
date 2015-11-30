<header>
	<div class="container-fluid">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<div id="modal-nav-button" class="nav-button pull-left">
						<div id="nav-button"><a href="#" class="hmbrgr" onClick="menuToggle()"></a></div>
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
			<li><a href="<?php bloginfo('url'); ?>/category/health" title="health">Health</a></li>
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

<!-- Start Superhero -->

<?php
$args = array( 'tag' => 'superhero', 'post_type' => array('sponsor', 'post'), 'showposts' => 1, 'orderby' => 'date', 'order' => 'DESC' );

$postslist = get_posts( $args );

// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
foreach ($postslist as $post) : setup_postdata($post);
?>

<?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
$url = $thumb[0];
?>

<div id="superSpecial">
	<a id="superhero" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background: url(<?php echo $url ?>) no-repeat;"></a>
	<div class="specialFlag">Presented by <?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
	<h1 class="pad20"><?php the_title(); ?></h1>
	<p class="specialTip">Scroll to site</p>
	<img class="specialPixel" height='1' width='1' src='https://tracking.jetpackdigital.com/jpt?sid=1242&oid=5697&lid=27946&csid=&c=0&itt=EOTgSDNteBPGBZseExTPjt3KGpZXpe1WEEYEwE1Y%2FTII51KPC7NhewUsrcjb%2FwYB&ord=[RANDOM]'/>
	<a href='https://tracking.jetpackdigital.com/jpc?sid=1242&oid=5697&lid=27946&csid=&c=0&ict=fc%2BEefcyYl059wfYiWxiFP1FJQs4mZgA&ord=[RANDOM]'/></a>
	
	<a id="scroll-down"><i class="fa fa-arrow-circle-o-down"></i></a>
</div>

<?php endforeach; ?>

<?php wp_reset_postdata(); ?>

<!-- End Superhero -->

<div id="global-container" <?php body_class(); ?>>
	<div id="global-inner" <?php body_class(); ?>>