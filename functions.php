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

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

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
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

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
	    if( $options['id'] !== 6 ) { return $slides; }
	    
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
	function add_category_name($classes = '') {
	   if(is_single()) {
	      $category = get_the_category();
	      $classes[] = 'category-'.$category[0]->slug; 
	   }
	   return $classes;
	}
	add_filter('body_class','add_category_name');