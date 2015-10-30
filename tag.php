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
		<div id="content" class="col-sm-10 col-sm-offset-1">
			<?php if ( have_posts() ): ?>
			<h2><span>Tag </span><i class="fa fa-tag"></i> <?php echo single_tag_title( '', false ); ?></h2>
			<hr>
			<ol>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumbnail">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4>Share this post</h4>
							<ul class="post-social pull-left">
								<li><a href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

							<div class="excerpt"><?php the_excerpt(); ?></div>

							<p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>

						</div>
					</article>
				</li>
				<hr>
			<?php endwhile; ?>
			</ol>
			<?php else: ?>
			<h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
			<?php endif; ?>

			<h2>No more stories tagged <span><?php echo single_tag_title( '', false ); ?></span></h2>

			<?php 
			$tag = get_the_tags( get_query_var( 'tag' ) );
			$tags = $tag->slug;
			echo do_shortcode('[ajax_load_more tag="'.$tags.'" offset="4"]');
			?>
			
			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>