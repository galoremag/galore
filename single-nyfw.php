<?php
/*
Single Post Template: NYFW
Description: This part is optional, but helpful for describing the Post Template
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-8 col-sm-offset-2">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article>
				<div id="social-links">
					<ul id="post-social" class="post-social">
						<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				<h3><?php the_title(); ?></h3>
				<p>By <?php the_author_posts_link(); ?></p>

				<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
				
				<div class="spacer20"></div>

				<p class="text-center"><iframe src="https://vds.rightster.com/v/01yzm6yhx2qm6p?target=iframe&amp;autoplay=0&amp;show_title=1" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></p>

				<div class="spacer20"></div>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				<h3>About <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>
				<ul class="hidden-sm single-social">
					<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<li><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul>
				<?php comments_template( '', true ); ?>

			</article>
			<?php endwhile; ?>

			<hr>
			<h2 class="text-center">Gimme <span>More</span> NYFW <i class="fa fa-neuter"></i></h2>

			<div id="related-posts" class="row-fluid">
				<?php 
				echo do_shortcode('[ajax_load_more category="nyfw" post__not_in="'.$post->ID.'"]');
				?>
			</div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>