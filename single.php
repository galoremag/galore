<?php $post = $wp_query->post;
// http://wordpresshero.com/tricks/different-single-post-pages-in-wordpress.html/

if ( in_category('fashion') ) {
  	include(TEMPLATEPATH . '/single-fashion.php'); }
elseif ( in_category('beauty') ) {
    include(TEMPLATEPATH . '/single-beauty.php'); }
elseif ( in_category('sex-dating') ) {
    include(TEMPLATEPATH . '/single-sex-dating.php'); }
elseif ( in_category('health') ) {
    include(TEMPLATEPATH . '/single-health.php'); }
elseif ( in_category('pop') ) {
    include(TEMPLATEPATH . '/single-pop.php'); }
elseif ( in_category('nyfw') ) {
    include(TEMPLATEPATH . '/single-nyfw.php'); }
elseif ( in_category('parties') ) {
    include(TEMPLATEPATH . '/single-parties.php'); }
elseif ( in_category('editorial') ) {
    include(TEMPLATEPATH . '/single-editorial.php'); }
else {
    include(TEMPLATEPATH . '/single-default.php');
  }
?>
