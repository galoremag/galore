<?php
/*
Single Post Template: NYFW
Description: This part is optional, but helpful for describing the Post Template
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="single-content" class="col-sm-8 col-sm-offset-1">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post">
					<div id="social-links">
						<ul id="post-social" class="post-social">
							<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<p class="byline"><i class="fa fa-flash"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>">Posted on <?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
					<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
					
					<div class="spacer20"></div>

					<p class="text-center"><iframe src="https://vds.rightster.com/v/01yzm6yhx2qm6p?target=iframe&amp;autoplay=0&amp;show_title=1" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></p>

					<div class="spacer20"></div>
					<?php the_content(); ?>
					<div class="spacer20"></div>

					<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					<h3>About <?php echo get_the_author() ; ?></h3>
					<?php the_author_meta( 'description' ); ?>
					<?php endif; ?>

					<!-- DISQUS -->
					<!-- <?php comments_template( '', true ); ?> -->
					<!-- <button class="comments_trigger">Comments</button> -->
					<div class="comments_container" id="comments_container_<?php the_ID(); ?>">
						<div id="disqus_thread"></div>
					</div>

					<!--  RELATED POSTS  -->

					<ul class="related-single row-fluid">
					<?php
					//for use in the loop, list 3 post titles related to first tag on current post
					$post = get_the_ID();
					$tags = wp_get_post_tags($post);
					if ($tags) {
					$first_tag = $tags[0]->term_id;
					$args=array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post),
					'posts_per_page'=>3
					);
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<li class="pull-left col-sm-4">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<div class="thumbnail-md"><?php the_post_thumbnail('medium'); ?></div>
							<h3><?php the_title(); ?></h3>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y'); ?></time>
						</a>
					</li>
					<?php endwhile; } wp_reset_query(); } ?>
					</ul>

					<!-- SOCIAL FOOTER  -->
					<ul class="hidden-sm single-social">
						<li><a id="fb-single" href="#" target="popup"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
						<li><h4 class="social-title"><?php the_title(); ?></h4></li>
						<ul id="post-social" class="pull-right post-social">
							<!-- <li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li> -->
							<div class="fb-like" data-href="http://galoremag.com" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
						</ul>
					</ul>

				</article>
			<?php endwhile; ?>
			<div class="spacer20"></div>
			<!-- <hr> -->
			<nav class="navigation post-navigation" role="navigation">
				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyfifteen' ) . '</span> %title' ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyfifteen' ) . '</span>' ); ?></span>
			</nav>
		</div>
		<div id="related" class="col-sm-2 well hidden-md">
			<h2>Trending</h2>
			<?php
			//for use in the loop, list 5 post titles related to first tag on current post
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
			$first_tag = $tags[0]->term_id;
			$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5
			);
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<div class="thumbnail"><?php the_post_thumbnail('medium'); ?></div>
				<h3><?php the_title(); ?></h3>
			</a>
			<?php endwhile; } wp_reset_query(); } ?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>