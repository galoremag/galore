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
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid nopad">
	<div class="row-fluid">
		<div id="content" class="col-sm-12 container-fluid">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article>
				<?php setPostViews(get_the_ID()); ?>
				
				<div class="row">
					
					<div class="col-sm-8 col-sm-offset-2">

						<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>

						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>

				</div>
				
				<div class="spacer20"></div>

				<!-- Item on List -->

				<?php if(get_field('pic1')) { ?>

					<?php $pic1 = get_field('pic1'); ?>
					
					<div id="1" class="listHero row-fluid" style="background-image: url(<?php echo $pic1['sizes']['large']; ?>)">
						<div class="listHeader container-fluid nopad">
							<div class="col-sm-8 col-sm-offset-2 nopad">
								<?php if(get_field('title1')) { ?>
									<h1>
										<span>
											<?php echo get_field('title1'); ?>
										</span>
									</h1>
								<?php } ?>

								<?php if(get_field('subtitle1')) { ?>
									<h3 class="subtitle">
										<?php echo get_field('subtitle1'); ?>
									</h3>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div class="listBody row">
						<div class="col-sm-8 col-sm-offset-2 nopad">
							<?php if(get_field('desc1')) { ?>
								<p>
									<?php echo get_field('desc1'); ?>
								</p>
							<?php } ?>
						</div>

						<div id="social-links" class="col-sm-8 col-sm-offset-2 nopad">
							<ul id="post-social" class="post-social hidden-xs hidden-sm">
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>

				<?php } ?>

				<!-- Item on List -->

				<?php if(get_field('pic2')) { ?>

					<?php $pic2 = get_field('pic2'); ?>
					
					<div id="4" class="listHero row-fluid" style="background-image: url(<?php echo $pic2['sizes']['large']; ?>)">
						<div class="listHeader container-fluid nopad">
							<div class="col-sm-8 col-sm-offset-2 nopad">
								<?php if(get_field('title2')) { ?>
									<h1>
										<span>
											<?php echo get_field('title2'); ?>
										</span>
									</h1>
								<?php } ?>

								<?php if(get_field('subtitle2')) { ?>
									<h3 class="subtitle">
										<?php echo get_field('subtitle2'); ?>
									</h3>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div class="listBody row">
						<div class="col-sm-8 col-sm-offset-2 nopad">
							<?php if(get_field('desc2')) { ?>
								<p>
									<?php echo get_field('desc2'); ?>
								</p>
							<?php } ?>
						</div>

						<div id="social-links" class="col-sm-8 col-sm-offset-2 nopad">
							<ul id="post-social" class="post-social hidden-xs hidden-sm">
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>

				<?php } ?>

				<!-- Item on List -->

				<?php if(get_field('pic3')) { ?>

					<?php $pic3 = get_field('pic3'); ?>
					
					<div id="4" class="listHero row-fluid" style="background-image: url(<?php echo $pic3['sizes']['large']; ?>)">
						<div class="listHeader container-fluid nopad">
							<div class="col-sm-8 col-sm-offset-2 nopad">
								<?php if(get_field('title3')) { ?>
									<h1>
										<span>
											<?php echo get_field('title3'); ?>
										</span>
									</h1>
								<?php } ?>

								<?php if(get_field('subtitle3')) { ?>
									<h3 class="subtitle">
										<?php echo get_field('subtitle3'); ?>
									</h3>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div class="listBody row">
						<div class="col-sm-8 col-sm-offset-2 nopad">
							<?php if(get_field('desc3')) { ?>
								<p>
									<?php echo get_field('desc3'); ?>
								</p>
							<?php } ?>
						</div>

						<div id="social-links" class="col-sm-8 col-sm-offset-2 nopad">
							<ul id="post-social" class="post-social hidden-xs hidden-sm">
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>

				<?php } ?>

				<!-- Item on List -->

				<?php if(get_field('pic4')) { ?>

					<?php $pic4 = get_field('pic4'); ?>
					
					<div id="4" class="listHero row-fluid" style="background-image: url(<?php echo $pic4['sizes']['large']; ?>)">
						<div class="listHeader container-fluid nopad">
							<div class="col-sm-8 col-sm-offset-2 nopad">
								<?php if(get_field('title4')) { ?>
									<h1>
										<span>
											<?php echo get_field('title4'); ?>
										</span>
									</h1>
								<?php } ?>

								<?php if(get_field('subtitle4')) { ?>
									<h3 class="subtitle">
										<?php echo get_field('subtitle4'); ?>
									</h3>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div class="listBody row">
						<div class="col-sm-8 col-sm-offset-2 nopad">
							<?php if(get_field('desc4')) { ?>
								<p>
									<?php echo get_field('desc4'); ?>
								</p>
							<?php } ?>
						</div>

						<div id="social-links" class="col-sm-8 col-sm-offset-2 nopad">
							<ul id="post-social" class="post-social hidden-xs hidden-sm">
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>

				<?php } ?>

				<!-- End Items on List -->

				<ul class="single-social">
					<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<!-- <li class="pad10">
						<div class="fb-like hidden-xs hidden-sm" data-href="http://galoremag.com" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</li> -->
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul>
			</article>
			<?php endwhile; ?>
			<hr>
			<h2 class="text-center">Gimme More <i class="fa fa-scissors"></i> <span>Style</span></h2>
			<div class="spacer20"></div>
			<ul id="related-posts" class="row-fluid">

				<!-- Special Post -->

				<?php
					$adlist = get_posts('numberposts=1&order=DESC&orderby=date&offset=0&post_type=sponsor');
					foreach ($adlist as $post) :
					setup_postdata($post);
				?>

				<li class="post specialMd">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="specialFlagMd">Presenting </i><?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
							<div class="thumb">
								<a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="<?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4 class="hidden-xs">Share this post</h4>
							<ul class="post-social pull-left hidden-xs">
								<li><a class="share-email" href="/cdn-cgi/l/email-protection#2365514a464d4763504c4e46544b4651460d404c4e1c505641494640571e1f1c534b5303574b467c574a574f460b0a18031c1d05424e5318414c475a1e1f1c534b53X the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
								<li class="visible-xs"><h4>Share This Post</h4></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="Permalink to <?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
							<p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

							<div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

							<p class="pull-left hidden-xs"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" target="_blank" >Full Story <i class="fa fa-mars"></i></a></p>

							<img class="specialPixel" height='1' width='1' src='https://tracking.jetpackdigital.com/jpt?sid=1242&oid=5697&lid=28251&csid=&c=0&itt=EOTgSDNteBPGBZseExTPjt3KGpZXpe1WEEYEwE1Y%2FTII51KPC7NhewUsrcjb%2FwYB&ord=[RANDOM]'/>
							<a href='https://tracking.jetpackdigital.com/jpc?sid=1242&oid=5697&lid=28251&csid=&c=0&ict=J4USQfJyvBlMu2SRh3iQGGbxFnwXyP0RFM%2BYPCbvTs%2F5ejjlVlrQ7BuFo%2B2HhxazyywI0bIkDPiwooLpuEJwqSs35ce8191aKY9dlUH0AMug7cTRufjy%2FQ%3D%3D&ord=[RANDOM]'/></a>

						</div>
					</article>
				</li>

				<?php endforeach; ?>

			    <?php wp_reset_postdata(); ?>

				<?php $post_ids = array(); $loop = new WP_Query( array( 'posts_per_page' => 4, 'orderby' => 'date' ) ); ?>

			    <?php
			    	// if($post_ids){
					// 	//Implode the posts and set a variable to pass to our exclude param.
					// 	$postsNotIn = implode(",", $post_ids);
					// }

					echo do_shortcode('[ajax_load_more orderby="date" category="style" exclude="'.$wp_query->post->ID.'" button_label="Loading"]');
			    ?>
			</ul>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>