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

<!-- Start Superhero -->

<?php
$args = array( 'tag' => 'superhero', 'post_type' => array('sponsor', 'post'), 'showposts' => 1, 'orderby' => 'date', 'order' => 'DESC' );

$postslist = get_posts( $args );

// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
foreach ($postslist as $post) : setup_postdata($post);
?>

<?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
$url = $thumb[0];
?>


<a id="superhero" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background: url(<?php echo $url ?>) no-repeat;">
	<h1 class="pad40 col-md-6"><?php the_title(); ?></h1>
	<img class="specialPixel" height='1' width='1' src='https://tracking.jetpackdigital.com/jpt?sid=1242&oid=5697&lid=27946&csid=&c=0&itt=EOTgSDNteBPGBZseExTPjt3KGpZXpe1WEEYEwE1Y%2FTII51KPC7NhewUsrcjb%2FwYB&ord=[RANDOM]'/>
	<a href='https://tracking.jetpackdigital.com/jpc?sid=1242&oid=5697&lid=27946&csid=&c=0&ict=fc%2BEefcyYl059wfYiWxiFP1FJQs4mZgA&ord=[RANDOM]'/></a>
</a>
<a id="scroll-down"><i class="fa fa-arrow-circle-o-down"></i></a>

<?php endforeach; ?>

<!-- End Superhero -->

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-8 col-sm-offset-2">
			<h2><?php echo single_cat_title( '', false ); ?></h2>
			<div class="row-fluid">
				<div class="col-sm-12 nopad">
				<?php echo do_shortcode( '[new_royalslider id="5"]' ); ?>
				</div>
			</div>
			<hr>
			<ol>
			<?php query_posts('posts_per_page=4&offset=0&ignore_sticky_posts=true'); ?>
			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-4">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumb">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
						</div>
						<div class="nopadright col-sm-8">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

							<div class="excerpt"><?php the_excerpt(); ?></div>

							<p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>
							<ul class="post-social pull-right">
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
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
			$cat = get_category( get_query_var( 'cat' ) );
			$category = $cat->slug;
			echo do_shortcode('[ajax_load_more category="'.$category.'" offset="7" ignore_sticky_posts="true"]');
			?>

			<!-- <div id="post-nav">
				<ul>
					<li id="page-left" class="alignleft pull-left"><?php previous_posts_link( '<h4><i class="fa fa-chevron-left"></i> &nbsp; PREV</h4>' ); ?></li>
					<li id="page-right" class="alignright pull-right"><?php next_posts_link( '<h4>NEXT &nbsp; <i class="fa fa-chevron-right"></i></h4>', '' ); ?></li>
				</ul>
			</div> -->
			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>