<?php
/**
 * The template for displaying Author Archive pages
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
		<div id="content" class="col-sm-10 col-sm-offset-1">
			<?php
			$author = get_the_author_meta('ID', get_query_var('author'));
			query_posts('posts_per_page=4&author='.$author.'&offset=0'); ?>
			<?php if ( have_posts() ): the_post(); ?>

			<h3>Stories by <span><?php echo get_the_author(); ?></span></h3>
			<hr>

			<div class="author-info row-fluid hidden-xs">
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-bio col-md-8 col-md-offset-2 text-right">
					<h3><span><?php echo get_the_author() ; ?></span></h3>
					<?php the_author_meta( 'description' ); ?>
				</div>
				<div class="author-pic col-md-2">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				</div>
			</div>

			<hr>

			<?php endif; ?>

			<ol>
			<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
				<li>
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumbnail">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

							<div class="excerpt"><?php the_excerpt(); ?></div>

							<p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>
							<ul class="post-social pull-right">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</article>
				</li>
				<hr>
			<?php endwhile; ?>

			<?php
			$author = get_the_author_meta('ID', get_query_var('author'));
			echo do_shortcode('[ajax_load_more author="'.$author.'" offset="4"]');
			?>
			</ol>

			<?php else: ?>
			<h2>No posts to display for <?php echo get_the_author() ; ?></h2>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
