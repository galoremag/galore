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

			<div id="post-nav" style="clear:both">
				<ul>
					<li id="page-left" class="alignleft pull-left"><?php previous_posts_link( '<h4><i class="fa fa-chevron-left"></i> &nbsp; PREV</h4>' ); ?></li>
					<li id="page-right" class="alignright pull-right"><?php next_posts_link( '<h4>NEXT &nbsp; <i class="fa fa-chevron-right"></i></h4>', '' ); ?></li>
				</ul>
			</div>

			<h2 class="text-center">Showing results <?php
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
				 echo "<span>$startNum_cb-$endNum_cb</span>";
				endif;

				$totaltime= number_format($load,4);

				?> out of <span><?php $search_count = 0; $search = new WP_Query("s=$s & showposts=-1"); if($search->have_posts()) : while($search->have_posts()) : $search->the_post(); $search_count++; endwhile; endif; echo "$search_count";?></span> for <span><?php echo get_search_query(); ?></span>.
			</h2>
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
			<h3 class="text-center">Showing results <?php
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
				 echo "<span>$startNum_cb-$endNum_cb</span>";
				endif;

				$totaltime= number_format($load,4);

				?> out of <span><?php $search_count = 0; $search = new WP_Query("s=$s & showposts=-1"); if($search->have_posts()) : while($search->have_posts()) : $search->the_post(); $search_count++; endwhile; endif; echo "$search_count";?></span> for <span><?php echo get_search_query(); ?></span>.
			</h3>
			<hr>

			<!-- <p class="text-center">That's everything with "</span><?php echo get_search_query(); ?>" in it.</p> -->
			<?php else: ?>
			<h3 class="text-center"><span>Nothing found with '</span><?php echo get_search_query(); ?><span>' in it.</span></h3>
			<?php endif; ?>

			<h2 class="text-center pad20">Recent Stories</h2>
			<!-- Special Post -->

			<?php
				$adlist = get_posts('numberposts=1&order=DESC&orderby=date&offset=0&post_type=featured');
				foreach ($adlist as $post) :
				setup_postdata($post);
			?>

			<li class="post specialMd">
				<article class="row-fluid">
					<div class="nopad col-sm-5">
						<div class="specialFlagMd"></i><?php echo get_post_meta( $post->ID, 'featured', true ); ?></div>
						<div class="thumb">
							<a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="<?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
						</div>
						<h4 class="hidden-xs">Share this post</h4>
						<ul class="post-social pull-left hidden-xs">
							<li><a class="share-email" href="/cdn-cgi/l/email-protection#2365514a464d4763504c4e46544b4651460d404c4e1c505641494640571e1f1c534b5303574b467c574a574f460b0a18031c1d05424e5318414c475a1e1f1c534b53X the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
							<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							<li class="visible-xs"><h4>Share This Post</h4></li>
						</ul>
					</div>
					<div class="nopadright col-sm-7">
						<h3 class="nomartop"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="Permalink to <?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_title(); ?></a></h3>
						<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
						<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

						<div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

						<p class="pull-left hidden-xs"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" target="_blank" >Full Story <i class="fa fa-mars"></i></a></p>

						<img class="specialPixel" height='1' width='1' src='https://tracking.jetpackdigital.com/jpt?sid=1242&oid=6277&lid=30112&csid=&c=0&itt=J4USQfJyvBnLk5r%2BTHsi9i0P9gRfJwRXEg31FnhzRp8QnEtMvSypZRZrWa0O1xyJSvBCMGULTBg%3D&ord=[RANDOM]'/>
						<a href='https://tracking.jetpackdigital.com/jpc?sid=1242&oid=6277&lid=30112&csid=&c=0&ict=J4USQfJyvBlMu2SRh3iQGLuBsGuWmcAK%2FiWRKdw%2BQEX%2FEkHe9QE%2BigWjF0q7qdjweLSIcap3dHBNNLmx2VL%2BvXMbmpC%2FkCdO&ord=[RANDOM]'/></a>

					</div>
				</article>
			</li>

			<?php endforeach; ?>

			<?php wp_reset_postdata(); ?>

			<!­­ cmnUNT | Begin ad tag ­­>
			<div id="cmn_ad_tag_content" class="text-center">
				<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
			</div>
			<!­­ cmnUNT | End ad tag ­­>

			<hr />

			<ul class="alm-listing alm-ajax">

				<?php
				$args = array( 'category_name' => 'beauty', 'post_type' => 'post', 'showposts' => 4, 'orderby' => 'date', 'order' => 'DESC' );

				$postslist = get_posts( $args );

				// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
				foreach ($postslist as $post) : setup_postdata($post);
				?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumb">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4 class="hidden-xs">Share this post</h4>
							<ul class="post-social pull-left hidden-xs">
								<li><a class="share-email" href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								<li class="visible-xs"><h4>Share This Post</h4></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<ul class="post-social visible-xs">
								<li><a class="share-email" href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>

							<div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

							<p class="pull-left hidden-xs"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>

						</div>
					</article>
				</li>
				<?php endforeach; ?>

			</ul>

			<hr />

			<!­­ cmnUNT | Begin ad tag ­­>
			<div id="cmn_ad_tag_content" class="text-center">
				<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
			</div>
			<!­­ cmnUNT | End ad tag ­­>

			<hr />

			<!-- Infinite Scroll -->

			<?php
			echo do_shortcode('[ajax_load_more button_label="Loading" offset="32" post_type="post"]');
			?>

			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
