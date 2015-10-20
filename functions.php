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
		// wp_register_script( 'site', get_template_directory_uri().'/js/prod.js', array( 'jquery' ) );
		// wp_enqueue_script( 'site' );

		wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/bower_components/bootstrap/dist/css/bootstrap.min.css', '', '', 'screen' );
        wp_enqueue_style( 'bootstrap' );

        wp_register_style( 'sliderskin', get_stylesheet_directory_uri().'/rs-galore-skin/rs-galore.css', '', '', 'screen' );
        wp_enqueue_style( 'sliderskin' );

        wp_register_style( 'perfect-scrollbar', get_stylesheet_directory_uri().'/css/perfect-scrollbar.min.css', '', '', 'screen' );
        wp_enqueue_style( 'perfect-scrollbar' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

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
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if (strpos($url,'/tv/') !== false) {
	    wp_redirect( 'http://tv.galoremag.com', 301 ); exit;
	}

	// if (strpos($url,'/shop/') !== false) {
	//     wp_redirect( 'http://galoremag.com', 301 ); exit;
	// }

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

	// Prepend Cloudinary Upload URL
	
	// function add_cloudinary_url($html) {
	// 	$html = '<img src="http://res.cloudinary.com/galore/image/upload/' . esc_attr($img_src) . '" alt="' . esc_attr($alt) . '" ' . $title . $hwstring . 'class="' . $class . '" />';
	// 	return $html;
	// }
	// add_filter('get_image_tag', 'add_cloudinary_url', 10, 2);

	// function add_cloudinary_url($html) {
	//   	$html = str_replace('<img src="', '<img src="http://res.cloudinary.com/galore/image/upload/', $html);

	//   	return $html;
	// }
	// add_filter('get_image_tag', 'add_cloudinary_url', 10, 8);

	/* Fire our meta box setup function on the post editor screen. */
	add_action( 'load-post.php', 'galore_post_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'galore_post_meta_boxes_setup' );

	/* Meta box setup function. */
	function galore_post_meta_boxes_setup() {
		/* Add meta boxes on the 'add_meta_boxes' hook. */
		add_action( 'add_meta_boxes', 'galore_add_post_meta_boxes' );

		  /* Save post meta on the 'save_post' hook. */
		add_action( 'save_post', 'galore_save_post_class_meta', 10, 2 );
	}

	/* Create one or more meta boxes to be displayed on the post editor screen. */
	function galore_add_post_meta_boxes() {
	  add_meta_box(
	    'galore-ad-post',      // Unique ID
	    esc_html__( 'Ad Post', 'example' ),    // Title
	    'galore_post_meta_boxes_setup',   // Callback function
	    'post',         // Admin page (or post type)
	    'side',         // Context
	    'default'         // Priority
	  );
	}

	/* Display the post meta box. */
	function galore_post_class_meta_box( $object, $box ) { ?>
		<?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>
		<p>
		<label for="smashing-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'example' ); ?></label>
		<br />
		<input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_class', true ) ); ?>" size="30" />
		</p>
		<?php
	}

	/* Save the meta box's post metadata. */
	function galore_save_post_class_meta( $post_id, $post ) {
		/* Verify the nonce before proceeding. */
		if ( !isset( $_POST['galore_post_class_nonce'] ) || !wp_verify_nonce( $_POST['galore_post_class_nonce'], basename( __FILE__ ) ) )
		return $post_id;

		/* Get the post type object. */
		$post_type = get_post_type_object( $post->post_type );

		/* Check if the current user has permission to edit the post. */
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

		/* Get the posted data and sanitize it for use as an HTML class. */
		$new_meta_value = ( isset( $_POST['galore-post-class'] ) ? sanitize_html_class( $_POST['galore-post-class'] ) : '' );

		/* Get the meta key. */
		$meta_key = 'galore_post_class';

		/* Get the meta value of the custom field key. */
		$meta_value = get_post_meta( $post_id, $meta_key, true );

		/* If a new meta value was added and there was no previous value, add it. */
		if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

		/* If the new meta value does not match the old value, update it. */
		elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

		/* If there is no new meta value but an old value exists, delete it. */
		elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}

	/* Filter the post class hook with our custom post class function. */
	add_filter( 'post_class', 'smashing_post_class' );

	function galore_post_class( $classes ) {

		/* Get the current post ID. */
		$post_id = get_the_ID();

		/* If we have a post ID, proceed. */
		if ( !empty( $post_id ) ) {

		/* Get the custom post class. */
		$post_class = get_post_meta( $post_id, 'galore_post_class', true );

		/* If a post class was input, sanitize it and add it to the post class array. */
		if ( !empty( $post_class ) )
		  $classes[] = sanitize_html_class( $post_class );
		}

	  return $classes;
	}