<?php
/**
* The Template for displaying all single posts
*
* Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
*
	* @package 	WordPress
	* @subpackage 	Starkers
		* @since 		Starkers 4.0
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid nopad">
	<div class="row-fluid">
		<div id="content" class="col-md-8 col-sm-12 container-fixed">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article>
				<?php setPostViews(get_the_ID()); ?>
				<div class="single-featured-image">
					<div class="catlinks"><?php the_category(); ?></div>
					<?php the_post_thumbnail('large'); ?>
				</div>
				<h1><?php the_title(); ?></h1>
				<div id="social-links">
					<ul id="post-social" class="post-social hidden-xs hidden-sm">
						<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				
				<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
				<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
				<div class="spacer20"></div>
				<?php the_content(); ?>
				<div class="spacer20"></div>
				<div class="author-info row hidden-xs">
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-bio col-md-8 col-md-offset-2 text-right">
						<h3>About The Author: <span><?php echo get_the_author() ; ?></span></h3>
						<?php the_author_meta( 'description' ); ?>
					</div>
					<div class="author-pic col-md-2">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="spacer20"></div>
				<ul class="single-social">
					<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<!-- <li class="pad10 ">
						<div class="fb-like hidden-xs hidden-sm" data-href="http://galoremag.com" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</li> -->
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul>
			</article>
			<?php endwhile; ?>
			<hr>
			<h2 class="text-center">Gimme <span>More</span></h2>
			<div class="spacer20"></div>
			<ul id="related-posts" class="row-fluid">

				<!-- Special Post -->

				<?php
					$adlist = get_posts('numberposts=1&order=DESC&orderby=date&offset=0&post_type=sponsor');
					foreach ($adlist as $post) :
					setup_postdata($post);
				?>

				<li class="post specialMd">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="specialFlagMd">Presenting </i><?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
							<div class="thumb">
								<a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="<?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4 class="hidden-xs">Share this post</h4>
							<ul class="post-social pull-left hidden-xs">
								<li><a class="share-email" href="/cdn-cgi/l/email-protection#2365514a464d4763504c4e46544b4651460d404c4e1c505641494640571e1f1c534b5303574b467c574a574f460b0a18031c1d05424e5318414c475a1e1f1c534b53X the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								<li class="visible-xs"><h4>Share This Post</h4></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="Permalink to <?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

							<div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

							<p class="pull-left hidden-xs"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" target="_blank" >Full Story <i class="fa fa-mars"></i></a></p>

							<img class="specialPixel" height='1' width='1' src='https://tracking.jetpackdigital.com/jpt?sid=1242&oid=5697&lid=28251&csid=&c=0&itt=EOTgSDNteBPGBZseExTPjt3KGpZXpe1WEEYEwE1Y%2FTII51KPC7NhewUsrcjb%2FwYB&ord=[RANDOM]'/>
							<a href='https://tracking.jetpackdigital.com/jpc?sid=1242&oid=5697&lid=28251&csid=&c=0&ict=J4USQfJyvBlMu2SRh3iQGGbxFnwXyP0RFM%2BYPCbvTs%2F5ejjlVlrQ7BuFo%2B2HhxazyywI0bIkDPiwooLpuEJwqSs35ce8191aKY9dlUH0AMug7cTRufjy%2FQ%3D%3D&ord=[RANDOM]'/></a>

						</div>
					</article>
				</li>

				<?php endforeach; ?>

			    <?php wp_reset_postdata(); ?>

				<?php $post_ids = array(); $loop = new WP_Query( array( 'posts_per_page' => 4, 'orderby' => 'date' ) ); ?>

				<!­­ cmnUNT | Begin ad tag ­­>
				<div id="cmn_ad_tag_content" class="snippet">
					<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
				</div>
				<!­­ cmnUNT | End ad tag ­­>

				<?php
				$args = array( 'post_type' => 'post', 'showposts' => 4, 'orderby' => 'date', 'order' => 'DESC' );

				$postslist = get_posts( $args );

				// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
				foreach ($postslist as $post) : setup_postdata($post);
				?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumb">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4 class="hidden-xs">Share this post</h4>
							<ul class="post-social pull-left hidden-xs">
								<li><a class="share-email" href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								<li class="visible-xs"><h4>Share This Post</h4></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<ul class="post-social visible-xs">
								<li><a class="share-email" href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>

							<div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

							<p class="pull-left hidden-xs"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>

						</div>
					</article>
				</li>
				<?php endforeach; ?>

				<!­­ cmnUNT | Begin ad tag ­­>
				<div id="cmn_ad_tag_content" class="text-center">
					<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
				</div>
				<!­­ cmnUNT | End ad tag ­­>

			    <?php
					// if($post_ids){
					// 	//Implode the posts and set a variable to pass to our exclude param.
					// 	$postsNotIn = implode(",", $post_ids);
					// }
					echo do_shortcode('[ajax_load_more orderby="date" offset="4" exclude="'.$wp_query->post->ID.'" button_label="Loading"]');
			    ?>
			</ul>
		</div>
		<div id="sidebar-anchor"></div>
		<div id="sidebar" class="sidebar col-md-4 hidden-xs hidden-sm">
			<h2>Trending</h2>
			<?php
			    $args = array(
			                'post_type'    => 'post',
			                'numberposts'  => 4,
			                'orderby'      => 'meta_value', 
			                'meta_key'     => 'post_views_count',
			                'order'        => 'DESC',
			                'post_status'  => 'publish',
			                'date_query' => array(
						        array(
						        	'column' => 'post_date_gmt',
						            'after' => '2 month ago'
						        )
						    )
			            ); 
			    $ranking = 0;
			?>
			<?php query_posts($args); ?>
			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article>
						<div class="thumbnail">
							<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
						</div>
						<h4 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
					</article>
				</li>
			<?php endwhile; ?>

			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>