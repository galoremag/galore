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
		<div id="single-content" class="col-lg-8 col-lg-offset-1">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="article-wrap">
					<article id="post-<?php the_ID(); ?>" class="post">
						<div id="social-links">
							<ul id="post-social" class="post-social">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
						<h2><?php the_title(); ?></h2>
						<p><i class="fa fa-scissors"></i> By <?php the_author_posts_link(); ?></p>
						<p class="byline"><i class="fa fa-bomb"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>">Posted on <?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
						<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
						<div class="spacer20"></div>
						<?php the_content(); ?>
						<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						<h3>About <?php echo get_the_author() ; ?></h3>
						<?php the_author_meta( 'description' ); ?>
						<?php endif; ?>
						<!-- <ul class="hidden-sm single-social">
							<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
							<li><h4 class="social-title"><?php the_title(); ?></h4></li>
							<ul id="post-social" class="pull-right post-social">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</ul> -->
						<?php comments_template( '', true ); ?>
						<p id="slug-<?php the_ID(); ?>" class="hidden slug"><?php the_permalink(); ?></p>
					</article>
				</div>
			<?php endwhile; ?>
			<div class="spacer20"></div>
			<hr>
		</div>
		<div id="related" class="col-sm-2 well hidden-md">
			<h2>Trending</h2>
			<?php
			//for use in the loop, list 5 post titles related to first tag on current post
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
			$first_tag = $tags[0]->term_id;
			$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5
			);
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('large'); ?>
			<?php the_title(); ?>
			</a>
			<?php endwhile; } wp_reset_query(); } ?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>