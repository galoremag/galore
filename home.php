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
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<?php echo do_shortcode( '[new_royalslider id="6"]' ); ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="latest container-fluid">
	<h2 class="text-center"><span>The</span> Latest</h2>
	<div class="row">
		<div class="col-sm-12">
			<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
		</div>
		<!-- <div id="latest" class="col-sm-12">
			<div class="horizontal">
			    <div class="table">
			    	<?php
						$query = new WP_Query( array(
						// 'category__not_in' => array(2335, 5, 3156, 8),
						'category_name' => 'latest',
						// 'post__not_in'  => get_option( 'sticky_posts' ),
						// 'ignore_sticky_posts' => 0,
						'showposts' => '15'
						) ); ?>
						<?php if ( $query->have_posts() ) : ?>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			        <tr>
			            <?php get_template_part( 'includes/homepage-entries' ); ?>
			        </tr>
			        <?php endwhile; ?>
					<?php wp_reset_postdata(); endif; ?>
			    </div>
			</div>
		</div> -->
	</div>
</div>

<!-- SEX + ADVICE SECTION -->

<div class="sex-advice">
	<div class="sex-advice-in">
		<div class="container-fluid">
			<div class="row">
				<div class="row-same-height">
					<h2 class="text-center"><span>Sex</span> + <span>Advice</span></h2>
					<div class="col-sm-6 col-sm-offset-2">
						<?php
						$postslist = get_posts('numberposts=1&order=DESC&orderby=date');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry home-chunk">
						<?php the_post_thumbnail('large'); ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_time(get_option('date_format')) ?></p>
						<p>By <?php the_author_posts_link(); ?></p>
						<?php the_excerpt(); ?>
						</div>
						<?php endforeach; ?>
					</div>
					<div class="col-sm-2">
						<?php
						$postslist = get_posts('numberposts=2&order=DESC&orderby=date&offset=1');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p><?php the_time(get_option('date_format')) ?></p>
						<!-- <p><?php the_excerpt(10); ?></p> -->
						<p>By <?php the_author_posts_link(); ?></p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- POP SECTION -->

<div class="pop">
	<div class="pop-in">
		<div class="container-fluid">
			<div class="row">
				<h2 class="text-center">Pop</h2>
				<div class="col-sm-8 col-sm-offset-2">
					<div class="row" id="gridcontainer">
						<?php
						$counter = 1; //start counter

						$grids = 3; //Grids per row

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
							<div class="postimage">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
			                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
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
			<div class="row">
				<div class="spacer20"></div>
				<p class="text-center"><a href="<?php get_category_link(); ?>"><button>Read More</button></a></p>
			</div>
		</div>
	</div>
</div>

<!-- STYLE SECTION -->

<div class="style">
	<div class="style-in">
		<div class="container-fluid">
			<div class="row">
				<div class="spacer40"></div>
				<div class="col-sm-6 col-sm-offset-2">
					<div>
						<h2>Style</h2>
						<?php echo do_shortcode( '[new_royalslider id="7"]' ); ?>
						<a class="pull-right" href="<?php get_category_link(); ?>"><button>Read More</button></a>
						<div class="spacer40"></div>
					</div>
					<hr>
					<div class="beauty">
					<h2>Beauty</h2>
						<?php
						$counter = 1; //start counter

						$grids = 3; //Grids per row

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
						<div class="col-sm-4">
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
						<div class="col-sm-4">
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
						</div>
				</div>
				<div class="col-sm-2">
					<div class="spacer20"></div>
					<div class="darlings text-center">
						<div class="brand"></div>
						<h2 class="justify">Darlings</h2>
						<?php
						$postslist = get_posts('numberposts=4&order=DESC&orderby=date&offset=0');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- COVER STORIES -->

<div class="cover-stories">
	<div class="container-fluid">
		<div class="row">
			<div class="nopad col-sm-12">
				<div class="cover-title"></div>
				<?php echo do_shortcode( '[new_royalslider id="8"]' ); ?>
			</div>
		</div>
	</div>
</div>

<div class="kittens container-fluid">
	<div class="row">
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
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>