<?php get_header(); ?>

<?php if ( have_posts() ): ?>
<h2>Tag Archive: <?php echo single_tag_title( '', false ); ?></h2>

<?php get_template_part( 'loop', 'tag' ); ?>

<?php else: ?>
  <h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
<?php endif; ?>

<?php get_footer(); ?>
