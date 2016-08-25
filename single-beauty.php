<?php
/**
* The Template for displaying all single posts
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
		<div id="content" class="col-md-8 col-sm-12 container-fixed">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article>
				<?php setPostViews(get_the_ID()); ?>
				<div class="single-featured-image">
					<div class="catlinks"><?php the_category(); ?></div>
					<?php the_post_thumbnail('large'); ?>
				</div>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div id="social-links">
					<ul id="post-social" class="post-social hidden-xs hidden-sm">
						<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>

				<p class="byline"><i class="fa fa-bomb"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
				<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
				<div class="spacer20"></div>
				<?php the_content(); ?>
				<div class="spacer20"></div>
				<div class="author-info row hidden-xs">
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-bio col-md-8 col-md-offset-2 text-right">
						<h3>About The Author: <span><?php echo get_the_author() ; ?></span></h3>
						<?php the_author_meta( 'description' ); ?>
					</div>
					<div class="author-pic col-md-2">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="spacer20"></div>
				<!-- <ul class="single-social">
					<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul> -->
			</article>
			<?php endwhile; ?>
			<!-- <hr> -->

			<!­­ cmnUNT | Begin ad tag ­­>
			<div id="cmn_ad_tag_content" class="container-fluid nopad">
				<script type="text/javascript">cmnUNT('100x100', tile_num++);</script>
			</div>
			<!­­ cmnUNT | End ad tag ­­>

			<h2 class="text-center">Gimme More <i class="fa fa-bomb"></i> <span>Beauty</span></h2>
			<div class="spacer20"></div>
			<hr />
			<div class="spacer20"></div>
			<ul id="related-posts" class="row-fluid">

				<!-- Special Post -->

				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sponsored-md' ) ); ?>

				<hr />

				<div id="post-nav" style="clear:both">
					<ul>
						<li id="page-left" class="alignleft pull-left"><?php previous_posts_link( '%link', '<h4><i class="fa fa-chevron-left"></i> &nbsp; PREV</h4>' ); ?></li>
						<li id="page-right" class="alignright pull-right"><?php next_posts_link( '%link', '<h4>NEXT &nbsp; <i class="fa fa-chevron-right"></i></h4>' ); ?></li>
					</ul>
				</div>

			</ul>
		</div>
		<div id="sidebar-anchor"></div>
		<div id="sidebar" class="sidebar col-md-4 hidden-xs hidden-sm">
			<h2>Trending</h2>
			<?php
			    $args = array(
			                'post_type'    => 'post',
			                'category_name'=> 'beauty',
			                'numberposts'  => 4,
			                'orderby'      => 'meta_value',
			                'meta_key'     => 'post_views_count',
			                'order'        => 'DESC',
			                'post_status'  => 'publish',
			                'date_query' => array(
						        array(
						        	'column' => 'post_date_gmt',
						            'after' => '2 month ago'
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
						<h4 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
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
