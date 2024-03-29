<?php
/*
WP Post Template: Fancy List
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
*
        * @package  WordPress
        * @subpackage   Starkers
        * @since        Starkers 4.0
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header-simple' ) ); ?>

<div class="container-fluid nopad">
	<div class="row-fluid">
		<div id="content" class="col-sm-12 container-fluid">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article>
				<?php setPostViews(get_the_ID()); ?>

				<!-- Item on List -->

				<?php if( have_rows('items') ): ?>

					<!-- Intro Item -->
					<div id="fancyItems">

						<div class="listItem">
							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<div class="listHero row-fluid" style="background-image: url(<?php echo $thumb['0']; ?>)">
								<div class="listHeader container-fluid">
									<div class="col-sm-8 col-sm-offset-2 nopad">
										<h1 class="itemTitle">
											<span>
												<?php the_title(); ?>
											</span>
										</h1>
									</div>
									<div class="pad40 col-sm-12 text-center">
										<a class="btn btn-primary" onClick="$.scrollify.next();">Read The List</a>
									</div>
								</div>
							</div>

							<div class="row visible-xs-block">
								<div class="col-sm-8 col-sm-offset-2">
									<?php the_content(); ?>
								</div>
							</div>

							<div class="row listBodyContainer hidden-xs">
								<div class="listBody col-sm-8 col-sm-offset-2 nopad">
									<p>
										<?php echo get_the_content(); ?>
									</p>
								</div>

								<div id="social-links" class="col-sm-8 col-sm-offset-2 nopad">
									<ul id="post-social" class="post-social hidden-xs hidden-sm">
										<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
										<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

						<!-- The rest of the items -->
						<?php while( have_rows('items') ): the_row(); ?>

							<?php
							$title = get_sub_field('title');
							$subtitle = get_sub_field('subtitle');
							$pic = get_sub_field('pic');
							$desc = get_sub_field('desc');
							?>

							<div class="listItem">
								<div class="listHero row-fluid" style="background-image: url(<?php echo $pic; ?>)">
									<a class="listHeroCover"></a>
									<div class="listHeader container-fluid">
										<div class="col-sm-8 col-sm-offset-2 nopad">
											<?php if($title) : ?>
												<a class="itemTitle visible-xs-block" href="javascript:void;">
													<h1>
														<span>
															<?php echo $title; ?>
														</span>
													</h1>
												</a>
												<h1 class="hidden-xs">
													<span>
														<?php echo $title; ?>
													</span>
												</h1>
											<?php endif; ?>

											<?php if($subtitle) : ?>
												<h4 class="subtitle">
													<span><?php echo $subtitle; ?></span>
												</h4>
											<?php endif; ?>

											<a href="javascript:void;" class="listReadMore visible-xs-block"><span>Read More <i class="btr bt-angles-right"></i></span></a>
										</div>
									</div>
								</div>

								<div class="row listBodyContainer">
									<a id="listBodyToggle" class="listBodyToggle visible-xs-block"><i class="btr bt-angles-left"></i></a>
									<div class="listBody col-sm-8 col-sm-offset-2 nopad">
										<?php if($desc) : ?>
											<p>
												<?php echo $desc; ?>
											</p>
										<?php endif; ?>
									</div>

									<div id="social-links" class="col-sm-8 col-sm-offset-2 nopad">
										<ul id="post-social" class="post-social hidden-xs hidden-sm">
											<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
											<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
										</ul>
									</div>
								</div>
							</div>

						<?php endwhile; // while( has_sub_field('items') ): ?>

					</div>

				<?php endif; // if( get_field('items') ): ?>

				<!-- END ITEMS -->

			</article>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<hr></hr>

			<!-- /60899964/Home_Interstitial -->
			<div id='div-gpt-ad-1465835581876-12' class="hidden-xs">
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-12'); });
			</script>
			</div>

			<!-- /60899964/Home_Mobile_Interstitial -->
			<div id='div-gpt-ad-1465835581876-16' class="visible-xs-block">
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-16'); });
			</script>
			</div>

			<div class="everything container">
				<div class="row-fluid">
					<div id="content" class="col-sm-12 nopad">
						<h2 id="stickHead" class="text-center"><i class="fa fa-diamond"></i> More Everything <i class="fa fa-diamond"></i></h2>

						<!-- Special Post -->

						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sponsored-md' ) ); ?>

						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-interstitial' ) ); ?>

						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-oop' ) ); ?>

						<ul class="container-fluid">

							<?php

							$args = array( 'post_type' => 'post', 'showposts' => 2, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => array(get_the_ID()) );

							$postslist = get_posts( $args );

							// $postslist = get_posts('tag=darling&numberposts=4&order=DESC&orderby=date&offset=0');
							foreach ($postslist as $post) : setup_postdata($post);
							$categories = get_the_category($post->ID);
							if ( count( $categories ) > 0 ) {
								$displayed_category = $categories[0]->cat_ID;
								$displayed_category_name = $categories[0]->cat_name;
								$displayed_category_link = get_category_link( $categories[0]->term_id );
								$cat_random_rotation_value = rand(-3, 3);
							}
							?>

							<li class="related post pull-left col-xs-6">
								<div class="container nopad">
									<div class="row-fluid">
										<div class="nopad col-sm-12">
											<?php if( $categories ) : ?>
   				<div class="catlinks catlinks_post_feed" style="transform: rotate(<?php echo $cat_random_rotation_value ?>deg); position: relative; z-index: 2; transform-origin: 0px 0px;">
	  			 <ul class="post-categories">
	   				<li><a class="updated_catlinks_anchor_tag" href="<?php echo $displayed_category_link ?>" rel="category tag"><?php echo 						$displayed_category_name ?></a></li></ul></div>
								<?php endif; ?>
											<div class="thumb">
												<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="nopad col-sm-12">
											<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
											<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
											<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
											<p class="pull-left hidden-xs"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>
										</div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>

						</ul>

						<hr />

						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-one-300x250' ) ); ?>

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
											<li class="visible-xs-block"><h4>Share This Post</h4></li>
										</ul>
									</div>
									<div class="nopadright col-sm-7">
										<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
										<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
										<p class="byline visible-xs-block pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
										<ul class="post-social visible-xs-block">
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
							<?php wp_reset_postdata(); ?>

						</ul>

						<hr />

						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/single-two-300x250' ) ); ?>

						<hr />

					  <!-- Infinite Scroll -->

						<?php
						echo do_shortcode('[ajax_load_more button_label="Loading" offset="32" post_type="post" cache="true" cache_id="8507844530"]');
						?>

						<div class="spacer40"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer-simple','parts/shared/html-footer' ) ); ?>
