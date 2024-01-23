<?php // Get the Page Title, then encode it ?>
<?php $title = get_post_field('post_title', $post_id, 'raw'); $title = urlencode($title); ?>
<?php // Get the URL, then encode it ?>
<?php $url = get_permalink(); $url = urlencode($url); ?>
<?php // Get the Feature Image Thumbnail, get just the first?, then encode it ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); $thumburl = $thumb['0']; $thumburl = urlencode($thumburl); ?>
<div id="social-floating" class="social-floating">
  <ul>
    <li class="fbshare">
      <a target="_blank" href="//www.facebook.com/sharer.php?u=<?php echo $url; ?>" data-action="share/facebook/share" rel="nofollow"><span class="ss-icon ss-social-regular">&#xF610;</span></a>
    </li>
    <li class="tweet">
      <a target="_blank" href="//twitter.com/share?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=TheGaloreMag" rel="nofollow" data-action="share/twitter/tweet"><span class="ss-icon ss-social-regular">&#xF611;</span></a>
    </li>
    <li class="google"><a target="_blank" data-action="share/email" href="//plus.google.com/share?url=<?php echo $url; ?>" rel="nofollow"><span class="ss-icon ss-social-regular">&#xF613;</span></a></li>
    <li class="pin">
      <a target="_blank" href="//pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $thumburl; ?>&description=<?php echo $title; ?>" data-action="share/pinterest/pin" rel="nofollow"><span class="ss-icon ss-social-regular">&#xF650;</span></a>
    </li>
  </ul>
</div>
