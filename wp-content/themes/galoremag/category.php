<?php get_header(); ?>
</div>
<?php $category = get_the_category();
      $category_slug = $category[0]->slug;
      $is_mag_page = $category_slug == "mag" && !(is_front_page() && is_home());
?>
<?php if($is_mag_page): ?>
<div class="row">
  <div class="carousel-alt">
    <?php echo do_shortcode('[image-carousel-alt mag]'); ?>
  </div>
</div><!--/row-->
<?php endif; ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$ppp = get_option('posts_per_page');
$skipIDs = '';
if ($is_mag_page) {
  $query2 = new WP_Query(array(
    'category_name' => 'mag',
    'showposts' => '3',
    'offset' => ($paged - 1) * $ppp
  ));
  if ( $query2->have_posts() ) {
    while ($query2->have_posts()) {
      $query2->the_post();
      $skipIDs[]=$post->ID;
    }
  }
}
?>
<div class="container">
  <?php if ( have_posts() ): ?>
    <?php if ( !$is_mag_page ): ?>
      <h2><?php single_cat_title( $prefix = '', $display = true ); ?></h2>
      <?php endif; ?>
<div class="row">
  <div class="span8">
    <div class="main">
        <ul class="posts">
<?php while ( have_posts() ) : the_post(); if ( in_array($post->ID, $skipIDs) ) { continue; } ?>
  <li>
    <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>">
      <?php the_post_thumbnail('bt-post-standard'); ?>
      <span><?php the_title(); ?></span>
    </a>
  </li>
<?php endwhile; ?>
</ul>

<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

      <div class="pagination">
        <!-- <a href="" class="btn prev disabled"><i class="ss-icon">&#x25C5;</i> Prev</a>
        <a href="" class="btn next">Next <i class="ss-icon">&#x25BB;</i></a> -->
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
          <div class="prev"><?php next_posts_link( __( '<i class="ss-icon">&#x25C5;</i> Prev', 'twentyten' ) ); ?></div>
          <div class="next"><?php previous_posts_link( __( 'Next <i class="ss-icon">&#x25BB;</i>', 'twentyten' ) ); ?></div>
        <?php endif; ?>
      </div><!--/pagination-->

    </div><!--/main-->
  </div><!--/span8-->

  <?php get_sidebar(); ?>

</div><!--/row-->

<?php get_footer(); ?>
