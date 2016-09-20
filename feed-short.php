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
	// Setup post data.
	$pid     = $post->ID;
	$tags    = wp_get_post_tags( $pid );
	$tag_ids = array();
	// Loop through post tags.
	foreach ( $tags as $individual_tag ) {
		$tag_ids[] = $individual_tag->term_id;
	}
	// Execute WP_Query.
	$related_by_tag = new WP_Query( array(
		'tag__in'          => $tag_ids,
		'post__not_in'     => array( $pid ),
		'posts_per_page'   => 3,
	) );
	// Loop through posts and build HTML.
	if ( $related_by_tag->have_posts() ) :
		echo 'Related Stories:<br />';
			while ( $related_by_tag->have_posts() ) : $related_by_tag->the_post();
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
		<snf:logo><url><?php echo get_stylesheet_directory_uri(); ?>/images/galore-rss.jpg</url></snf:logo>
		<title><?php bloginfo_rss( 'name' ); wp_title_rss(); ?></title>
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
				<content:encoded>
					<![CDATA[<?php echo the_excerpt_rss(); echo $postlink; echo my_rss_related(); ?>]]>
				</content:encoded>

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
