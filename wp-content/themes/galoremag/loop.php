<?php if ( ! have_posts() ) : ?>
  <div class="row">
    <div class="span12">
      <h2>Not Found</h2>
      <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
    </div><!--/span12-->
  </div><!--/row-->
<?php endif; ?>


<?php if(is_front_page() && !is_paged()) : ?>

  <div class="row">
    <div class="span12">
      <div class="feature">

        <div class="carousel-top">
          <?php echo do_shortcode('[image-carousel]'); ?>
        </div>

      </div><!--/feature-->
   </div><!--/span12-->
  </div><!--/row-->

<?php endif; ?>

  <div class="row">
    <div class="span8">

      <ul class="posts">
        <?php
          $catName = get_cat_ID('Collections');
          $args=array(
            'category__not_in' => $catName,
            'post__not_in'  => get_option( 'sticky_posts' ),
            'ignore_sticky_posts' => 0,
            'paged' => get_query_var('paged')
          );
          query_posts($args);
        ?>
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

<?php wp_reset_query(); ?>