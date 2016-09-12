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

				<!-- <div id="listIntro" class="row-fluid">
					<div class="container">
						<div class="col-sm-8 col-sm-offset-2">

							<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>

							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<div class="text-center">
								<a class="btn btn-primary" onClick="$.scrollify.move('#1');">Read The List</a>
							</div>
						</div>
					</div>
				</div>

				<div class="spacer20"></div> -->

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

										<h4 class="subtitle visible-xs">
											<span><?php echo get_the_content(); ?></span>
										</h4>
										<!-- <h4 class="subtitle hidden-xs" style="line-height: 1.5">
											<span><?php echo get_the_excerpt(); ?></span>
										</h4> -->

									</div>
									<div class="pad40 col-sm-12 text-center">
										<a class="btn btn-primary" onClick="$.scrollify.move('#1');">Read The List</a>
									</div>
								</div>
							</div>

							<div class="row listBodyContainer hidden-xs">
								<a id="listBodyToggle" class="listBodyToggle visible-xs"><i class="btr bt-plus"></i></a>
								<div class="listBody col-sm-8 col-sm-offset-2 nopad">
									<p>
										<?php the_content(); ?>
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
											<div class="listHeader container-fluid">
												<div class="col-sm-8 col-sm-offset-2 nopad">
													<?php if($title) : ?>
														<h1 class="itemTitle">
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
												</div>
											</div>

											<!-- <div class="listHeroBody visible-xs">

												<?php if($desc) : ?>
													<h1>
														<?php echo $title; ?>
													</h1>
													<p>
														<?php echo $desc; ?>
													</p>
												<?php endif; ?>

											</div> -->

										</div>

										<div class="row listBodyContainer">
											<a id="listBodyToggle" class="listBodyToggle visible-xs"><i class="btr bt-plus"></i></a>
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



				<!-- End Items on List -->

			</article>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
