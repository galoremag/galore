<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-8 col-sm-offset-2">
			<?php if ( have_posts() ): ?>
			<h2><?php echo single_cat_title( '', false ); ?></h2>
			<hr>
			<ol>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article class="row-fluid">
					<div class="nopad col-sm-8">
						<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> • By <?php the_author_posts_link(); ?>
						<?php the_excerpt(); ?>
						<a href="<?php esc_url( the_permalink() ); ?>"><button>Read Story</button></a>
						<ul class="post-social pull-right">
							<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
					<div class="nopad col-sm-4">
						<div class="thumbnail">
							<?php the_post_thumbnail('large', 300, 150); ?>
						</div>
					</div>
					</article>
				</li>
				<hr>
			<?php endwhile; ?>
			</ol>
			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>
			<div class="post-nav">
				<ul>
					<li class="page-left alignleft pull-left"><?php previous_posts_link( '<h4><i class="fa fa-chevron-left"></i> &nbsp; PREV</h4>' ); ?></li>
					<li class="page-right alignright pull-right"><?php next_posts_link( '<h4>NEXT &nbsp; <i class="fa fa-chevron-right"></i></h4>', '' ); ?></li>
				</ul>
			</div>
			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>