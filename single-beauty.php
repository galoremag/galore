<?php
/**
* The Template for displaying all single posts
*
* Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
*
	* @package 	WordPress
	* @subpackage 	Starkers
		* @since 		Starkers 4.0
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid nopad">
	<div class="row-fluid">
		<div id="content" class="col-md-8 col-sm-12">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article>
				<?php setPostViews(get_the_ID()); ?>
				<div class="single-featured-image">
					<div class="catlinks"><?php the_category(); ?></div>
					<?php the_post_thumbnail('large'); ?>
				</div>
				<h1><?php the_title(); ?></h1>
				<div id="social-links">
					<ul id="post-social" class="post-social hidden-xs hidden-sm">
						<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
						<li><a class="share-twitter" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>

				<p class="byline"><i class="fa fa-bomb"></i> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> By <?php the_author_posts_link(); ?></p>
				<?php edit_post_link('EDIT. THIS. PIECE.', '<p>', '</p>'); ?>
				<div class="spacer20"></div>
				<?php the_content(); ?>
				<div class="spacer20"></div>
				<div class="author-info row hidden-xs">
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-bio col-md-8 col-md-offset-2 text-right">
						<h3>About The Author: <span><?php echo get_the_author() ; ?></span></h3>
						<?php the_author_meta( 'description' ); ?>
					</div>
					<div class="author-pic col-md-2">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="spacer20"></div>
				<!-- <ul class="single-social">
					<li><a class="share-facebook" href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i> &nbsp;<h4 class="nomarg">Share on Facebook</h4></a></li>
					<li class="pull-right"><h4 class="social-title"><?php the_title(); ?></h4></li>
				</ul> -->
			</article>
			<?php endwhile; ?>
			<!-- <hr> -->

			<!­­ cmnUNT | Begin ad tag ­­>
			<div id="cmn_ad_tag_content" class="container-fluid nopad">
				<script type="text/javascript">cmnUNT('100x100', tile_num++);</script>
			</div>
			<!­­ cmnUNT | End ad tag ­­>

			<h2 class="text-center">Gimme More <i class="fa fa-bomb"></i> <span>Beauty</span></h2>
			<div class="spacer20"></div>
			<hr />
			<div class="spacer20"></div>

				<!-- Special Post -->

				<!­­ cmnUNT | Begin ad tag ­­>
				<div id="cmn_ad_tag_content" class="text-center">
					<script type="text/javascript">cmnUNT('300x250', tile_num++);</script>
				</div>
				<!­­ cmnUNT | End ad tag ­­>

				<hr />

			    <?php
			    	// if($post_ids){
					// 	//Implode the posts and set a variable to pass to our exclude param.
					// 	$postsNotIn = implode(",", $post_ids);
					// }
					echo do_shortcode('[ajax_load_more previous_post="true" previous_post_id="'.$wp_query->post->ID.'" exclude="'.$wp_query->post->ID.'" post_type="post" button_label="Loading" category="beauty" repeater="template_1"]');
					// echo do_shortcode('[ajax_load_more orderby="date" offset="4" category="beauty" exclude="'.$wp_query->post->ID.'" button_label="Loading"]');
			    ?>
		</div>

	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
