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

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-8 col-sm-12">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article>
				<div id="social-links">
					<ul id="post-social" class="post-social hidden-xs hidden-sm">
						<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				<div class="single-featured-image">
					<?php the_post_thumbnail('large'); ?>
				</div>
				<h2><?php the_title(); ?></h2>

				<p class="byline"><i class="fa fa-star"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
				<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
				<div class="spacer20"></div>

				<?php the_content(); ?>			

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				<h3>About <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>
				<ul class="single-social">
					<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<!-- <li class="pad10 ">
						<div class="fb-like hidden-xs hidden-sm" data-href="http://galoremag.com" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</li> -->
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul>
				<?php comments_template( '', true ); ?>

			</article>
			<?php endwhile; ?>

			<hr>
			<h2 class="text-center">Gimme <span>More</span> Pop <span><i class="fa fa-flash"></i></span></h2>
			<div class="spacer20"></div>
			<ul id="related-posts" class="row-fluid">
				<?php $post_ids = array(); $loop = new WP_Query( array( 'posts_per_page' => 4, 'orderby' => 'date' ) ); ?>

			    <?php
					// if($post_ids){
					// 	//Implode the posts and set a variable to pass to our exclude param.
					// 	$postsNotIn = implode(",", $post_ids);
					// }
					echo do_shortcode('[ajax_load_more orderby="date" category="pop" exclude="'.$wp_query->post->ID.'" button_label="More Shit"]');
			    ?>
			</ul>
		</div>
		<div id="sidebar-anchor"></div>
		<div id="sidebar" class="sidebar col-md-4 pad40 hidden-sm">
			<h2>Related</h2>
			<?php query_posts('category_name=pop&posts_per_page=4&offset=4'); ?>
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