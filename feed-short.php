<?php
/**
 * Customs RSS template with related posts.
 *
 * Place this file in your theme's directory.
 *
 * @package sometheme
 * @subpackage theme
 */
/**
 * Get related posts based on tags.
 *
 * THIS IS OPTIONAL!
 */
function my_rss_related() {
	global $post;
	$cat_ID = get_the_category($post->ID);
	$cat_ID = $cat_ID[0]->cat_ID;
	$this_post = $post->ID;

	$args = array( 'category_in' => $cat_ID, 'post_type' => 'post', 'posts_per_page' => 2, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => array($this_post) );

	$related_by_cat = get_posts( $args );
	// Loop through posts and build HTML.
	if ( $related_by_cat->have_posts() ) :
		echo 'Related Stories:<br />';
			while ( $related_by_cat->have_posts() ) : $related_by_cat->the_post();
				echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br />';
			endwhile;
		else :
			echo '';
	endif;
	wp_reset_postdata();
}
/**
 * Feed defaults.
 */
header( 'Content-Type: ' . feed_content_type( 'rss-http' ) . '; charset=' . get_option( 'blog_charset' ), true );
$frequency  = 1;        // Default '1'. The frequency of RSS updates within the update period.
$duration   = 'hourly'; // Default 'hourly'. Accepts 'hourly', 'daily', 'weekly', 'monthly', 'yearly'.
$postlink   = '<br /><a href="' . get_permalink() . '">See the rest of the story at mysite.com</a><br /><br />';
$email      = get_the_author_meta( 'email');
$author     = get_the_author();
$postimages = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
// Check for post image. If none, fallback to a default.
$postimage = ( $postimages ) ? $postimages[0] : get_stylesheet_directory_uri() . '/images/default.jpg';
/**
 * Start RSS feed.
 */
echo '<?xml version="1.0" encoding="' . get_option( 'blog_charset' ) . '"?' . '>'; ?>

<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:media="http://search.yahoo.com/mrss/"
	xmlns:snf="http://www.smartnews.be/snf"
	<?php do_action( 'rss2_ns' ); ?>
>

<script type='text/javascript'>

		  googletag.cmd.push(function() {
			googletag.defineSlot('/60899964/Home_300x250', [300, 250], 'div-gpt-ad-1465835581876-9').addService(googletag.pubads());

		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().collapseEmptyDivs();
		    googletag.pubads().setTargeting('Category', []).setTargeting('Article', []);
		    googletag.enableServices();
		  });
		</script>
		<!-- END DFP script -->

	<!-- RSS feed defaults -->
	<channel>
		<snf:logo><url><?php echo get_stylesheet_directory_uri(); ?>/images/galore-logo-short-straight-black-rss.jpg</url></snf:logo>
		<title><?php wp_title_rss(); ?></title>
		<link><?php bloginfo_rss( 'url' ) ?></link>
		<description><?php bloginfo_rss( 'description' ) ?></description>
		<lastBuildDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></lastBuildDate>
		<language><?php bloginfo_rss( 'language' ); ?></language>
		<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', $duration ); ?></sy:updatePeriod>
		<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', $frequency ); ?></sy:updateFrequency>
		<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />


		<?php do_action( 'rss2_head' ); ?>

		<!-- Start loop -->
		<?php while( have_posts() ) : the_post(); ?>

			<item>
				<title><?php the_title_rss(); ?></title>
				<link><?php the_permalink_rss(); ?></link>
				<guid isPermaLink="false"><?php the_guid(); ?></guid>
				<author><?php echo $email ?><?php echo ' (' . $author . ')' ?></author>
				<image>
					<url><?php echo esc_url( $postimage ); ?>"/></url>
				</image>
				<pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ); ?></pubDate>

				<!-- Echo content and related posts -->
				<?php if (get_option('rss_use_excerpt')) : ?>
						<description><![CDATA[<?php the_excerpt_rss(); echo $postlink; echo my_rss_related(); ?>]]></description>
				<?php else : ?>
						<description><![CDATA[<?php the_excerpt_rss(); echo $postlink; echo my_rss_related(); ?>]]></description>
					<?php $content = get_the_content_feed('rss2'); ?>
					<?php if ( strlen( $content ) > 0 ) : ?>
						<content:encoded><![CDATA[<?php echo $content; echo $postlink; echo my_rss_related(); ?>]]></content:encoded>
					<?php else : ?>
						<content:encoded><![CDATA[<?php the_excerpt_rss(); echo $postlink; echo my_rss_related(); ?>]]></content:encoded>
					<?php endif; ?>
				<?php endif; ?>

				<!-- Advertisements -->

				<snf:advertisement>
				<snf:adcontent>
					<script type="text/javascript">
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-9'); });
					</script>
				</snf:adcontent>
				</snf:advertisement>

			</item>

		<?php endwhile; ?>
		<!-- End loop -->
	</channel>
</rss>
