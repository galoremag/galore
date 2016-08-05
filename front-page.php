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

<img class="specialPixel" SRC="https://ad.doubleclick.net/ddm/ad/N9556.2353504GALORE/B9575230.132670120;sz=1x1;ord=[timestamp];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement" />
<a href="https://ad.doubleclick.net/ddm/clk/305312944;132670120;o">

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
				$adlist = get_posts('numberposts=1&order=DESC&orderby=date&offset=0&post_type=sponsor');
				foreach ($adlist as $post) :
				setup_postdata($post);
			?>

			<div class="glide special">
				<a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" target="_blank"><?php the_post_thumbnail('thumbnail'); ?></a>
				<div class="specialFlagSm"></i><?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
				<a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" target="_blank"><h3><?php the_title(); ?></h3></a>
				<!-- <h4>
					<?php
					if (get_post_meta($post->ID,'tagline')) {
					echo get_post_meta($post->ID,'tagline');
					}
					?>
				</h4> -->
				<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

				<img class="specialPixel" SRC="https://ad.doubleclick.net/ddm/ad/N9556.2353504GALORE/B9575230.132669759;sz=1x1;ord=[timestamp];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement" />
				<a href="https://ad.doubleclick.net/ddm/clk/305312745;132669759;n"/></a>
			</div>

			<?php endforeach; ?>

		  <?php wp_reset_postdata(); ?>

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

			<?php wp_reset_postdata(); ?>

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
						'category_name' => 'beauty,fashion',
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

					<!­­ cmnUNT | Begin ad tag ­­>
					<div id="cmn_ad_tag_content" class="snippet text-center">
						<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
					</div>
					<!­­ cmnUNT | End ad tag ­­>

					<?php
					$args = array( 'category_name' => 'health', 'post_type' => 'post', 'showposts' => 2, 'orderby' => 'date', 'order' => 'DESC', 'offset' => 1 );

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

	<!­­ cmnUNT | Begin ad tag ­­>
	<div id="cmn_ad_tag_content" class="container-fluid nopad">
		<script type="text/javascript">cmnUNT('100x100', tile_num++);</script>
	</div>
	<!­­ cmnUNT | End ad tag ­­>

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

							<!­­ cmnUNT | Begin ad tag ­­>
							<div id="cmn_ad_tag_content" class="thumbnail col-md-4 text-center">
								<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
							</div>
							<!­­ cmnUNT | End ad tag ­­>

						</div>
					</div>

					<div class="col-sm-12">
						<div class="spacer20"></div>
						<p class="text-center"><a class="btn" href="<?php bloginfo('url'); ?>/category/pop"><i class="fa fa-flash"></i>&nbsp; Make It Pop &nbsp;<i class="fa fa-flash"></i></a></p>
					</div>
				</div>
			</div>

	<div class="everything container">
		<div class="row-fluid">
			<div id="content" class="col-sm-12 nopad">
				<h2 id="stickHead" class="text-center"><i class="fa fa-diamond"></i> More Everything <i class="fa fa-diamond"></i></h2>
				<hr>

				<!-- Special Post -->

				<?php
					$adlist = get_posts('numberposts=1&order=DESC&orderby=date&offset=0&post_type=sponsor');
					foreach ($adlist as $post) :
					setup_postdata($post);
				?>

				<li class="post specialMd">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="specialFlagMd"></i><?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
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
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>