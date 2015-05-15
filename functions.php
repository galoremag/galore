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

	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

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
	 * @author Aaron Smulktis
	 */

	function script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_script('perfectscrollbar', get_template_directory_uri(). '/js/perfect-scrollbar.min.js', array('jquery'), null, true);
		wp_register_script( 'scrollspy', get_template_directory_uri(). '/js/scrollspy.min.js', array('jquery'), null, true );
		wp_register_script( 'history' , get_template_directory_uri(). '/js/jquery.history.js', array('jquery'), null, true );
		wp_register_script( 'infiniscroll', get_template_directory_uri(). '/js/infiniscroll.js', array('scrollspy'), null, true );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}

	// Only load perfect scrollbar on the homepage
	if (is_home()) {
		wp_enqueue_script( 'perfectscrollbar' );
	}

	// Detect Single Post, and Load Infiniscroll Scripts
	if (is_singular()) {
		wp_enqueue_script( 'scrollspy' );
		wp_enqueue_script( 'history' );
		wp_enqueue_script( 'infiniscroll' );
	}
 
	// ==== Add the endpoint for the call to get the post html only ====

	function alnp_add_endpoint() {
	    add_rewrite_endpoint( 'partial', EP_PERMALINK );
	}

	add_action( 'init', 'alnp_add_endpoint' );

	/**
	* When /partial endpoint is used on a post, get just the post html
	**/
	function alnp_template_redirect() {
	    global $wp_query;
	 
	    // if this is not a request for partial or a singular object then bail
	    if ( ! isset( $wp_query->query_vars['partial'] ) || ! is_singular() )
	        return;
	 
		// include custom template
	    include get_stylesheet_directory() . '/content-partial.php';

	    exit;
	}

	add_action( 'template_redirect', 'alnp_template_redirect' );

	function partial_endpoints_activate() {

	    // ensure our endpoint is added before flushing rewrite rules
	    alnp_add_endpoint();
	    
	    // flush rewrite rules - only do this on activation as anything more frequent is bad!
	    flush_rewrite_rules();
	}

	register_activation_hook( __FILE__, 'partial_endpoints_activate' );
	 

	function partial_endpoints_deactivate() {
	    // flush rules on deactivate as well so they're not left hanging around uselessly
	    flush_rewrite_rules();
	}

	register_deactivation_hook( __FILE__, 'partial_endpoints_deactivate' );

	// ===== End Infiniscroll =====



	// ADD POST THUMBNAIL TO ADMIN COLUMN

	add_filter('manage_posts_columns', 'posts_columns', 5);
	add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

	function posts_columns($defaults){
	    $defaults['riv_post_thumbs'] = __('Thumbs');
	    return $defaults;
	}

	function posts_custom_columns($column_name, $id){
	        if($column_name === 'riv_post_thumbs'){
	        echo the_post_thumbnail( 'thumbnail' );
	    }
	}

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

	function get_template_part_with_hammy($template_name) {
	    $content = load_template_part($template_name);
	    if(function_exists('hammy_replace_images')){
	        $content = hammy_replace_images($content);
	    }
	    echo $content;
	}

	// MOST RECENT POSTS FROM TAG 'FEATURED'

	function add_additional_posts_to_slider($slides, $options, $type) {
	    if( $options['id'] !== 4 ) { return $slides; }
	    
	    $slides = array();
	   
	    // Query #1 parameters  https://gist.github.com/luetkemj/2023628
	    $args = array(
	        'posts_per_page' => 3,
	        'orderby' => 'date',
			'tag' => 'featured'
	    );
	    $query = new WP_Query($args);
	    $slides = array_merge($slides,  (array)$query->posts); // merge queried data

	    // Query #2 parameters 
	    $args = array(
	        'posts_per_page' => 3,
	        'orderby' => 'date',
	        'tag' => 'featured'
	    );
	    $query = new WP_Query($args);
	    $slides = array_merge($slides, (array)$query->posts); // merge queried data

	    return $slides; 
	}
	add_filter('new_rs_slides_filter', 'add_additional_posts_to_slider', 10, 3);

	/** Add Social Sharing Links on Single Posts **/
	add_action('genesis_after_entry', 'include_social', 9);

	function include_social() {
		if ( is_single() )
	require(CHILD_DIR.'/social.php');
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

	// Disable auto-embeds for WordPress >= v3.5
	remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );

	// update_option('siteurl','http://galoremag.com/');
 	// update_option('home','http://galoremag.com/');

    function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
	}
	add_action('admin_init', 'wpb_imagelink_setup', 10);

	// TV Redirect
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if (strpos($url,'/tv/') !== false) {
	    wp_redirect( 'http://tv.galoremag.com', 301 ); exit;
	}