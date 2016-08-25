<?php
/**
 * This file loads the content partially.
 */
define( 'PARTIAL', time() );
// Check that there are more posts to load.
while ( have_posts() ) : the_post();
	// Include the content
	get_template_part( 'content', get_post_format() );
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfifteen' ); ?></h1>

		<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
	</nav><!-- .post-navigation -->
	<?php
// End the loop.
endwhile;
?>
