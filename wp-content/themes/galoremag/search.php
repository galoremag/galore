<?php get_header(); ?>

  <?php if ( have_posts() ) : ?>

  <div class="row">
    <div class="span8">
      <h2 class="title">Search Results for '<?php echo get_search_query(); ?>'</h2>
      <ul class="posts">
        <?php while ( have_posts() ) : the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>">
            <?php the_post_thumbnail('bt-post-standard'); ?>
            <span><?php the_title(); ?></span>
          </a>
        </li>
        <?php endwhile; ?>
      </ul>
      <div class="pagination">
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <div class="prev"><?php next_posts_link( __( '<i class="ss-icon">&#x25C5;</i> Prev', 'twentyten' ) ); ?></div>
        <div class="next"><?php previous_posts_link( __( 'Next <i class="ss-icon">&#x25BB;</i>', 'twentyten' ) ); ?></div>
        <?php endif; ?>
      </div><!--/pagination-->
    </div><!--/span8-->
    <?php get_sidebar(); ?>
  </div><!--/row-->

  <?php else : ?>

  <div class="row">
    <div class="span8">
      <h2>No results found for '<?php echo get_search_query(); ?>'</h2>
    </div><!--/span8-->
    <?php get_sidebar(); ?>
  </div><!--/row-->

  <?php endif; ?>

<?php get_footer(); ?>

