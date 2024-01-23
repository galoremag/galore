<!--recommendation-->
<ul class="posts recs">
  <?php
  $category = get_the_category();
  $category_slug = $category[0]->slug;
  $ignored_posts = array(30044, 30042, 8189, 6956, 7168, 6872, 6848, 6616, 6581, 6506, 6481, 6323, 6301, 6294, 5881, 5757, 5579, 5548, 5517, 5443, 5484, 5408, 5215, 5167, 5155, 5146, 5089, 5080, 5035, 4973, 4694, 4523, 4642, 4496, 4489, 4301, 4277, 4155, 3860, 3721, 3704, 3628, 3580, 3575, 3482, 3535, 3419, 3351, 3047, 2969, 2790, 2678, 2276, 2255, 2153); /* these posts don't have cover images */
  $sticky_posts = get_option( 'sticky_posts' );
  $ignored_posts = array_merge($ignored_posts, $sticky_posts);
  $query = new WP_Query( array(
    'category_name' => $category_slug,
    'showposts' => '1',
    'orderby' => 'rand',
    'post__not_in' => $ignored_posts
  )); ?>
  <?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li data-post_id="<?php the_ID(); ?>">
        <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('bt-post-standard'); ?>
          <span><?php the_title(); ?></span>
        </a>
      </li>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); endif; ?>
</ul>
<!--/recommendation-->
