<?php
/**
* The main template file
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file
*
* Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
*
	* @package 	WordPress
	* @subpackage 	Starkers
		* @since 		Starkers 4.0
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="jumbotron">
<div class="jumbotron-in">
	<div class="container">
		<div class="row-fluid">
			<div class="col-sm-10 col-sm-offset-1">
				<?php echo do_shortcode( '[new_royalslider id="1"]' ); ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="latest-slider">
	<div class="container-fluid">
		<h2 class="text-center"><span>The</span> Latest</h2>
		<div class="row-fluid">
			<div class="col-sm-12">
				<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
			</div>
		</div>
		<!-- <div id="latest-container" class="row-fluid">
			<table>
				<tbody>
				    <tr>
				    	<?php
						$postslist = get_posts('numberposts=12&order=DESC&orderby=date&offset=0');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
				    	<td class="latest-entry">
				    		<?php the_post_thumbnail('thumbnail'); ?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				    	</td>
				    	<?php endforeach; ?>
				    </tr>
				</tbody>
			</table>
		</div> -->
	</div>

	<div class="row-fluid">
		<p class="readmore text-center"><a href="<?php bloginfo('url'); ?>/the-latest"><button>All Recent Stories</button></a></p>
	</div>
</div>

<!-- SEX + DATING SECTION -->

<div class="sex-dating">
	<div class="sex-dating-in">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-sm-8 col-sm-offset-2">
					<h2>Sex <span>+</span> Advice <span><i class="fa fa-heart"></i></span></h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-sm-6 col-sm-offset-2">
					<?php
					$postslist = get_posts('category_name=sex-dating&numberposts=1&order=DESC&orderby=date');
					foreach ($postslist as $post) :
					setup_postdata($post);
					?>
					<div class="entry home-chunk">
						<?php the_post_thumbnail('large'); ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_time(get_option('date_format')) ?></p>
						<p>By <?php the_author_posts_link(); ?></p>
						<?php the_excerpt(); ?>
						<ul class="post-social">
							<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="col-sm-2">
					<?php
					$postslist = get_posts('category_name=sex-dating&numberposts=2&order=DESC&orderby=date&offset=1');
					foreach ($postslist as $post) :
					setup_postdata($post);
					?>
					<div class="entry">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p><?php the_time(get_option('date_format')) ?></p>
						<!-- <p><?php the_excerpt(10); ?></p> -->
						<p>By <?php the_author_posts_link(); ?></p>
						<ul class="post-social">
							<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- POP SECTION -->

<div class="pop">
	<div class="pop-in">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-sm-8 col-sm-offset-2">
					<h2><span>Pop</span> <i class="fa fa-flash"></i></h2>
					<div class="row-fluid post-grid">
						<?php
						$counter = 1; //start counter

						$grids = 3; //Grids per row-fluid

						global $query_string; //Need this to make pagination work


						/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
						query_posts($query_string . '&ignore_sticky_posts=0&posts_per_page=6');


						if(have_posts()) :	while(have_posts()) :  the_post(); 
						?>
						<?php
						//Show the left hand side column
						if($counter == 1) :
						?>
						<div class="col-sm-4">
							<div class="entry">
								<div class="postimage">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
								</div>
				                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
				                <p><?php the_time(get_option('date_format')) ?></p>
				                <p>By <?php the_author_posts_link(); ?></p>
				                <ul class="post-social">
									<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
						<?php
						$counter = 0;
						endif;
						?>
						<?php
						//Show the left hand side column
						if($counter == 1) :
						?>
						<div class="col-sm-4">
							<div class="postimage">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
			                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			                <p><?php the_time(get_option('date_format')) ?></p>
			                <p>By <?php the_author_posts_link(); ?></p>
						</div>
						<?php
						$counter = 0;
						endif;
						?>
						<?php
						//Show the left hand side column
						if($counter == 1) :
						?>
						<div class="col-sm-4">
							<div class="postimage">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
			                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			                <p><?php the_time(get_option('date_format')) ?></p>
			                <p>By <?php the_author_posts_link(); ?></p>
						</div>
						<div class="clear"></div>
						<?php
						$counter = 0;
						endif;
						?>
						<?php
						$counter++;
						endwhile;
						//Pagination can go here if you want it.
						endif;
						?>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-sm-12">
					<div class="spacer20"></div>
					<p class="text-center"><a href="<?php get_category_link(); ?>">Read More</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- STYLE SECTION -->

<div class="style">
	<div class="style-in">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-sm-8 col-sm-offset-2">
					<h2>Style <span><i class="fa fa-scissors"></i></span></h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-sm-5 col-sm-offset-2">
					<div>
						<?php echo do_shortcode( '[new_royalslider id="2"]' ); ?>
						<div class="spacer20"></div>
						<a class="pull-right" href="<?php get_category_link(); ?>">Read More</a>
						<div class="spacer40"></div>
					</div>
					<hr>
					<h2>Beauty <span><i class="fa fa-bomb"></i></span></h2>
					<div class="post-grid">
						<?php
						$counter = 1; //start counter

						$grids = 2; //Grids per row-fluid

						global $query_string; //Need this to make pagination work


						/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
						query_posts($query_string . 'category_name=style&ignore_sticky_posts=0&posts_per_page=4');


						if(have_posts()) :	while(have_posts()) :  the_post(); 
						?>
						<?php
						//Show the left hand side column
						if($counter == 1) :
						?>
						<div class="entry col-sm-6">
							<div class="postimage">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
			                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			                <p><?php the_time(get_option('date_format')) ?></p>
		                	<p>By <?php the_author_posts_link(); ?></p>
						</div>
						<?php
						$counter = 0;
						endif;
						?>
						<?php
						//Show the left hand side column
						if($counter == 1) :
						?>
						<div class="entry col-sm-6">
							<div class="postimage">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
			                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			                <p><?php the_time(get_option('date_format')) ?></p>
		                	<p>By <?php the_author_posts_link(); ?></p>
						</div>
						<div class="clear"></div>
						<?php
						$counter = 0;
						endif;
						?>
						<?php
						$counter++;
						endwhile;
						//Pagination can go here if you want it.
						endif;
						?>
						<p class="text-center"><a href="<?php get_category_link(); ?>">Read More</a></p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="darlings">
						<div class="brand"></div>
						<h2 class="text-center"><span>Darlings</span></h2>
						<?php
						$postslist = get_posts('tag_name=darlings&numberposts=4&order=DESC&orderby=date&offset=0');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry text-left">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
								<h4><?php the_title(); ?></h4>
							</a>
						</div>
						<?php endforeach; ?>
						<div class="row-fluid">
							<div class="spacer20"></div>
							<p class="text-center"><a href="<?php get_category_link(); ?>"><button>Read More</button></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- COVER STORIES -->

<div id="cover-title">
	<img src="<?php bloginfo('template_url'); ?>/images/cover-stories.png">
</div>

<div class="cover-stories">
	<div class="container-fluid">
		<div class="row">
			<div class="nopad col-sm-12">
				<?php echo do_shortcode( '[new_royalslider id="3"]' ); ?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-8 col-sm-offset-2">
			<?php if ( have_posts() ): ?>
			<h2>Hot <span>Stories</span> <i class="fa fa-diamond"></i></h2>
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
							<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> • By <?php the_author_posts_link(); ?>
							<div class="padtop10"></div>
							<?php the_excerpt(); ?>
							<a href="<?php esc_url( the_permalink() ); ?>">Read Story</a>
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
			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>

			<?php 
			$cat = get_category( get_query_var( 'cat' ) );
			$category = $cat->slug;
			echo do_shortcode('[ajax_load_more category="'.$category.'"]');
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

<!-- <div class="kittens container-fluid">
	<div class="row-fluid">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="kitten-logo" style="-webkit-transform: scale(0.4);">
				<img src="<?php bloginfo('template_url'); ?>/images/kitten-logo.png">
			</div>
			<h3 class="text-center">Finally, a talent agency for the mobile + social world.</h3>
			<p class="text-center">See our full roster of girls <a href="/kitten">here</a>.</p>
			<div class="kitten-girls">
				<img src="<?php bloginfo('template_url'); ?>/images/kittens/kittens.png">
			</div>
		</div>
	</div>
</div> -->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>