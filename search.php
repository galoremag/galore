<?php
/**
 * Search results page
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

			<?php
			global $query_string;
			global $wp_query;
			
			$total_results = $wp_query->found_posts;

			$query_args = explode("&", $query_string);
			$search_query = array();

			foreach($query_args as $key => $string) {
				$query_split = explode("=", $string);
				$search_query[$query_split[0]] = urldecode($query_split[1]);
			} // foreach

			$search = new WP_Query($search_query);
			
			if ( have_posts() ): ?>
			<h2><span><?php $num = $wp_query->post_count; if (have_posts()) : echo $num; endif;?> Results for '</span><?php echo get_search_query(); ?><span>'</span></h2>	
			<hr>
			<ol>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-4">
							<div class="thumbnail">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('large', 300, 150); ?></a>
							</div>
						</div>
						<div class="nopadright col-sm-8">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_date(); ?> <?php the_time(); ?></time> • By <?php the_author_posts_link(); ?>
							<div class="padtop10"></div>
							<?php the_excerpt(); ?>
							<a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a>
							<ul class="post-social pull-right">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</article>
				</li>
				<hr>
			<?php endwhile; ?>
			</ol>
			<p class="text-center">That's everything with "</span><?php echo get_search_query(); ?>" in it.</p>
			<?php else: ?>
			<h3 class="text-center"><span>Nothing found with '</span><?php echo get_search_query(); ?><span>' in it.</span></h3>
			<?php endif; ?>

			<h2 class="text-center pad20">Recent Stories</h2>
			<?php 
			echo do_shortcode('[ajax_load_more post_type="post" orderby="date" button_label="More Shit"]');
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