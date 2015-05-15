<?php
/**
 * This file loads the content partially.
 */
define( 'PARTIAL', time() );

while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="post">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="hidden post_id"><?php the_ID(); ?></div>

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
		<button class="comments_trigger">Comments</button>
		<div class="comments_container" id="comments_container_<?php the_ID(); ?>">
			<div id="disqus_thread"></div>
		</div>

		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

		<div class="spacer20"></div>

		<!-- Related Posts -->

		<ul class="related-single row-fluid">
			<?php
			//for use in the loop, list 3 post titles related to first tag on current post
			$post = get_the_ID();
			$tags = wp_get_post_tags($post);
			if ($tags) {
			$first_tag = $tags[0]->term_id;
			$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post),
			'posts_per_page'=>3
			);
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<li class="pull-left col-sm-4">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<div class="thumbnail-md"><?php the_post_thumbnail('medium'); ?></div>
					<h3><?php the_title(); ?></h3>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y'); ?></time>
				</a>
			</li>
			<?php endwhile; } wp_reset_query(); } ?>
		</ul>

	</article>
<?php endwhile; ?>

<!-- <hr> -->
<nav class="navigation post-navigation" role="navigation">
	<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
	<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
</nav>