<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-10 col-sm-offset-1">

			<h2 class="text-center">You got lost, it's ok</h2>

			<div class="text-center">
				<div id="_giphy_tv"></div>
				<script>
				var _giphy_tv_tag="sexy";
				var g = document.createElement('script'); g.type = 'text/javascript'; g.async = true;
				g.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'giphy.com/static/js/widgets/tv.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(g, s);
				</script>
			</div>

			<div class="spacer40"></div>
			<h2 class="text-center">Hot <span>Stories</span></h2>
			<?php 
			echo do_shortcode('[ajax_load_more post_type="post" orderby="date" offset="4"]');
			?>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>