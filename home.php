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
<div class="sex-advice container-fluid">
<div class="sex-advice-in">
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
				<?php the_time(get_option('date_format')) ?>
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
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_time(get_option('date_format')) ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid">
	<div class="pop">
		<div class="row">
			<h2 class="text-center">P<span>o</span>p</h2>
			<div class="col-sm-8 col-sm-offset-2">
				<div class="row" id="gridcontainer">
					<?php
					$counter = 1; //start counter

					$grids = 2; //Grids per row

					global $query_string; //Need this to make pagination work


					/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
					query_posts($query_string . '&ignore_sticky_posts=1&posts_per_page=6');


					if(have_posts()) :	while(have_posts()) :  the_post(); 
					?>
					<?php
					//Show the left hand side column
					if($counter == 1) :
					?>
					<div class="griditemleft">
						<div class="postimage">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
		                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<?php
					//Show the right hand side column
					elseif($counter == $grids) :
					?>
					<div class="griditemright">
						<div class="postimage">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
		                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
	</div>
</div>
<div class="container-fluid">
	<div class="style">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<h2>Style</h2>
				<?php
				$query = new WP_Query( array(
				// 'category__not_in' => array(2335, 5, 3156, 8),
				'category_name' => 'latest',
				// 'post__not_in'  => get_option( 'sticky_posts' ),
				// 'ignore_sticky_posts' => 0,
				'showposts' => '3'
				) ); ?>
				<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="span4">
					<?php get_template_part( 'includes/homepage-entries' ); ?>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); endif; ?>
			</div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>