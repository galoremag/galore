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
		<?php
			global $wp_query;
			$cat_ID = get_the_category($post->ID);
			$cat_ID = $cat_ID[0]->cat_ID;
			$this_post_ID = $post->ID;
			$this_post_slug = $post->post_name;
			$this_post_title = $post->post_title;

		?>
		<div id="content" class="alm-reveal alm-previous-post col-md-8 col-sm-12 col-md-offset-2 post-<?php echo $this_post_ID ?>	" data-title="<?php echo $this_post_title ?>" data-url="<?php echo $this_post_slug ?>" data-id="<?php echo this_post_ID ?>">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article>
				<?php setPostViews(get_the_ID()); ?>
				<div class="single-featured-image">
					<?php the_post_thumbnail('large'); ?>
					<div class="catlinks"><?php the_category(); ?></div>
				</div>
				<h1><?php the_title(); ?></h1>
				<div id="social-links">
					<ul id="post-social" class="post-social hidden-xs hidden-sm">
						<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>

				<p class="byline"><i class="fa fa-bomb"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
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
				<!-- <ul class="single-social">
					<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul> -->
			</article>
			<?php endwhile; ?>
			<!-- <hr> -->

			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-interstitial' ) ); ?>

			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-oop' ) ); ?>

			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-one-300x250' ) ); ?>

			<h2 class="text-center">Gimme More <i class="fa fa-diamond"></i> <span>Beauty</span></h2>
			<div class="spacer20"></div>
			<ul id="related-posts" class="row-fluid">

				<!-- Special Post -->

				<hr />

				<ul class="container-fluid">

					<?php

					$args = array( 'category_name' => 'beauty', 'post_type' => 'post', 'showposts' => 2, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => array($this_post_ID) );

					$postslist = get_posts( $args );

					// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
					foreach ($postslist as $post) : setup_postdata($post);
					?>

					<li class="related post pull-left col-sm-6">
						<div class="row-fluid">
							<div class="nopad col-sm-12">
								<div class="catlinks"><?php the_category(); ?></div>
								<div class="thumb">
									<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="nopad col-sm-12">
								<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
								<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
								<p class="pull-left hidden-xs"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>
							</div>
						</div>
					</li>
					<?php endforeach; ?>

				</ul>

				<hr />

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sponsored-md' ) ); ?>

				<hr />

			    <?php
			    	// if($post_ids){
					// 	//Implode the posts and set a variable to pass to our exclude param.
					// 	$postsNotIn = implode(",", $post_ids);
					// }

					echo do_shortcode('[ajax_load_more previous_post="true" orderby="date" category="beauty" button_label="Loading" repeater="template_2" post_type="post"]');
			    ?>
			</ul>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
