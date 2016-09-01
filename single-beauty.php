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
		<div id="content" class="col-md-8 col-sm-12 col-md-offset-2">
			<?php
			if ( have_posts() ) :
				while (have_posts() ) : the_post();
					// replaced with Ajax Load More shortcode
					echo do_shortcode('[ajax_load_more post_type="post" scroll_distance="500" repeater="template_2" previous_post="true" previous_post_id="'. get_the_ID() .'" posts_per_page="1" button_label="Loading..."]');
				endwhile;
			endif;


			// if ( have_posts() ) while ( have_posts() ) : the_post();
			// 	// if($post_ids){
			// 	// 	//Implode the posts and set a variable to pass to our exclude param.
			// 	// 	$postsNotIn = implode(",", $post_ids);
			// 	// }
			// 	echo do_shortcode('[ajax_load_more previous_post="true" previous_post_id="'.get_the_ID().'" orderby="date" category="beauty" exclude="'.get_the_ID().'" button_label="Loading" repeater="template_2" post_type="post"]');
			// 	// echo do_shortcode('[ajax_load_more previous_post="true" previous_post_id="'.$wp_query->post->ID.'" orderby="date" category="beauty" exclude="'.$wp_query->post->ID.'" button_label="Loading" repeater="template_2" post_type="post"]');
			// 	endwhile;
			// 	endif;
			?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
