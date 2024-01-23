<?php get_header(); ?>

<?php if ( has_post_format( 'gallery' )) : ?>

<div class="row gallery">
    <article>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="span12">
            <div class="feature">
                <div class="featimg"><?php the_post_thumbnail('bt-post-image'); ?> <span><?php the_title(); ?></span></div>
            </div><!--/feature-->
            <p class="byline"><?php the_author_posts_link(); ?> <span>|</span> <small class="publish-date"><?php the_time(' F jS, Y') ?>  at <?php the_time('g:i a'); ?></small></p>
            <?php the_content(); ?>
            <?php get_template_part('social'); ?>
            <?php get_template_part( 'includes/content-recommendation-inline' ); ?>

        </div><!--/span12-->
    </article>
</div><!--/row-->

<?php endwhile; // end of the loop. ?>



<?php elseif ( has_post_format( 'video' )) : ?>

<div class="row">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="span12 post-video">
        <?php echo get_post_meta($post->ID, "embed-video", true); ?>
    </div><!--/span12-->
</div><!--/row-->

<div class="row">
    <article>
        <div class="post">
            <div class="span8">
                <div class="main">
                    <h2><?php the_title(); ?></h2>
                    <p class="byline"><?php the_author_posts_link(); ?> <span>|</span> <small class="publish-date"><?php the_time(' F jS, Y') ?>  at <?php the_time('g:i a'); ?></small></p>
                    <?php the_content(); ?>
                    <?php get_template_part('social'); ?>
                </div><!--/main-->
                <?php get_template_part( 'includes/content-recommendation-inline' ); ?>

            </div><!--/span8-->
        </div><!--/post-->
        <?php endwhile; // end of the loop. ?>
    </article>

    <?php get_sidebar(); ?>

</div><!--/row-->


<?php elseif ( has_post_format( 'image' )) : ?>

<div class="row">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="span12">
        <div class="feature">
            <div class="featimg"><?php the_post_thumbnail('bt-post-image'); ?> <span><?php the_title(); ?></span></div>
        </div><!--/feature-->
    </div><!--/span12-->
</div><!--/row-->

<div class="row">
    <article class="post-image">
        <div class="post">
            <div class="span8">
                <div class="main">
                    <p class="byline"><?php the_author_posts_link(); ?> <span>|</span> <small class="publish-date"><?php the_time(' F jS, Y') ?>  at <?php the_time('g:i a'); ?></small></p>
                    <?php the_content(); ?>
                    <?php get_template_part('social'); ?>
                </div><!--/main-->
                <?php get_template_part( 'includes/content-recommendation-inline' ); ?>
            </div><!--/span8-->
        </div><!--/post-->
        <?php endwhile; // end of the loop. ?>
    </article>

    <?php get_sidebar(); ?>

</div><!--/row-->

<?php else : ?>


<div class="row">
    <article class="post-standard">
        <div class="post">
            <div class="span8">
                <div class="main">
                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <div class="feature">
                        <div class="featimg"><?php the_post_thumbnail('bt-post-standard'); ?> <span><?php the_title(); ?></span></div>
                    </div><!--/feature-->
                    <p class="byline"><?php the_author_posts_link(); ?> <span>|</span> <small class="publish-date"><?php the_time(' F jS, Y') ?>  at <?php the_time('g:i a'); ?></small></p>
                    <?php the_content(); ?>
                    <?php get_template_part('social'); ?>
                    <?php endwhile; // end of the loop. ?>
                </div><!--/main-->
                <?php get_template_part( 'includes/content-recommendation-inline' ); ?>
            </div><!--/span8-->
        </div><!--/post-->
    </article>
    <?php get_sidebar(); ?>
</div><!--/row-->


<?php endif; ?>

<?php get_template_part('social-floating'); ?>

<?php get_footer(); ?>
