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
			$categories = get_the_category();
			if ( count( $categories ) > 0 ) {
				$displayed_category = $categories[0];
				$displayed_category_name = $displayed_category->cat_name;
				$displayed_category_link = get_category_link( $displayed_category->term_id );
			}

		?>
		<div id="content" class="col-md-8 col-sm-12 col-md-offset-2">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<meta itemprop="articleBody" content="">
				<?php setPostViews(get_the_ID()); ?>
				<h1><?php the_title(); ?></h1>
				<div class="single-featured-image">
					<?php if( $displayed_category ) : ?>
   <div class="catlinks updated_catlinks"><ul class="post-categories">
	   <li><a class="updated_catlinks_anchor_tag" href="<?php echo $displayed_category_link ?>" rel="category tag"><?php echo $displayed_category_name ?></a></li></ul></div>
					<?php endif; ?>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large', array('class' => 'postFeaturedImg')); } ?>
				</div>
				<div id="social-links">
					<ul id="post-social" class="post-social hidden-xs hidden-sm">
						<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>

				<p class="byline"><i class="fa fa-heartbeat"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
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
					<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul> -->
			</article>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<!-- <hr> -->

			<h2 class="text-center">Gimme More <i class="fa fa-heartbeat"></i> <span>Health</span></h2>
			<div class="spacer20"></div>
			<ul id="related-posts" class="row-fluid">

				<!-- Special Post -->

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sponsored-md' ) ); ?>

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-interstitial' ) ); ?>

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-oop' ) ); ?>

				<ul class="container-fluid">

					<?php

					$args = array( 'category_name' => 'health', 'post_type' => 'post', 'showposts' => 2, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => array($this_post_ID) );

					$postslist = get_posts( $args );

					// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
					foreach ($postslist as $post) : setup_postdata($post);
					$categories = get_the_category($post->ID);
					if ( count( $categories ) > 0 ) {
						$displayed_category = $categories[0]->cat_ID;
						$displayed_category_name = $categories[0]->cat_name;
						$displayed_category_link = get_category_link( $categories[0]->term_id );
						$cat_random_rotation_value = rand(-3, 3);
					}
					?>

					<li class="related post pull-left col-xs-6">
						<div class="container nopad">
							<div class="row-fluid">
								<div class="nopad col-sm-12">
									<?php if( $categories ) : ?>
   				<div class="catlinks catlinks_post_feed" style="transform: rotate(<?php echo $cat_random_rotation_value ?>deg); position: relative; z-index: 2; transform-origin: 0px 0px;">
	  			 <ul class="post-categories">
	   				<li><a class="updated_catlinks_anchor_tag" href="<?php echo $displayed_category_link ?>" rel="category tag"><?php echo 						$displayed_category_name ?></a></li></ul></div>
								<?php endif; ?>
									<div class="thumb">
										<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="nopad col-sm-12">
									<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
									<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
									<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
									<p class="pull-left hidden-xs"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>
								</div>
							</div>
						</div>
					</li>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

				</ul>

				<hr />

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-one-300x250' ) ); ?>

				<hr />

				<ul class="alm-listing alm-ajax">

					<?php
					global $wp_query;
					$cat_ID = get_the_category($post->ID);
					$cat_ID = $cat_ID[0]->cat_ID;
					$this_post = $post->ID;
					$args = array( 'category_name' => 'health', 'post_type' => 'post', 'offset' => 2, 'showposts' => 4, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => array($this_post) );
					$postslist = get_posts( $args );
					// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
					foreach ($postslist as $post) : setup_postdata($post);
					$categories = get_the_category($post->ID);
					if ( count( $categories ) > 0 ) {
						$displayed_category = $categories[0]->cat_ID;
						$displayed_category_name = $categories[0]->cat_name;
						$displayed_category_link = get_category_link( $categories[0]->term_id );
						$cat_random_rotation_value = rand(-3, 3);
					}
					?>
					<li class="post">
						<article class="row-fluid">
							<div class="nopad col-sm-5">
								<?php if( $categories ) : ?>
   				<div class="catlinks catlinks_post_feed" style="transform: rotate(<?php echo $cat_random_rotation_value ?>deg); position: relative; z-index: 2; transform-origin: 0px 0px;">
	  			 <ul class="post-categories">
	   				<li><a class="updated_catlinks_anchor_tag" href="<?php echo $displayed_category_link ?>" rel="category tag"><?php echo 						$displayed_category_name ?></a></li></ul></div>
								<?php endif; ?>
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

					<?php wp_reset_postdata(); ?>

				</ul>

				<hr />

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-two-300x250' ) ); ?>

				<hr />

			    <?php
			    	// if($post_ids){
					// 	//Implode the posts and set a variable to pass to our exclude param.
					// 	$postsNotIn = implode(",", $post_ids);
					// }
					echo do_shortcode('[ajax_load_more orderby="date" offset="6" category="health" exclude="'.$wp_query->post->ID.'" button_label="Loading" cache="true" cache_id="3988084773"]');
			    ?>
			</ul>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
