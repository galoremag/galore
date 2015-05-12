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
		<?php comments_template( '', true ); ?>
		<!-- <div class="comments_container" id="comments_container_<?php the_ID(); ?>"></div>

		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
 -->
		<div class="spacer20"></div>

	</article>
<?php endwhile; ?>

<!-- <hr> -->
<nav class="navigation post-navigation" role="navigation">
	<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
	<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
</nav>