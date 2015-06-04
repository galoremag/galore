<?php

class JSON_API_Recs_Controller {

  public function recs() {
    global $json_api;
    $category_name = $json_api->query->category;
    $seen_post_ids_str = $json_api->query->seen_post_ids;
    $seen_post_ids = array();
    $bad_post_ids = array(30044, 30042, 8189, 6956, 7168, 6872, 6848, 6616, 6581, 6506, 6481, 6323, 6301, 6294, 5881, 5757, 5579, 5548, 5517, 5443, 5484, 5408, 5215, 5167, 5155, 5146, 5089, 5080, 5035, 4973, 4694, 4523, 4642, 4496, 4489, 4301, 4277, 4155, 3860, 3721, 3704, 3628, 3580, 3575, 3482, 3535, 3419, 3351, 3047, 2969, 2790, 2678, 2276, 2255, 2153);
    if ($seen_post_ids_str) {
      $seen_post_ids = explode(',', $seen_post_ids_str);
    }
    $seen_post_ids = array_merge($seen_post_ids, $bad_post_ids);
    $query = new WP_Query( array(
      'category_name' => $category_name,
      'showposts' => '5',
      'orderby' => 'rand',
      'post__not_in' => $seen_post_ids
    ) );
    ob_start();
    include(locate_template('includes/content-recommendation.php'));
    $var = ob_get_contents();
    ob_end_clean();
    $escaped = htmlspecialchars($var);
    return array(
      "message" => $escaped
    );
  }

  /* public function thumbnails() { */
  /*   global $json_api; */
  /*   $page = $json_api->query->page; */
  /*   $query = new WP_Query( array( */
  /*     'paged' => $page, */
  /*     'posts_per_page' => 100 */
  /*   ) ); */
  /*   $data = array(); */
  /*   while ( $query->have_posts() ) { */
  /*     $subdata = array(); */
  /*     $query->the_post(); */
  /*     $post_id = $query->post->ID; */
  /*     $subdata[] = $post_id; */
  /*     $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); */
  /*     $subdata[] = $url; */
  /*     $data[] = $subdata; */
  /*   } */
  /*   return array("items" => $data); */
  /* } */

}

?>
