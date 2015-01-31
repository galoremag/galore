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
<div class="jumbotrin">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
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
<div class="container-fluid">
	<h2>Sex + Advice</h2>
	<div class="sex-advice">
		<div class="row">
			<?php
			$query = new WP_Query( array(
			// 'category__not_in' => array(2335, 5, 3156, 8),
			'category_name' => 'sex-advice',
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
<div class="container-fluid">
	<h2>Pop</h2>
	<div class="pop">
		<div class="row">
			<?php
			$query = new WP_Query( array(
			// 'category__not_in' => array(2335, 5, 3156, 8),
			'category_name' => 'pop',
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
<div class="container-fluid">
	<h2>Style</h2>
	<div class="style">
		<div class="row">
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

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>