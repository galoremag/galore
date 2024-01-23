<?php // Get the Page Title, then encode it ?>
<?php $title = get_post_field('post_title', $post_id, 'raw'); $title = urlencode($title); ?>
<?php // Get the URL, then encode it ?>
<?php $url = get_permalink(); $url = urlencode($url); ?>
<?php // Get the Feature Image Thumbnail, get just the first?, then encode it ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); $thumburl = $thumb['0']; $thumburl = urlencode($thumburl); ?>
<ul class="share">
  <li><strong>Be social:</strong></li>
  <li><a class="share-facebook" href="//www.facebook.com/sharer.php?u=<?php echo $url; ?>" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF610;</i> <span>Share</span></a></li>
  <li><a class="share-twitter" href="//twitter.com/share?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=TheGaloreMag" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF611;</i> <span>Tweet</span></a></li>
  <li><a class="share-google" href="//plus.google.com/share?url=<?php echo $url; ?>" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF613;</i> <span>Share</span></a></li>
  <li><a class="share-pinterest" href="//pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $thumburl; ?>&description=<?php echo $title; ?>" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF650;</i> <span>Pin</span></a></li>
</ul><!--/social-->
