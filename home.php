<?php
/**
* Template: Home
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php
$args = array( 'tag' => 'superhero', 'post_type' => 'post', 'showposts' => 1, 'orderby' => 'date', 'order' => 'DESC' );

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
</a>
<a id="scroll-down"><i class="fa fa-arrow-circle-o-down"></i></a>

<?php endforeach; ?>

<div class="jumbotron">
	<div class="jumbotron-in">
		<div class="container">
			<div class="row-fluid">
				<div class="hero-slider col-md-10 col-md-offset-1">
					<?php echo do_shortcode( '[new_royalslider id="4"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="latest-container">
	<h2 class="text-center verPad20"><a href="the-latest/"><i class="fa fa-flash"></i> The Daily Dish <i class="fa fa-flash"></i></a></h2>
	<div id="latest">

		<div id="glides">
			<?php
				$postslist = get_posts('numberposts=20&order=DESC&orderby=date&offset=0');
				foreach ($postslist as $post) :
				setup_postdata($post);
			?>
			<div class="glide">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<!-- <h4>
					<?php 
					if (get_post_meta($post->ID,'tagline')) {
					echo get_post_meta($post->ID,'tagline');
					}
					?>
				</h4> -->
				<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- <div class="text-center">
	<div class="spacer20"></div>
	<a class="btn centerBlock" href="the-latest"><i class="fa fa-bomb"></i>&nbsp; Go Crazy &nbsp;<i class="fa fa-bomb"></i></a>
	<div class="spacer20"></div>
</div> -->

<div id="home-container">

	<!-- STYLE SECTION -->

	<div class="home-style container-fluid nopad">
		<div class="row-fluid home-style-in nopad">
			<div class="col-md-8 pad40">
				<div class="row-fluid">
					<div class="col-sm-12 nopad">
						<h2>Style + Beauty <i class="fa fa-scissors"></i></h2>
					</div>
					<div class="col-sm-12 spacer20"></div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12 nopad">
					<?php echo do_shortcode( '[new_royalslider id="5"]' ); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12 spacer40"></div>
				</div>
				<div class="row-fluid post-grid">
					<?php
					$counter = 1; //start counter

					$grids = 2; //Grids per row-fluid

					$args = array(
						'category_name' => 'beauty,style',
						'showposts' => 4,
						'orderby' => 'date',
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 4
					);
					$bsQuery = new WP_Query( $args );

					if(have_posts()) :	while($bsQuery->have_posts()) :  $bsQuery->the_post(); 

					//Show the left hand side column
					if($counter == 1) :
					?>
					<div class="thumbnail col-sm-6 horpad10">
						<div class="nopad">
							<a class="postimage" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							<div class="caption">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
				                <p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
				                <!-- <p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Read Story <i class="fa fa-mars"></i></a></p> -->
				            </div>
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
				<!-- <div class="row-fluid">
					<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/beauty"><i class="fa fa-scissors"></i>&nbsp; Get Glam &nbsp;<i class="fa fa-scissors"></i></a></p>
				</div> -->
			</div>
			<div class="col-md-4 nopad">
				<div class="darlings pad40">
					<div class="brand"></div>
					<h1 class="text-center">Darlings</h1>
					<?php
					$args = array( 'tag' => 'darling', 'post_type' => 'post', 'showposts' => 4, 'orderby' => 'date', 'order' => 'DESC' );

					$postslist = get_posts( $args );

					// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
					foreach ($postslist as $post) : setup_postdata($post);
					?>
					<div class="text-left">
						<a class="postimage" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
					</div>
					<?php endforeach; ?>
					<div class="row-fluid">
						<div class="spacer20"></div>
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/tag/darling"><i class="fa fa-bomb"></i> Bombshells <i class="fa fa-bomb"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- SEX + DATING SECTION -->

	<div class="sex-dating">
		<div class="sex-dating-in">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="col-md-10 col-md-offset-1">
						<h2>Sex + Dating <i class="fa fa-heart"></i></h2>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-md-7 col-sm-8 col-md-offset-1">
						<?php
						$postslist = get_posts('category_name=sex-dating&numberposts=1&order=DESC&orderby=date');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry home-sex-dating">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<div class="spacer10"></div>
							<div class="excerpt"><?php the_excerpt(); ?></div>
							<div class="spacer10"></div>
							<p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Read Story <i class="fa fa-mars"></i></a></p>
							<!-- <ul class="post-social">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul> -->
						</div>
						<?php endforeach; ?>
					</div>
					<div class="col-md-3 col-sm-4">
						<?php
						$postslist = get_posts('category_name=sex-dating&numberposts=2&order=DESC&orderby=date&offset=1');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<div class="spacer10"></div>
							<p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Read Story <i class="fa fa-mars"></i></a></p>
							<!-- <ul class="post-social">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul> -->
							<div class="spacer10"></div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12">
						<div class="spacer20"></div>
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/sex-dating"><i class="fa fa-heart"></i> &nbsp; Hook It Up &nbsp;<i class="fa fa-heart"></i></a></p>
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
					<div class="col-md-10 col-md-offset-1">
						<h2>Guilty Pleasure <i class="fa fa-star"></i></h2>
						<h3>Best of Pop Culture</h3>
						<div class="spacer20"></div>
						<div class="row-fluid post-grid">
							<?php
							$counter = 1; //start counter

							$grids = 3; //Grids per row-fluid

							/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
							query_posts($query_string . 'category_name=pop&ignore_sticky_posts=0&posts_per_page=3');


							if(have_posts()) :	while(have_posts()) :  the_post(); 
							?>
							<?php
							//Show the left hand side column
							if($counter == 1) :
							?>
							<div class="thumbnail col-md-4">
								<a class="postimage" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
				                <div class="caption">
				                	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
				                	<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
				                </div>
				                <!-- <p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Read Story <i class="fa fa-mars"></i></a></p> -->
				                <!-- <ul class="post-social">
									<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								</ul> -->
							</div>
							<?php
							$counter = 0;
							endif;
							?>
							<?php
							//Show the left hand side column
							if($counter == 1) :
							?>
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
						<div class="row-fluid post-grid">
							<?php
							$counter = 1; //start counter

							$grids = 3; //Grids per row-fluid

							/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
							query_posts($query_string . 'category_name=pop&ignore_sticky_posts=0&posts_per_page=3&offset=3');


							if(have_posts()) :	while(have_posts()) :  the_post(); 
							?>
							<?php
							//Show the left hand side column
							if($counter == 1) :
							?>
							<div class="thumbnail col-md-4">
								<a class="postimage" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
				                <div class="caption">
				                	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
				                	<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
				                </div>
				                <!-- <p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Read Story <i class="fa fa-mars"></i></a></p> -->
				                <!-- <ul class="post-social">
									<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								</ul> -->
							</div>
							<?php
							$counter = 0;
							endif;
							?>
							<?php
							//Show the left hand side column
							if($counter == 1) :
							?>
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
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/pop"><i class="fa fa-flash"></i>&nbsp; Make It Pop &nbsp;<i class="fa fa-flash"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- COVER STORIES -->

	<!-- <div id="cover-title">
		<img src="<?php bloginfo('template_url'); ?>/images/cover-stories.png" alt="Galore Mag Cover Stories">
	</div>

	<div class="cover-stories">
		<div class="container-fluid nopad">
			<div class="row-fluid">
				<div class="nopad col-sm-12">
					<?php echo do_shortcode( '[new_royalslider id="3"]' ); ?>
				</div>
			</div>
		</div>
	</div> -->

	<div class="container-fluid nopad">
		<div class="row-fluid">
			<div id="content" class="col-md-10 col-md-offset-1">
				<h2 id="stickHead" class="text-center"><i class="fa fa-diamond"></i> More Everything <i class="fa fa-diamond"></i></h2>
				<hr>

				<?php 
				echo do_shortcode('[ajax_load_more button_label="Loading" offset="32"]');
				?>

				<div class="spacer40"></div>
			</div>
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