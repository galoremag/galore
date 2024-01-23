<?php get_header(); ?>

<div class="row">
  <?php echo do_shortcode('[new_royalslider id="1"]'); ?>
</div><!--/row-->

<div class="limited">
  <div class="row">
    <?php
    $query = new WP_Query( array(
      'category__not_in' => array(2335, 5, 3156, 8),
      'post__not_in'  => get_option( 'sticky_posts' ),
      'ignore_sticky_posts' => 0,
      'showposts' => '3'
    ) ); ?>

    <?php if ( $query->have_posts() ) : ?>

      <div class="span12">
        <h2 class="section__title">The Latest</h2>
      </div>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="span4">
          <?php get_template_part_with_hammy( 'includes/homepage-entries' ); ?>
        </div>

      <?php endwhile; ?>

    <?php wp_reset_postdata(); endif; ?>
  </div>

  <div class="row">
    <div class="span12">
      <h2 class="section__title">Beauty + Style</h2>
    </div>
  </div>

  <div class="row">
    <?php
    // Beauty + Style
    $query = new WP_Query( array(
      'category_name' => 'beauty-style',
      'showposts' => '3',
      'post__not_in' => $picked_articles,
      'offset' => 3
    ) ); ?>

    <?php if ( $query->have_posts() ) : ?>

      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="span4">
          <?php get_template_part_with_hammy( 'includes/homepage-entries' ); ?>
        </div>

      <?php endwhile; ?>

    <?php wp_reset_postdata(); endif; ?>
  </div>

  <div class="row">
    <div class="span12">
      <h2 class="section__title">Models + Photography</h2>
    </div>
  </div>
</div>
  <div class="row">
    <?php echo do_shortcode('[new_royalslider id="2"]'); ?>
  </div><!--/row-->
<div class="limited">
  <div class="row">

    <?php
    // Models Column
    $query = new WP_Query( array(
      'category_name' => 'models',
      'showposts' => '3',
      'post__not_in' => $picked_articles,
      'offset' => 3
    ) ); ?>

    <?php if ( $query->have_posts() ) : ?>
      <div class="span4">
        <h2 class="section__title"><a href="/category/models">More Models</a></h2>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php get_template_part_with_hammy( 'includes/homepage-entries' ); ?>
        <?php endwhile; ?>
      </div>
    <?php wp_reset_postdata(); endif; ?>


    <?php
    // Advice Column
    $query = new WP_Query( array(
      'category_name' => 'sex-advice',
      'showposts' => '3',
      'post__not_in' => $picked_articles
    ) ); ?>

    <?php if ( $query->have_posts() ) : ?>
      <div class="span4">
        <h2 class="section__title"><a href="/category/sex-advice">Sex + Advice</a></h2>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php get_template_part_with_hammy( 'includes/homepage-entries' ); ?>
        <?php endwhile; ?>
      </div>
    <?php wp_reset_postdata(); endif; ?>

    <?php
    // Galore TV Column
    $query = new WP_Query( array(
      'category_name' => 'tv',
      'showposts' => '3',
      'post__not_in' => $picked_articles
    ) ); ?>

    <?php if ( $query->have_posts() ) : ?>
      <div class="span4">
        <h2 class="section__title"><a href="/category/tv">Watch Galore TV</a></h2>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php get_template_part_with_hammy( 'includes/homepage-entries' ); ?>
        <?php endwhile; ?>
      </div>
    <?php wp_reset_postdata(); endif; ?>
  </div>
</div>
<div class="limited">
  <div class="row">
    <div class="span12">
      <h2 class="section__title">From the Magazine</h2>
    </div>
  </div>
</div>
<div class="row">
  <?php echo do_shortcode('[new_royalslider id="3"]'); ?>
</div><!--/row-->
<?php get_footer(); ?>
