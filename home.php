<?php
/**
* Template: Home
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="jumbotron">
	<div class="jumbotron-in">
		<div class="container">
			<div class="row-fluid">
				<div class="col-sm-10 col-sm-offset-1">
					<?php echo do_shortcode( '[new_royalslider id="4"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="latest-container">
	<h2 class="text-center verPad20"><span>The</span> Latest</h2>
	<div id="latest">

		<div id="glides">
			<?php
				$postslist = get_posts('numberposts=20&order=DESC&orderby=date&offset=0');
				foreach ($postslist as $post) :
				setup_postdata($post);
			?>
			<div class="glide">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
				<p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time> • By <?php the_author_posts_link(); ?></p>
				<p><?php echo substr(get_the_excerpt(), 0,100); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="text-center">
	<div class="spacer20"></div>
	<a class="btn centerBlock" href="#">More Stories &nbsp;<i class="fa fa-chevron-right"></i></a>
	<div class="spacer20"></div>
</div>

<!-- SEX + DATING SECTION -->
<div id="home-container">
	<div class="sex-dating">
		<div class="sex-dating-in">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="col-sm-10 col-sm-offset-1">
						<h2>Sex <span>+</span> Dating <span><i class="fa fa-heart"></i></span></h2>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-7 col-sm-offset-1">
						<?php
						$postslist = get_posts('category_name=sex-dating&numberposts=1&order=DESC&orderby=date');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry home-chunk">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
							<p>By <?php the_author_posts_link(); ?></p>
							<?php the_excerpt(); ?>
							<ul class="post-social">
								<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
						<?php endforeach; ?>
					</div>
					<div class="col-sm-3">
						<?php
						$postslist = get_posts('category_name=sex-dating&numberposts=2&order=DESC&orderby=date&offset=1');
						foreach ($postslist as $post) :
						setup_postdata($post);
						?>
						<div class="entry">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
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
				<div class="row-fluid">
					<div class="col-sm-12">
						<div class="spacer20"></div>
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/sex-dating">See More <i class="fa fa-chevron-right"></i></a></p>
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
					<div class="col-sm-10 col-sm-offset-1">
						<h2><span>Pop</span> <i class="fa fa-flash"></i></h2>
						<div class="row-fluid post-grid">
							<?php
							$counter = 1; //start counter

							$grids = 3; //Grids per row-fluid

							global $query_string; //Need this to make pagination work


							/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
							query_posts($query_string . 'category_name=pop&ignore_sticky_posts=0&posts_per_page=6');


							if(have_posts()) :	while(have_posts()) :  the_post(); 
							?>
							<?php
							//Show the left hand side column
							if($counter == 1) :
							?>
							<div class="col-sm-4">
								<div class="entry">
									<div class="postimage">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
									</div>
					                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
					                <p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
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
								<div class="entry">
									<div class="postimage">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
									</div>
					                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
					                <p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
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
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
								</div>
				                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				                <p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
				                <p>By <?php the_author_posts_link(); ?></p>
				                <ul class="post-social">
									<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								</ul>
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
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/pop">See More <i class="fa fa-chevron-right"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- STYLE SECTION -->

	<div class="style">
		<div class="style-in nopad">
			<div class="container-fluid nopad">
				<div class="row-fluid">
					<div class="col-sm-7 col-sm-offset-1 pad20">
						<div class="row-fluid">
							<div class="col-sm-12">
								<h2>Style <span><i class="fa fa-scissors"></i></span></h2>
							</div>
						</div>
						<div class="row-fluid">
							<div class="col-sm-12 nopad">
							<?php echo do_shortcode( '[new_royalslider id="2"]' ); ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="col-sm-12 spacer40"></div>
							<div class="col-sm-12">
								<a class="btn pull-right" href="<?php bloginfo('url'); ?>/category/style">See More</a>
							</div>
							<div class="col-sm-12 spacer40"></div>
							<hr>
						</div>
						<h2>Beauty <span><i class="fa fa-bomb"></i></span></h2>
						<div class="row-fluid post-grid">
							<?php
							$counter = 1; //start counter

							$grids = 2; //Grids per row-fluid

							global $query_string; //Need this to make pagination work


							/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
							query_posts($query_string . 'category_name=beauty&ignore_sticky_posts=0&posts_per_page=4');


							if(have_posts()) :	while(have_posts()) :  the_post(); 
							?>
							<?php
							//Show the left hand side column
							if($counter == 1) :
							?>
							<div class="col-sm-6">
								<div class="entry">
									<div class="postimage">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
									</div>
					                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
					                <p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
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
							<div class="col-sm-6">
								<div class="postimage">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
								</div>
				                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				                <p><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time></p>
				                <p>By <?php the_author_posts_link(); ?></p>
				                <ul class="post-social">
									<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								</ul>
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
						<div class="row-fluid">
							<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/beauty">Read More</a></p>
						</div>
					</div>
					<div class="col-sm-4 nopad">
						<div class="darlings pad20">
							<div class="brand"></div>
							<h1 class="text-center"><span>Darlings</span></h1>
							<?php
							$postslist = get_posts('category_name=models&numberposts=4&order=DESC&orderby=date&offset=0');
							foreach ($postslist as $post) :
							setup_postdata($post);
							?>
							<div class="entry text-left">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?>
									<h4><?php the_title(); ?></h4>
								</a>
							</div>
							<?php endforeach; ?>
							<div class="row-fluid">
								<div class="spacer20"></div>
								<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/models">Read More</a></p>
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
		<div class="container-fluid nopad">
			<div class="row-fluid">
				<div class="nopad col-sm-12">
					<?php echo do_shortcode( '[new_royalslider id="3"]' ); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid nopad">
		<div class="row-fluid">
	<!-- 		<div id="kitten-anchor"></div>
			<div class="col-sm-4 nopad">
				<div id="kitten-posts">
					<div class="brand"></div>
					<h2 class="text-center">Models</h2>
					<?php
					$postslist = get_posts('tag_name=kitten&numberposts=3&order=DESC&orderby=rand&offset=0');
					foreach ($postslist as $post) :
					setup_postdata($post);
					?>
					<div class="entry text-left">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('medium'); ?>
							<h4><?php the_title(); ?></h4>
						</a>
					</div>
					<?php endforeach; ?>
					<div class="row-fluid">
						<div class="spacer20"></div>
						<p class="text-center"><a class="btn" href="<?php echo get_tag_link('kitten'); ?>">Read More</a></p>
					</div>
				</div>
			</div> -->
			<div id="content" class="col-sm-10 col-sm-offset-1">
				<h2>Latest <span>Stories</span> <i class="fa fa-diamond"></i></h2>
				<hr>
				<ol>
				<?php query_posts($query_string . 'posts_per_page=4&offset=8'); ?>
				<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<li class="post">
						<article class="row-fluid">
							<div class="nopad col-sm-4">
								<div class="catlinks"><?php the_category(); ?></div>
								<div class="thumbnail">
									<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('large'); ?></a>
								</div>
							</div>
							<div class="nopadright col-sm-8">
								<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_date(); ?> <?php the_time(); ?></time> • By <?php the_author_posts_link(); ?>
								<div class="padtop10"></div>
								<p><?php the_excerpt(); ?></p>
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
				echo do_shortcode('[ajax_load_more post_type="post" category__not_in="mag, models" button_label="More Posts" offset="12"]');
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