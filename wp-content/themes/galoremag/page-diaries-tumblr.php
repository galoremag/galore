<?php
/**
 *
 * Template Name: Diaries (Tumblr)
 *
 * The template for displaying all Model pages.
 *
**/
get_header(); ?>
<div id="diaries">
<div class="row">
  <div class="span8">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
  <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
  <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

<?php endwhile; ?>


<?php $key="tumblr-userid"; ?>
<?php $tumblrUserId=get_post_meta($post->ID, $key, true); ?>

<?php

$userid = $tumblrUserId;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://" . $tumblrUserId . ".tumblr.com/api/read/json");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);
curl_close($ch);

$result = str_replace("var tumblr_api_read = ","",$result);
$result = str_replace(';','',$result);
$result = str_replace('\u00a0','&amp;nbsp;',$result);

$jsondata = json_decode($result,true);
$posts = $jsondata['posts'];
?>

<?php foreach($posts as $post) :?>
    <div class="feature">
      <a href="<?= $post['url'] ?>" class="featimg"><img src="<?= $post['photo-url-500'] ?>"></a>
    </div><!--/feature-->
    <span><?= $post['photo-caption'] ?></span>

<?php endforeach ?>

</div><!--/span8-->

</article>
  <?php get_sidebar(); ?>
</div><!--/row-->
</div><!--/diaries-->
<?php get_footer(); ?>
