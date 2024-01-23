<?php
/*
Template Name: Collections
*/
?>

<?php get_header(); ?>


<?php query_posts('category_name=collections');?>

  <?php if (have_posts()) : ?>
   <div class="row">

    <div class="span3 sidemenu">
      <h4>Shop</h4>
      <?php shopp('storefront','category-list','hierarchy=on&#038;products=on'); ?>

      <h4>Lookbooks</h4>
      <ul class="shopp-categories-menu">
      <?php $my_query = new WP_Query('category_name=collections&showposts=10'); ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    </div><!--/span3-->

    <div class="span9">
  <ul class="posts-collections">
    <?php while (have_posts()) : the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>">
        <?php the_post_thumbnail('bt-post-standard'); ?>
      </a>
    </li>
    <?php endwhile; ?>
  </ul>
  </div><!--/span9-->

  </div><!--/row-->

  <?php else : ?>

  <div class="row">
    <div class="span12">
      <h2>Not Found</h2>
      <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
    </div><!--/span12-->
  </div><!--/row-->

<?php endif; ?>


<?php get_footer(); ?>
