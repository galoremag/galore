<?php
/**
 * This file loads the content partially.
 */
define( 'PARTIAL', time() );
// Check that there are more posts to load.
while ( have_posts() ) : the_post();
	// Include the content
	?>
  <article>
    <?php setPostViews(get_the_ID()); ?>
    <div class="single-featured-image">
      <div class="catlinks"><?php the_category(); ?></div>
      <?php the_post_thumbnail('large'); ?>
    </div>
    <h1 class="entry-title"><?php the_title(); ?></h1>
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

  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfifteen' ); ?></h1>

    <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
  </nav><!-- .post-navigation -->

  <!­­ cmnUNT | Begin ad tag ­­>
  <div id="cmn_ad_tag_content" class="container-fluid nopad">
    <script type="text/javascript">cmnUNT('100x100', tile_num++);</script>
  </div>
  <!­­ cmnUNT | End ad tag ­­>

	<?php
// End the loop.
endwhile;
?>
