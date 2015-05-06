<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<p><i class="fa fa-scissors"></i> By <?php the_author_posts_link(); ?></p>
		<p class="byline"><i class="fa fa-bomb"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>">Posted on <?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
		<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
		
		<div class="spacer20"></div>
		<?php the_post_thumbnail('large'); ?>
		<div class="spacer20"></div>
		<?php the_content(); ?>
		<div class="spacer20"></div>
		
		<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
		<h3>About <?php echo get_the_author() ; ?></h3>
		<?php the_author_meta( 'description' ); ?>
		<?php endif; ?>
		<ul class="hidden-sm single-social">
			<li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
			<li><h4 class="social-title"><?php the_title(); ?></h4></li>
			<ul id="post-social" class="pull-right post-social">
				<!-- <li><a href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li> -->
				<div class="fb-like" data-href="http://galoremag.com" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
			</ul>
		</ul>
		<p id="slug-<?php the_ID(); ?>" class="hidden slug"><?php the_permalink(); ?></p>
	</article>
<?php endwhile; ?>