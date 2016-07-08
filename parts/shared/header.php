<?php if ( wp_is_mobile() ) : ?>
	<!­­ cmnUNT | Begin ad tag ­­>
	<div id="cmn_ad_tag_head" class="fw_galoremag text-center">
	    <script type="text/javascript">
	    	cmnUNT('3x3', tile_num++);
	    </script>
	</div>
	<!­­ cmnUNT | End ad tag ­­>
<?php endif; ?>

<?php if ( wp_is_mobile() ) : ?>
	<!­­ cmnUNT | Begin ad tag ­­>
	<script type="text/javascript">
		cmnUNT('tover', tile_num++);
	</script>
	<!­­ cmnUNT | End ad tag ­­>
<?php endif; ?>

<?php if ( wp_is_mobile() ) : ?>

	<header itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
		<div class="container-fluid nopad">
			<!-- Fixed navbar -->
			<nav class="navbar navbar-default shrink" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<div id="modal-nav-button" class="nav-button pull-left">
							<div id="nav-button"><a href="#" class="hmbrgr" onClick="menuToggle()"></a></div>
						</div>
						<div id="site-search" class="pull-left hidden-xs">
							<!-- <?php get_search_form(); ?> -->
							<form role="search" method="get" action="<?php echo site_url(); ?>">
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
							<li><a href="http://tv.galoremag.com" title="GaloreTV" target="_blank">TV <i class="fa fa-television"></i></a></li>
							<li><a id="signupButton" href="#"><i class="fa fa-envelope"></i></a></li>
							<li><a href="https://www.facebook.com/galore" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://instagram.com/galore/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://twitter.com/thegaloremag" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://kittenagency.com" target="_blank">Kitten <i class="fa fa-paw"></i></a></li>
							<!-- <li><a href="http://princeandjacob.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a></li> -->
							<!-- <li><a href="https://www.youtube.com/channel/UCyzzsgpNlmLBKYcXLM3Ro3g" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
							<!-- <li class=""><a href="http://www.slashergirl.com/collections/shop-galore?ref=galore" target="_blank">SHOP</a></li> -->
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</div>

		<div id="main-menu" class="modal-nav">
			<div class="modal-nav-content">
				<ul class="modal-nav-menu text-center">
					<li><a href="http://tv.galoremag.com" title="GaloreTV" target="_blank"><i class="fa fa-television"></i>GaloreTV <span class="badge">New</span></a></li>
					<li><a href="<?php bloginfo('url'); ?>/category/beauty" title="Beauty">Beauty</a> + <a href="<?php bloginfo('url'); ?>/category/fashion" title="Fashion">Fashion</a></li>
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
				</div>
				<div>
					<ul class="top-social navbar-right tab hidden-xs">
						<li><a href="http://tv.galoremag.com" title="GaloreTV" target="_blank">TV <i class="fa fa-television"></i></a></li>
						<li><a id="signupButton" href="#"><i class="fa fa-envelope"></i></a></li>
						<li><a href="https://www.facebook.com/galore" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://instagram.com/galore/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://twitter.com/thegaloremag" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="http://kittenagency.com" target="_blank">Kitten <i class="fa fa-paw"></i></a></li>
						<!-- <li><a href="http://princeandjacob.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a></li> -->
						<!-- <li><a href="https://www.youtube.com/channel/UCyzzsgpNlmLBKYcXLM3Ro3g" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
						<!-- <li class=""><a href="http://www.slashergirl.com/collections/shop-galore?ref=galore" target="_blank">SHOP</a></li> -->
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</header>

<?php else : ?>

	<header>
		<div class="container-fluid nopad">
			<!-- Fixed navbar -->
			<nav id="deskNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<div id="modal-nav-button" class="nav-button pull-left">
							<div id="nav-button"><a href="#" class="hmbrgr" onClick="menuToggle()"></a></div>
						</div>
						<div id="site-search" class="pull-left hidden-xs">
							<!-- <?php get_search_form(); ?> -->
							<form role="search" method="get" action="<?php echo site_url(); ?>">
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
							<li><a href="http://tv.galoremag.com" title="GaloreTV" target="_blank">TV <i class="fa fa-television"></i></a></li>
							<li><a id="signupButton" href="#"><i class="fa fa-envelope"></i></a></li>
							<li><a href="https://www.facebook.com/galore" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://instagram.com/galore/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://twitter.com/thegaloremag" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://kittenagency.com" target="_blank">Kitten <i class="fa fa-paw"></i></a></li>
							<!-- <li><a href="http://princeandjacob.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a></li> -->
							<!-- <li><a href="https://www.youtube.com/channel/UCyzzsgpNlmLBKYcXLM3Ro3g" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
							<!-- <li class=""><a href="http://www.slashergirl.com/collections/shop-galore?ref=galore" target="_blank">SHOP</a></li> -->
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</div>

		<div id="main-menu" class="modal-nav">
			<div class="modal-nav-content">
				<!-- <div class="modal-nav-header">
					<div class="modal-nav-close">
						<i class="fa fa-close"></i>
					</div>
				</div> -->
				<ul class="modal-nav-menu text-center">
					<li><a href="http://tv.galoremag.com" title="GaloreTV" target="_blank"><i class="fa fa-television"></i>GaloreTV <span class="badge">New</span></a></li>
					<li><a href="<?php bloginfo('url'); ?>/category/beauty" title="Beauty">Beauty</a> + <a href="<?php bloginfo('url'); ?>/category/fashion" title="Fashion">Fashion</a></li>
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
				</ul>
			</div>
		</div>
	</header>

<?php endif; ?>

<!-- Start Superhero -->

<?php if ( wp_is_mobile() ) : ?>

<?php $args = array( 'tag' => 'superhero', 'post_type' => array('sponsor', 'post'), 'showposts' => 1, 'orderby' => 'date', 'order' => 'DESC' );

$postslist = get_posts( $args );

// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
foreach ($postslist as $post) : setup_postdata($post);
?>

<?php
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
$url = $thumb[0];
?>

<div id="superhero" style="background: url(<?php echo $url ?>) no-repeat;">
	<div class="specialFlag"><?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
	<div class="info">
		<h1 class="pad20 nomarg"><?php the_title(); ?></h1>
		<div class="cta">
			<a class="center-block btn btn-primary" href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="<?php the_title_attribute(); ?>">Read More</a>
			<img class="specialPixel" SRC="https://ad.doubleclick.net/ddm/ad/N9556.2353504GALORE/B9575230.132670120;sz=1x1;ord=[timestamp];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement">
			<a href="https://ad.doubleclick.net/ddm/clk/305312944;132670120;o"/></a>
		</div>
		<p class="specialTip">Scroll to site</p>
		<a id="scroll-down"><i class="fa fa-arrow-circle-o-down"></i></a>
	</div>
</div>

<?php endforeach; ?>

<?php wp_reset_postdata(); ?>

<?php endif; ?>

<!-- End Superhero -->

<div itemscope itemtype="http://schema.org/Article" id="global-container" <?php body_class(); ?>>
	<div id="global-inner" <?php body_class(); ?>>
