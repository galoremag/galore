<?php
/*
Single Post Template: NYFW
Description: This part is optional, but helpful for describing the Post Template
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-8 col-sm-offset-2">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article>
				<div id="social-links">
					<ul id="post-social" class="post-social">
						<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				<h3><?php the_title(); ?></h3>
				<p>By <?php the_author_posts_link(); ?></p>

				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				
				<div class="spacer20"></div>

				<iframe src="http://vds.rightster.com/v/01yzm6yhx2qm6p?target=iframe&amp;autoplay=0&amp;show_title=1" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>	

				<div class="spacer20"></div>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				<h3>About <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

			</article>
			<?php endwhile; ?>

			<hr>
			<h2 class="text-center">Similar Stories</h2>
<!-- 			<ul>
				<?php
				//for use in the loop, list 5 post titles related to first tag on current post
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
				$first_tag = $tags[0]->term_id;
				$args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page'=>5,
				'ignore_sticky_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
				
				<li class="related-post">
					<article>
						<div class="thumbnail">
							<?php the_post_thumbnail('large'); ?>
						</div>
						<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
						<?php the_excerpt(); ?>
						<a href="<?php esc_url( the_permalink() ); ?>"><button>Read Story</button></a>
						<ul class="post-social pull-right">
							<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</article>
				</li>
				<hr>

				<?php
				endwhile;
				}
				wp_reset_query();
				}
				?>
			</ul> -->

			<div id="related-posts" class="row-fluid">
				<!-- <table>
					<tbody>
					    <tr>
					    	<?php
							$postslist = get_posts('numberposts=3&order=DESC&orderby=date&offset=0');
							foreach ($postslist as $post) :
							setup_postdata($post);
							?>
					    	<td class="latest-entry col-sm-4">
					    		<a href="<?php the_permalink(); ?>">
						    		<?php the_post_thumbnail('thumbnail'); ?>
									<h4><?php the_title(); ?></h4>
								</a>
					    	</td>
					    	<?php endforeach; ?>
					    </tr>
					</tbody>
				</table> -->

				<?php 
				$cat = get_category( get_query_var( 'cat' ) );
				$category = $cat->slug;
				echo do_shortcode('[ajax_load_more category="'.$category.'"]');
				?>
			</div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>