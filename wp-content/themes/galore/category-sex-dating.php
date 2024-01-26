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

<div class="container-fluid nopad">
	<div class="row-fluid">
		<div class="col-md-6 col-md-offset-3 container-fixed nopad">
		<?php echo do_shortcode( '[new_royalslider id="9"]' ); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div id="content" class="col-md-8 col-sm-12">
			<h2 class="text-center">The Latest in <span>Dating <i class="fa fa-heart"></i></span></h2>
			<hr>
			<ol>
			<?php query_posts('category_name=sex-dating&posts_per_page=4&offset=3&ignore_sticky_posts=true'); ?>
			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumb">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4 class="hidden-xs">Share this post</h4>
							<ul class="post-social pull-left hidden-xs">
								<li><a class="share-email" href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								<li class="visible-xs"><h4>Share This Post</h4></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<ul class="post-social visible-xs">
								<li><a class="share-email" href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>

							<div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

							<p class="pull-left hidden-xs"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>

						</div>
					</article>
				</li>
				<hr>
			<?php endwhile; ?>
			</ol>
			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>

			<?php
			echo do_shortcode('[ajax_load_more category="sex-dating" button_label="Loading" offset="7" ignore_sticky_posts="true" cache="true" cache_id="8648543595"]');
			?>

			<div class="spacer40"></div>
		</div>
		<div id="sidebar-anchor"></div>
		<div id="sidebar" class="sidebar col-md-4 hidden-sm hidden-xs">
			<h2>Trending</h2>
			<?php
			    $args = array(
	                'post_type'    => 'post',
	                'category_name'=> 'sex-dating',
	                'ignore_sticky_posts'=> 1,
	                'numberposts'  => 4,
	                'orderby'      => 'meta_value',
	                'meta_key'     => 'post_views_count',
	                'order'        => 'DESC',
	                'post_status'  => 'publish',
	                'date_query' => array(
				        array(
				        	'column' => 'post_date_gmt',
				            'after' => '12 months ago'
				        )
				    )
	            );
			    $ranking = 0;
			?>
			<?php query_posts($args); ?>
			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article>
						<div class="thumbnail">
							<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
						</div>
						<h4><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
					</article>
				</li>
			<?php endwhile; ?>

			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
