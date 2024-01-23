<?php
/**
 *
 * Template Name: Diaries (Instagram)
 *
 * The template for displaying all Model pages.
 *
**/
get_header(); ?>
<div id="diaries">
<div class="row">
  <div class="span4">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
  <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
  <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

<?php endwhile; ?>

</div><!--/span4-->

<?php $key="instagram-userid"; ?>
<?php $instagramUserId=get_post_meta($post->ID, $key, true); ?>


  <?php
    // Supply a user id and an access token
    $userid = $instagramUserId;
    $accessToken = "2400068.ab103e5.9c5f2727119b48a4ae072750570a9b1f";

    // Gets our data
    function fetchData($url){
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_TIMEOUT, 20);
         $result = curl_exec($ch);
         curl_close($ch);
         return $result;
    }

    // Pulls and parses data.
    $result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&size=t");
    $result = json_decode($result);
  ?>


  <?php foreach ($result->data as $post): ?>
    <div class="span4">

      <figure class="diary-figure">
        <img src="<?= $post->images->standard_resolution->url ?>">
        <!-- <figcaption><?= $post->caption->text ?></figcaption> -->
      </figure>

    </div><!--/span4-->
  <?php endforeach ?>



</div><!--/row-->
</div><!--/diaries-->
<?php get_footer(); ?>
