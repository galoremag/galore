<?php
/**
 * This file loads the content partially.
 */
define( 'PARTIAL', time() );
// Check that there are more posts to load.
while ( have_posts() ) : the_post(); ?>
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

		<?php comments_template( '', true ); ?>

	</article>
<?php endwhile; ?>
<div class="spacer20"></div>
<!-- <hr> -->
<nav class="navigation post-navigation" role="navigation">
	<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfifteen' ); ?></h1>

	<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
	<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
</nav>