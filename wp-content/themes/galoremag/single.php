<?php $post = $wp_query->post;
// http://wordpresshero.com/tricks/different-single-post-pages-in-wordpress.html/

if ( in_category('collections') ) {
  include(TEMPLATEPATH . '/single-collections.php'); }
//elseif ( in_category('18') ) {
    // include(TEMPLATEPATH . '/single-video.php'); }
else {
    include(TEMPLATEPATH . '/single-default.php');
  }
?>
