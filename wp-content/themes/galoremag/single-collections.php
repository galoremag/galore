<?php get_header(); ?>

 <div class="row gallery">
   <article>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="span12">
      <div class="feature">
          <?php the_post_thumbnail('bt-post-image'); ?>
        </div><!--/feature-->
        <?php the_content(); ?>
        <?php get_template_part('social'); ?>
        </div><!--/span12-->

    </article>
  </div><!--/row-->

  <?php endwhile; // end of the loop. ?>

  <?php get_template_part('social-floating'); ?>

<?php get_footer(); ?>
