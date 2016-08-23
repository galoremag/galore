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
		<div id="content" class="col-sm-10 col-sm-offset-1">

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
			<div id="post-nav" style="clear:both">
				<ul>
					<li id="page-left" class="alignleft pull-left"><?php previous_posts_link( '<h4><i class="fa fa-chevron-left"></i> &nbsp; PREV</h4>' ); ?></li>
					<li id="page-right" class="alignright pull-right"><?php next_posts_link( '<h4>NEXT &nbsp; <i class="fa fa-chevron-right"></i></h4>', '' ); ?></li>
				</ul>
			</div>
			<p class="text-center">Showing results <?php
				$num_cb = $wp_query->post_count;
				$id_cb = $paged;
				$r_cb=1;
				$startNum_cb = $r_cb;
				$endNum_cb = 10;
				if($id_cb >=2) {
				  $s_cb=$id_cb-1;
				  $r_cb=($s_cb * 10) + 1;
				  $startNum_cb=$r_cb;
				  $endNum_cb=$startNum_cb + ($num_cb -1);
				}

				if (have_posts()) :
				 echo "<b>$startNum_cb-$endNum_cb</b>";
				endif;

				$totaltime= number_format($load,4);

				?> out of <?php $search_count = 0; $search = new WP_Query("s=$s & showposts=-1"); if($search->have_posts()) : while($search->have_posts()) : $search->the_post(); $search_count++; endwhile; endif; echo "<b>$search_count</b>";?>
			</p>
			<hr>

			<!-- <p class="text-center">That's everything with "</span><?php echo get_search_query(); ?>" in it.</p> -->
			<?php else: ?>
			<h3 class="text-center"><span>Nothing found with '</span><?php echo get_search_query(); ?><span>' in it.</span></h3>
			<?php endif; ?>

			<h2 class="text-center pad20">Recent Stories</h2>
			<?php
			echo do_shortcode('[ajax_load_more post_type="post" orderby="date" button_label="Loading"]');
			?>
			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
