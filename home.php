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
				<div class="hero-slider col-md-10 col-md-offset-1">
					<?php echo do_shortcode( '[new_royalslider id="1"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="latest-container">
	<h2 class="text-center verPad20"><a href="the-latest/"><i class="fa fa-flash"></i> The Daily Dish <i class="fa fa-flash"></i></a></h2>
	<div id="latest">

		<div id="glides" class="ps-container ps-active-x">

			<?php sm_unit(); ?>

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
				<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
			</div>
			<?php endforeach; ?>

			<?php wp_reset_postdata(); ?>

			<!-- SECOND NEEDED? -->

		</div>
	</div>
</div>

<!-- <div class="text-center">
	<div class="spacer20"></div>
	<a class="btn centerBlock" href="the-latest"><i class="fa fa-bomb"></i>&nbsp; Go Crazy &nbsp;<i class="fa fa-bomb"></i></a>
	<div class="spacer20"></div>
</div> -->

<div id="home-container">

	<!-- FASHION SECTION -->

	<div class="home-fashion nopad container">
		<div class="row-fluid home-fashion-in nopad">
			<div class="col-md-8 pad40">
				<div class="row-fluid">
					<div class="col-sm-12 nopad">
						<h2>Fashion + Beauty <i class="fa fa-scissors"></i></h2>
					</div>
					<div class="col-sm-12 spacer20"></div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12 nopad">
					<?php echo do_shortcode( '[new_royalslider id="1"]' ); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12 spacer40"></div>
				</div>
				<div class="row-fluid post-grid">

					<!-- 300x250 unit -->
					<div class="thumbnail col-sm-6 horpad10">
						<div class="nopad">

								<!-- /60899964/Home_Mobile_300x250 -->
								<div id='div-gpt-ad-1465835581876-13' style='height:250px; width:300px;' class="visible-xs">
								<script type='text/javascript'>
								googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-13'); });
								</script>
								</div>

								<!-- /60899964/Home_300x250 -->
								<div id='div-gpt-ad-1465835581876-9' style='height:250px; width:300px;' class="hidden-xs">
								<script type='text/javascript'>
								googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-9'); });
								</script>
								</div>

						</div>
					</div>

					<!-- Posts -->
					<?php
					$counter = 1; //start counter

					$grids = 1; //Grids per row-fluid

					$args = array(
						'category_name' => 'beauty,fashion',
						'showposts' => 1,
						'orderby' => 'date',
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1
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

					<?php wp_reset_postdata(); ?>

					<!-- 2nd row -->
					<?php
					$counter = 1; //start counter

					$grids = 2; //Grids per row-fluid

					$args = array(
						'category_name' => 'beauty,fashion',
						'showposts' => 2,
						'orderby' => 'date',
						'offset' => 4,
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 2
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
					<!-- <div class="brand"></div> -->
					<h2 class="text-center">Health + Fitness <i class="fa fa-heartbeat"></i></h2>
					<?php
					$args = array( 'category_name' => 'health', 'post_type' => 'post', 'showposts' => 1, 'orderby' => 'date', 'order' => 'DESC' );

					$postslist = get_posts( $args );

					// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
					foreach ($postslist as $post) : setup_postdata($post);
					?>
					<div class="snippet">
						<a class="postimage" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
						<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
					</div>
					<?php endforeach; ?>

						<!-- /60899964/Home_300x250_970x250_pos2 -->
						<div id='div-gpt-ad-1465835581876-10' class="snippet hidden-xs">
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-10'); });
						</script>
						</div>

						<!-- /60899964/Home_Mobile_300x250_pos2 -->
						<div id='div-gpt-ad-1465835581876-14' style='height:250px; width:300px;' class="snippet visible-xs">
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-14'); });
						</script>
						</div>

					<?php
					$args = array( 'category_name' => 'health', 'post_type' => 'post', 'showposts' => 2, 'orderby' => 'date', 'order' => 'DESC', 'offset' => 1 );

					$postslist = get_posts( $args );

					// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
					foreach ($postslist as $post) : setup_postdata($post);
					?>
					<div class="text-left">
						<a class="postimage" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
						<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
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

	<!-- 100x100 -->

	<!-- /60899964/Home_Mobile_OOP -->
	<div id='div-gpt-ad-1467924264305-2' class="visible-xs">
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467924264305-2'); });
	</script>
	</div>

	<!-- /60899964/Home_OOP -->
	<div id='div-gpt-ad-1467924264305-3' class="hidden-xs">
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467924264305-3'); });
	</script>
	</div>

	<!-- SEX + DATING SECTION -->

	<div class="sex-dating nopad">
		<div class="sex-dating-in nopad">
			<div class="container nopad">
				<div class="col-sm-12 verPad40">
					<div class="row-fluid">
						<div class="col-sm-12">
							<h2>Sex + Dating <i class="fa fa-heart"></i></h2>
						</div>
					</div>
					<div class="row-fluid">
						<div class="col-sm-8">
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
						<div class="col-sm-4">
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
	</div>

	<!-- POP SECTION -->

	<div class="pop">
		<div class="pop-in">
			<div class="container nopad">
				<div class="row-fluid">
					<div class="col-sm-12">
						<h2>Guilty Pleasure <i class="fa fa-star"></i></h2>
						<h3>Best of Pop Culture</h3>
						<div class="spacer20"></div>
						<div class="row post-grid">
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

						<div class="row post-grid">
							<?php
							$counter = 1; //start counter

							$grids = 2; //Grids per row-fluid

							/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
							query_posts($query_string . 'category_name=pop&ignore_sticky_posts=0&posts_per_page=2&offset=3');


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
									<li><a href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
									<li><a href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
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

							<!-- /60899964/Home_Mobile_300x250_pos3 -->
							<div id='div-gpt-ad-1465835581876-15' style='height:250px; width:300px;' class="thumbnail col-sm-4 visible-xs">
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-15'); });
							</script>
							</div>

							<!-- /60899964/Home_300x250_970x250_pos3 -->
							<div id='div-gpt-ad-1465835581876-11' class="thumbnail col-sm-4 hidden-xs">
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-11'); });
							</script>
							</div>

						</div>
					</div>

					<div class="col-sm-12">
						<div class="spacer20"></div>
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/pop"><i class="fa fa-flash"></i>&nbsp; Make It Pop &nbsp;<i class="fa fa-flash"></i></a></p>
					</div>
				</div>
			</div>

			<!-- /60899964/Home_Interstitial -->
			<div id='div-gpt-ad-1465835581876-12' class="hidden-xs">
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-12'); });
			</script>
			</div>

			<!-- /60899964/Home_Mobile_Interstitial -->
			<div id='div-gpt-ad-1465835581876-16' class="visible-xs">
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-16'); });
			</script>
			</div>

			<div class="everything container">
				<div class="row-fluid">
					<div id="content" class="col-sm-12 nopad">
						<h2 id="stickHead" class="text-center"><i class="fa fa-diamond"></i> More Everything <i class="fa fa-diamond"></i></h2>
						<hr>

						<!-- Special Post -->
						<?php md_unit(); ?>

						<hr />

						<ul class="alm-listing alm-ajax">

							<?php
							$args = array( 'post_type' => 'post', 'showposts' => 4, 'orderby' => 'date', 'order' => 'DESC' );

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

						<!-- /60899964/Home_300x250_970x250_pos4 -->
						<div id='div-gpt-ad-1467230007625-0' class="hidden-xs text-center">
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467230007625-0'); });
						</script>
						</div>

						<!-- /60899964/Home_Mobile_300x250_pos4 -->
						<div id='div-gpt-ad-1467230007625-1' style='height:250px; width:300px;' class="visible-xs text-center">
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467230007625-1'); });
						</script>
						</div>

						<hr />

					  <!-- Infinite Scroll -->

						<?php
						echo do_shortcode('[ajax_load_more button_label="Loading" offset="32" post_type="post"]');
						?>

						<div class="spacer40"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
