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
				<article id="post-<?php the_ID(); ?>" class="post">

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<p><i class="fa fa-scissors"></i> By <?php the_author_posts_link(); ?></p>
					<p class="byline"><i class="fa fa-bomb"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>">Posted on <?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
					<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
					
					<div class="spacer20"></div>
					<?php the_post_thumbnail('large'); ?>
					<div class="spacer20"></div>
					<?php the_content(); ?>
					<div class="spacer20"></div>
					
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					<h3>About <?php echo get_the_author() ; ?></h3>
					<?php the_author_meta( 'description' ); ?>
					<?php endif; ?>
					
					<!-- DISQUS -->
					<button id="comment_trigger">Comments</button>
					<div id="comment_container">
						<div id="disqus_thread"></div>
					</div>

					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

					<!--  RELATED POSTS BELOW CONTENT  -->

					<!-- <ul class="related-single pull-left">
						<?php 
						echo do_shortcode('[ajax_load_more exclude="'. get_the_ID() .' posts_per_page="3" destroy_after="1"]'); 
						?>
					</ul> -->

					<!-- SOCIAL FOOTER  -->
					<ul class="hidden-sm single-social">
						<li><a id="fb-single" href="#" target="popup"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
						<li><h4 class="social-title"><?php the_title(); ?></h4></li>
						<ul id="post-social" class="pull-right post-social">
							<!-- <li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li> -->
							<div class="fb-like" data-href="http://galoremag.com" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
						</ul>
					</ul>

				</article>
			<?php endwhile; ?>
			<div class="spacer20"></div>
			<!-- <hr> -->
			<nav class="navigation post-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfifteen' ); ?></h1>

				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
			</nav>
		</div>
		<div id="related-sidebar" class="col-sm-2 well hidden-md">
			<h2>Trending</h2>
			<?php
			//for use in the loop, list 5 post titles related to first tag on current post
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
			$first_tag = $tags[0]->term_id;
			$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post->ID),
			'posts_per_page'=>4
			);
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<div class="thumbnail-md"><?php the_post_thumbnail('medium'); ?></div>
				<h3 class="nomargbottom"><?php the_title(); ?></h3>
				<p class="byline padbot10"><time datetime="<?php the_time( 'Y-m-d' ); ?>">By <?php the_author_posts_link(); ?></p>
			</a>
			<?php endwhile; } wp_reset_query(); } ?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>