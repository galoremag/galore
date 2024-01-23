<?php get_header(); ?>

<div class="row">
  <div class="span8">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
  <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
  <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

<?php endwhile; ?>
  </div><!--/span8-->

  <?php get_sidebar(); ?>

</div><!--/row-->

<?php get_footer(); ?>
