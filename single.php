<?php $post = $wp_query->post;
// http://wordpresshero.com/tricks/different-single-post-pages-in-wordpress.html/

if ( in_category('style') ) {
  include(TEMPLATEPATH . '/single-style.php'); }
elseif ( in_category('beauty') ) {
    include(TEMPLATEPATH . '/single-default.php'); }
elseif ( in_category('sex-advice') ) {
    include(TEMPLATEPATH . '/single-default.php'); }
elseif ( in_category('fitness') ) {
    include(TEMPLATEPATH . '/single-default.php'); }
elseif ( in_category('pop') ) {
    include(TEMPLATEPATH . '/single-default.php'); }
else {
    include(TEMPLATEPATH . '/single-default.php');
  }
?>
