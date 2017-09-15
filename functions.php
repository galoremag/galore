<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode

	add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode

	add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode

	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

	======================================================================================================================== */



	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_style( 'bootstrap-css', get_stylesheet_directory_uri().'/bower_components/bootstrap/dist/css/bootstrap.min.css', '', '', 'screen' );
    wp_enqueue_style( 'bootstrap-css' );

		wp_register_style( 'royalslider-css', plugins_url().'/new-royalslider/lib/royalslider/royalslider.css', '', '', 'screen' );
    wp_enqueue_style( 'royalslider-css' );

    wp_register_style( 'royalslider-skin', get_stylesheet_directory_uri().'/rs-galore-skin/rs-galore.css', '', '', 'screen' );
    wp_enqueue_style( 'royalslider-skin' );

    wp_register_style( 'perfect-scrollbar', get_stylesheet_directory_uri().'/css/perfect-scrollbar.min.css', '', '', 'screen' );
    wp_enqueue_style( 'perfect-scrollbar' );

		wp_register_style( 'site-css', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
    wp_enqueue_style( 'site-css' );

		wp_register_style( 'royalslider-js', plugins_url().'/new-royalslider/lib/royalslider/jquery.royalslider.min.js', '', '', 'screen' );
    wp_enqueue_style( 'royalslider-js' );

		wp_register_script( 'bootstrap-js', get_template_directory_uri().'/bower_components/bootstrap/dist/js/bootstrap.min.js');
		wp_enqueue_script( 'bootstrap-js' );

		wp_register_script( 'site-js', get_template_directory_uri().'/prod.js');
		wp_enqueue_script( 'site-js' );
	}

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	// BOOTSTRAP

	// ADD POST THUMBNAIL TO ADMIN COLUMN

	// add_filter('manage_posts_columns', 'posts_columns', 5);
	// add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

	// function posts_columns($defaults){
	//     $defaults['riv_post_thumbs'] = __('Thumbs');
	//     return $defaults;
	// }

	// function posts_custom_columns($column_name, $id){
	//         if($column_name === 'riv_post_thumbs'){
	//         echo the_post_thumbnail( 'thumbnail' );
	//     }
	// }

	// ADD MENU SUPPORT

	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'header-menu' => __( 'Header Menu' ),
	      'footer-menu' => __( 'Footer Menu' )
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );

	// HIDE ADMIN BAR on FRONTEND

	add_filter('show_admin_bar', '__return_false');

	// ADD ROYAL SLIDER THEME
	add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
	function new_royalslider_add_custom_skin($skins) {
	      $skins['rsGalore'] = array(
	           'label' => 'Galore Skin',
	           'path' => get_stylesheet_directory_uri() . '/rs-galore-skin/rs-galore.css'  // get_stylesheet_directory_uri returns path to your theme folder
	      );
	      return $skins;
	}

	// Image Compression
	function get_template_part_with_hammy($template_name) {
	    $content = load_template_part($template_name);
	    if(function_exists('hammy_replace_images')){
	        $content = hammy_replace_images($content);
	    }
	    echo $content;
	}

	// MOST RECENT POSTS FROM TAG 'FEATURED'
	// add_filter('new_rs_slides_filter', 'add_additional_posts_to_slider', 10, 3);
	// global $post;
	// function add_additional_posts_to_slider($slides, $options, $post, $type) {
	//     if( $options['id'] !== 4 ) { return $slides; }
	//
	//     $slides = array();
	//
	//     // Query #1 parameters  https://gist.github.com/luetkemj/2023628
	//     $args = array(
	//         'posts_per_page' => 3,
	//         'orderby' => 'date',
	// 				'tag' => 'featured',
	// 				'order' => 'DESC',
	// 				'orderby' => 'date',
	// 				'offset' => 0,
	// 				'post_type' => array('list', 'post'),
	// 				'public' => true,
	// 				'post__not_in' => get_option( 'sticky_posts' ),
	// 				'tax_query' => array(
	// 		      array(
	// 		        'tax_query' => array(
	// 		          array(
	// 		            'taxonomy' => 'sections', // change taxonomy
	// 		            'field' => 'slug',
	// 		            'terms' => 'hidehome',
	// 								'operator' => 'NOT IN'
	// 		            )
	// 				      )
	// 		        )
	// 		      )
	//     );
	//     $query = new WP_Query($args);
	//     $slides = array_merge($slides,  (array)$query->posts); // merge queried data
	//
	//     return $slides;
	// }

	add_filter('new_royalslider_posts_slider_query_args', 'galorers_custom_query', 10, 2);

	function galorers_custom_query($args, $index) {
		// Front page slider
		if ($index == 4) {
			$args = array(
				'tag' => 'featured',
				'post_type' => array('list','post'),
				'public' => true,
				'posts_per_page' => 3
			);
		}

		return $args;
	}

	// Clear cache when you save post, or during any other action
	function rs_clear_cache() {
	  delete_transient( 'new-rs-4' );
	}
	add_action( 'save_post', 'rs_clear_cache' );

	/** Add Social Sharing Links on Single Posts **/
	add_action('genesis_after_entry', 'include_social', 9);

	function include_social() {
		if ( is_single() ) require(CHILD_DIR.'/social.php');
	}

	// add category nicenames in body and post class
	function category_id_class( $classes ) {
		global $post;
		if ( have_posts() ) {
			global $post;
			foreach ( ( get_the_category( $post->ID ) ) as $category ) {
				$classes[] = $category->category_nicename;
			}
			return $classes;
		} else {
			$classes[] = 'search-no-results';
		}
		return $classes;
	}
	add_filter( 'post_class', 'category_id_class' );
	add_filter( 'body_class', 'category_id_class' );

	// ADD PAGE TO BODY CLASS
	function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );

	// GET VIEW COUNT OF POSTS - ADD AS CUSTOM FIELD
	function wpb_set_post_views($postID) {
	    $count_key = 'wpb_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	//To keep the count accurate, lets get rid of prefetching
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	// ADD POST ID TO THE VIEW COUNTER
	function wpb_track_post_views ($post_id) {
	    if ( !is_single() ) return;
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;
	    }
	    wpb_set_post_views($post_id);
	}
	add_action( 'wp_head', 'wpb_track_post_views');

	function get_the_popular_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 100);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'... ';
	return $excerpt;
	}

	// Customize excerpt read more
	function new_excerpt_more( $more ) {
	  return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	// Disable auto-embeds for WordPress >= v3.5
	remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );

	// update_option('siteurl','http://galoremag.com/');
 	// update_option('home','http://galoremag.com/');

	// Remove Auto-links on Post Images
    function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );

	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
	}
	add_action('admin_init', 'wpb_imagelink_setup', 10);

	add_action('pre_option_image_default_link_type', 'always_link_images_to_none');
	function always_link_images_to_none() {
		return 'none';
	}

	// TV Redirect
	$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if (strpos($url,'/tv/') !== false) {
	    wp_redirect( 'http://tv.galoremag.com', 301 ); exit;
	}

	if (strpos($url,'/shop/') !== false) {
	    wp_redirect( 'https://galoremag.com', 301 ); exit;
	}

	// Popular Stories

	// function to display number of posts.
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
	}

	// function to count views.
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}


	// Add it to a column in WP-Admin
	add_filter('manage_posts_columns', 'posts_column_views');
	add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
	function posts_column_views($defaults){
	    $defaults['post_views'] = __('Views');
	    return $defaults;
	}
	function posts_custom_column_views($column_name, $id){
		if($column_name === 'post_views'){
	        echo getPostViews(get_the_ID());
	    }
	}

	// FIX AUTOSAVE FAIL
	function function_save_var()
	{
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;
	}

	add_filter( 'allowed_http_origin', '__return_true' );

	// DEFER JS PARSING
	// this was breaking the signup forms?
	// function defer_parsing_of_js ( $url ) {
	// 	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	// 	if ( strpos( $url, 'jquery.js' ) ) return $url;
	// 	return $url . " async onload='myinit()'";
	// }
	// add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );


	// Add Featured Image to WP-API Response

	add_action( 'rest_api_init', 'sb_register_featured_urls' );
	function sb_register_featured_urls() {
	    register_api_field( 'post',
	        'featured_image_url',
	        array(
	            'get_callback'    => 'sb_api_featured_images'
	        )
	    );
	}

	// Add post thumbnail to WP-API
	function sb_api_featured_images( $data, $post ) {

		$featured_id = get_post_thumbnail_id( $post->ID );

		// $sizes = wp_get_attachment_metadata( $featured_id );
		$url = wp_get_attachment_url( $featured_id );

		return $url;

		// $size_data = new stdClass();

		// if ( ! empty( $sizes['sizes'] ) ) {

		// 	foreach ( $sizes['sizes'] as $key => $size ) {
		// 		// Use the same method image_downsize() does
		// 		$image_src = wp_get_attachment_image_src( $featured_id, $key );

		// 		if ( ! $image_src ) {
		// 			continue;
		// 		}

		// 		$size_data->$key = $image_src[0];

		// 	}

		// }

		// return $size_data;
	}

	// Add CORS to WP-API
	add_action( 'rest_api_init', function() {
		remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
		add_filter( 'rest_pre_serve_request', function( $value ) {
			header( 'Access-Control-Allow-Origin: *' );
			header( 'Access-Control-Allow-Methods: GET' );
			header( 'Access-Control-Allow-Credentials: true' );

			return $value;

		});
	}, 15 );

	add_theme_support( 'title-tag' );
	// add_theme_support('auto-load-next-post');

	// DEBUGGIN' CONSOLE LOGGIN
	// function debug_to_console( $data ) {
	//
	// 	if ( is_array( $data ) ) {
	// 			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	// 	} else {
	// 			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	// 	}
	//
	// 	echo $output;
	// }


	// Allow SVG uploads
	function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	// CUSTOM RSS FEED

		add_action( 'after_setup_theme', 'my_rss_template' );
	/**
	 * Register custom RSS template.
	 */
	function my_rss_template() {
		add_feed( 'smartnews', 'my_custom_rss_render' );
	}
	/**
	 * Custom RSS template callback.
	 */
	function my_custom_rss_render() {
		get_template_part( 'feed', 'smartnews' );
	}

	// Hide weird RoyalSlider error on dev
	add_filter('deprecated_constructor_trigger_error', '__return_false');

	// remove wp version param from any enqueued scripts
	function vc_remove_wp_ver_css_js( $src ) {
	    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
	        $src = remove_query_arg( 'ver', $src );
	    return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

	// Redefine user notification function
	if ( !function_exists('wp_new_user_notification') ) {
	    function wp_new_user_notification( $user_id, $plaintext_pass = '' ) {
	        // $user = new WP_User($user_id);
					//
	        // $user_login = stripslashes($user->user_login);
	        // $user_email = stripslashes($user->user_email);
					//
	        // $message  = sprintf(__('Welcome to Galore %s:'), get_option('blogname')) . "rnrn";
	        // // $message .= sprintf(__('Username: %s'), $user_login) . "rnrn";
	        // // $message .= sprintf(__('E-mail: %s'), $user_email) . "rn";
					//
	        // @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), get_option('blogname')), $message);
					//
	        // if ( empty($plaintext_pass) )
	        //     return;
					//
	        // $message  = __('Hi there,') . "rnrn";
	        // // $message .= sprintf(__("Welcome to %s! Here's how to log in:"), get_option('blogname')) . "rnrn";
	        // // $message .= wp_login_url() . "rn";
	        // // $message .= sprintf(__('Username: %s'), $user_login) . "rn";
	        // // $message .= sprintf(__('Password: %s'), $plaintext_pass) . "rnrn";
	        // // $message .= sprintf(__('If you have any problems, please contact me at %s.'), get_option('admin_email')) . "rnrn";
	        // $message .= __('Ciao bb!');
					//
	        // wp_mail($user_email, sprintf(__('[%s] Your username and password'), get_option('blogname')), $message);

					return;
	    }
	}

	// Load ad script after Ajax load more item
// 	<!-- /60899964/Article_Mobile_300x250_pos2 -->
// <div id='div-gpt-ad-1465835581876-4' style='height:250px; width:300px;' class="visible-xs center-block">
// <script type='text/javascript'>
// googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-4'); });
// </script>
// </div>
//
// <!-- /60899964/Article_300x250_970x250_pos2 -->
// <div id='div-gpt-ad-1465835581876-1' style='height:250px; width:300px;' class="hidden-xs center-block">
// <script type='text/javascript'>
// googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465835581876-1'); });
// </script>

?>
