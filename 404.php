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
		<div id="content" class="col-sm-8 col-sm-offset-2">

			<h2>You got lost, it's ok</h2>

			<div class="text-center">
				<div style="max-width: 500px; margin: 0 auto; display: inline;" id="_giphy_10FGpRQr33JBKw"></div><script>var _giphy = _giphy || []; _giphy.push({id: "10FGpRQr33JBKw",w: 500, h: 282});var g = document.createElement("script"); g.type = "text/javascript"; g.async = true;g.src = ("https:" == document.location.protocol ? "https://" : "http://") + "giphy.com/static/js/widgets/embed.js";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(g, s);</script>
			</div>

			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>