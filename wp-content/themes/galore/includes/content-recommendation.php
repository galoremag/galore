<?php if ( $query->have_posts() ) : ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
<li data-post_id="<?php the_ID(); ?>">
<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>">
<?php the_post_thumbnail('bt-post-standard'); ?>
    <span><?php the_title(); ?></span>
</a>
</li>
<?php endwhile; ?>
<?php endif; ?>
