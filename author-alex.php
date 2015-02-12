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
		<div id="content" class="col-sm-8 col-sm-offset-2">
			<?php if ( have_posts() ): the_post(); ?>

			<h3>Stories by <?php echo get_the_author() ; ?></h3>
			<hr>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h4>About <?php echo get_the_author() ; ?></h4>
			<?php the_author_meta( 'description' ); ?>
			<?php endif; ?>

			<ol>
			<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
				<li>
					<article class="row-fluid">
						<div class="nopad col-sm-4">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumbnail">
								<?php the_post_thumbnail('large', 300, 150); ?>
							</div>
						</div>
						<div class="col-sm-8">
							<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
							<p>By <?php the_author_posts_link(); ?></p>
							<?php the_excerpt(); ?>
							<a href="<?php esc_url( the_permalink() ); ?>"><button>Read Story</button></a>
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
			echo do_shortcode('[ajax_load_more author="'.$author.'"]');
			?>
			</ol>

			<?php else: ?>
			<h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
			<?php endif; ?>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>