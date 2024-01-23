<?php
/**
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 */

/*

  Required external files

*/

require_once( 'external/starkers-utilities.php' );

/*

  Shop

*/

// remove "from" on pricing
function wpsc_remove_from_for_variations($from) {
    return '';
}
add_filter('wpsc_product_variation_text','wpsc_remove_from_for_variations');


/*

  Theme specific settings

  Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

*/

add_theme_support('post-thumbnails');

register_nav_menus(array('primary' => 'Primary Navigation'));


// KG41
// http://www.wpbeginner.com/wp-themes/what-whys-and-how-tos-of-post-formats-in-wordpress-3-1/
add_theme_support( 'post-formats', array( 'gallery', 'image', 'video') );


// Feature Images
add_theme_support('post-thumbnails');

// add_image_size('post-image',1160,726,true);
// add_image_size('post-standard',760,426, true);
// Using the ones below because we can crop top & center
bt_add_image_size( 'bt-post-image', 1160,650, array( 'center', 'top' ) );
bt_add_image_size( 'bt-post-standard', 760,426, array( 'center', 'top' ) );
bt_add_image_size( 'bt-thumb-home', 600,340, array( 'center', 'top' ) );



// Function to make it so I can crop from the top
// http://bradt.ca/blog/image-crop-position-in-wordpress/

/* Example Usage:
 * bt_add_image_size( 'product-screenshot', 300, 300, array( 'left', 'top' ) );
 * bt_add_image_size( 'product-feature', 460, 345, array( 'center', 'top' ) );
 */

add_filter( 'intermediate_image_sizes_advanced', 'bt_intermediate_image_sizes_advanced' );
add_filter( 'wp_generate_attachment_metadata', 'bt_generate_attachment_metadata', 10, 2 );

/**
 * Registers a new image size with cropping positions
 *
 * The $crop parameter works as in the 'add_image_size' function taking true or
 * false values. If set to true, the default cropping position is 'center', 'center'.
 *
 * The $crop parameter also takes an array of the format
 * array( x_crop_position, y_crop_position )
 * x_crop_position can be 'left', 'center', 'right'
 * y_crop_position can be 'top', 'center', 'bottom'
 *
 * @param string $name Image size identifier.
 * @param int $width Image width.
 * @param int $height Image height.
 * @param bool|array $crop Optional, default is false. Whether to crop image to specified height and width or resize. An array can specify positioning of the crop area.
 * @return bool|array False, if no image was created. Metadata array on success.
 */
function bt_add_image_size( $name, $width = 0, $height = 0, $crop = false ) {
    global $_wp_additional_image_sizes;
    $_wp_additional_image_sizes[$name] = array( 'width' => absint( $width ), 'height' => absint( $height ), 'crop' => $crop );
}


/**
 * Returning no sizes (an empty array) will force
 * wp_generate_attachment_metadata to skip creating intermediate image sizes on
 * upload, then we can run our own resizing functions by hooking into the
 * 'wp_generate_attachment_metadata' filter
 */
function bt_intermediate_image_sizes_advanced( $sizes ) {
    return array();
}


function bt_generate_attachment_metadata( $metadata, $attachment_id ) {
    $attachment = get_post( $attachment_id );

    $uploadPath = wp_upload_dir();
    $file = path_join($uploadPath['basedir'], $metadata['file']);

    if ( !preg_match('!^image/!', get_post_mime_type( $attachment )) || !file_is_displayable_image( $file ) ) return $metadata;

    global $_wp_additional_image_sizes;

    foreach ( get_intermediate_image_sizes() as $s ) {
        $sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => FALSE );
        if ( isset( $_wp_additional_image_sizes[$s]['width'] ) )
            $sizes[$s]['width'] = intval( $_wp_additional_image_sizes[$s]['width'] ); // For theme-added sizes
        else
            $sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
        if ( isset( $_wp_additional_image_sizes[$s]['height'] ) )
            $sizes[$s]['height'] = intval( $_wp_additional_image_sizes[$s]['height'] ); // For theme-added sizes
        else
            $sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
        if ( isset( $_wp_additional_image_sizes[$s]['crop'] ) )
            $sizes[$s]['crop'] = $_wp_additional_image_sizes[$s]['crop'];
        else
            $sizes[$s]['crop'] = get_option( "{$s}_crop" );
    }

    foreach ( $sizes as $size => $size_data ) {
        $resized = bt_image_make_intermediate_size( $file, $size_data['width'], $size_data['height'], $size_data['crop'] );
        if ( $resized )
            $metadata['sizes'][$size] = $resized;
    }

    return $metadata;
}


/**
 * Resize an image to make a thumbnail or intermediate size.
 *
 * The returned array has the file size, the image width, and image height. The
 * filter 'image_make_intermediate_size' can be used to hook in and change the
 * values of the returned array. The only parameter is the resized file path.
 *
 * @param string $file File path.
 * @param int $width Image width.
 * @param int $height Image height.
 * @param bool|array $crop Optional, default is false. Whether to crop image to specified height and width or resize. An array can specify positioning of the crop area.
 * @return bool|array False, if no image was created. Metadata array on success.
 */
function bt_image_make_intermediate_size( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = bt_image_resize( $file, $width, $height, $crop, null, null, 90 );
        if ( !is_wp_error( $resized_file ) && $resized_file && $info = getimagesize( $resized_file ) ) {
            $resized_file = apply_filters('image_make_intermediate_size', $resized_file);
            return array(
                'file' => wp_basename( $resized_file ),
                'width' => $info[0],
                'height' => $info[1],
            );
        }
    }
    return false;
}



/**
 * Retrieve calculated resized dimensions for use in imagecopyresampled().
 *
 * Calculate dimensions and coordinates for a resized image that fits within a
 * specified width and height. If $crop is true, the largest matching central
 * portion of the image will be cropped out and resized to the required size.
 *
 * @param int $orig_w Original width.
 * @param int $orig_h Original height.
 * @param int $dest_w New width.
 * @param int $dest_h New height.
 * @param bool $crop Optional, default is false. Whether to crop image or resize.
 * @return bool|array False, on failure. Returned array matches parameters for imagecopyresampled() PHP function.
 */
function bt_image_resize_dimensions($orig_w, $orig_h, $dest_w, $dest_h, $crop = false) {

    if ($orig_w <= 0 || $orig_h <= 0)
        return false;
    // at least one of dest_w or dest_h must be specific
    if ($dest_w <= 0 && $dest_h <= 0)
        return false;

    if ( $crop ) {
        // crop the largest possible portion of the original image that we can size to $dest_w x $dest_h
        $aspect_ratio = $orig_w / $orig_h;
        $new_w = min($dest_w, $orig_w);
        $new_h = min($dest_h, $orig_h);

        if ( !$new_w ) {
            $new_w = intval($new_h * $aspect_ratio);
        }

        if ( !$new_h ) {
            $new_h = intval($new_w / $aspect_ratio);
        }

        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        if ( !is_array( $crop ) || count( $crop ) != 2 ) {
            $crop = apply_filters( 'image_resize_crop_default', array( 'center', 'center' ) );
        }

        switch ( $crop[0] ) {
        case 'left': $s_x = 0; break;
        case 'right': $s_x = $orig_w - $crop_w; break;
        default: $s_x = floor( ( $orig_w - $crop_w ) / 2 );
        }

        switch ( $crop[1] ) {
        case 'top': $s_y = 0; break;
        case 'bottom': $s_y = $orig_h - $crop_h; break;
        default: $s_y = floor( ( $orig_h - $crop_h ) / 2 );
        }
    } else {
        // don't crop, just resize using $dest_w x $dest_h as a maximum bounding box
        $crop_w = $orig_w;
        $crop_h = $orig_h;

        $s_x = 0;
        $s_y = 0;

        list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
    }

    // if the resulting image would be the same size or larger we don't want to resize it
    if ( $new_w >= $orig_w && $new_h >= $orig_h )
        return false;

    // the return array matches the parameters to imagecopyresampled()
    // int dst_x, int dst_y, int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );

}


/**
 * Scale down an image to fit a particular size and save a new copy of the image.
 *
 * The PNG transparency will be preserved using the function, as well as the
 * image type. If the file going in is PNG, then the resized image is going to
 * be PNG. The only supported image types are PNG, GIF, and JPEG.
 *
 * Some functionality requires API to exist, so some PHP version may lose out
 * support. This is not the fault of WordPress (where functionality is
 * downgraded, not actual defects), but of your PHP version.
 *
 * @since 2.5.0
 *
 * @param string $file Image file path.
 * @param int $max_w Maximum width to resize to.
 * @param int $max_h Maximum height to resize to.
 * @param bool $crop Optional. Whether to crop image or resize.
 * @param string $suffix Optional. File Suffix.
 * @param string $dest_path Optional. New image file path.
 * @param int $jpeg_quality Optional, default is 90. Image quality percentage.
 * @return mixed WP_Error on failure. String with new destination path.
 */
function bt_image_resize( $file, $max_w, $max_h, $crop = false, $suffix = null, $dest_path = null, $jpeg_quality = 90 ) {

    $image = wp_load_image( $file );
    if ( !is_resource( $image ) )
        return new WP_Error( 'error_loading_image', $image, $file );

    $size = @getimagesize( $file );
    if ( !$size )
        return new WP_Error('invalid_image', __('Could not read image size'), $file);
    list($orig_w, $orig_h, $orig_type) = $size;

    // Rotate if EXIF 'Orientation' is set
    // This code is from the reverted patch at
    // http://core.trac.wordpress.org/changeset/11746/trunk/wp-includes/media.php
    $rotate = false;
    if ( is_callable( 'exif_read_data' ) && in_array( $orig_type, apply_filters( 'wp_read_image_metadata_types', array( IMAGETYPE_JPEG, IMAGETYPE_TIFF_II, IMAGETYPE_TIFF_MM ) ) ) ) {
        $exif = @exif_read_data( $file, null, true );
        if ( $exif && isset( $exif['IFD0'] ) && is_array( $exif['IFD0'] ) && isset( $exif['IFD0']['Orientation'] ) ) {
            if ( 6 == $exif['IFD0']['Orientation'] )
                $rotate = 90;
            elseif ( 8 == $exif['IFD0']['Orientation'] )
                $rotate = 270;
        }
    }

    if ( $rotate )
        list($max_h,$max_w) = array($max_w,$max_h);

    $dims = bt_image_resize_dimensions($orig_w, $orig_h, $max_w, $max_h, $crop);
    if ( !$dims )
        return new WP_Error( 'error_getting_dimensions', __('Could not calculate resized image dimensions') );
    list($dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h) = $dims;

    $newimage = wp_imagecreatetruecolor( $dst_w, $dst_h );

    if ( $rotate )
        list($src_y,$src_x) = array($src_x,$src_y);

    imagecopyresampled( $newimage, $image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

    // convert from full colors to index colors, like original PNG.
    if ( IMAGETYPE_PNG == $orig_type && function_exists('imageistruecolor') && !imageistruecolor( $image ) )
        imagetruecolortopalette( $newimage, false, imagecolorstotal( $image ) );

    // we don't need the original in memory anymore
    imagedestroy( $image );

    // $suffix will be appended to the destination filename, just before the extension
    if ( !$suffix ) {
        if ( $rotate )
            $suffix = "{$dst_h}x{$dst_w}";
        else
            $suffix = "{$dst_w}x{$dst_h}";
    }

    $info = pathinfo($file);
    $dir = $info['dirname'];
    $ext = $info['extension'];
    $name = wp_basename($file, ".$ext");

    if ( !is_null($dest_path) and $_dest_path = realpath($dest_path) )
        $dir = $_dest_path;
    $destfilename = "{$dir}/{$name}-{$suffix}.{$ext}";

    if ( IMAGETYPE_GIF == $orig_type ) {
        if ( !imagegif( $newimage, $destfilename ) )
            return new WP_Error('resize_path_invalid', __( 'Resize path invalid' ));
    } elseif ( IMAGETYPE_PNG == $orig_type ) {
        if ( !imagepng( $newimage, $destfilename ) )
            return new WP_Error('resize_path_invalid', __( 'Resize path invalid' ));
    } else {
        if ( $rotate ) {
            $newimage = _rotate_image_resource( $newimage, 360 - $rotate );
        }

        // all other formats are converted to jpg
        $destfilename = "{$dir}/{$name}-{$suffix}.jpg";
        $return = imagejpeg( $newimage, $destfilename, apply_filters( 'jpeg_quality', $jpeg_quality, 'image_resize' ) );
        if ( !$return )
            return new WP_Error('resize_path_invalid', __( 'Resize path invalid' ));
    }

    imagedestroy( $newimage );

    // Set correct file permissions
    $stat = stat( dirname( $destfilename ));
    $perms = $stat['mode'] & 0000666; //same permissions as parent folder, strip off the executable bits
    @ chmod( $destfilename, $perms );

    return $destfilename;
}















/*

  Actions and Filters

*/

add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );
add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

// http://css-tricks.com/snippets/wordpress/add-class-to-links-generated-by-next_posts_link-and-previous_posts_link/
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="btn"';
}

/* Errors */

function log_error($error) {
    error_log(print_R($error,TRUE) );
}

/*

  Custom Post Types - include custom post types and taxonimies here e.g.

  e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

*/





/*

  Scripts

*/

/**
 * Add scripts via wp_head()
 *
 * @return void
 * @author Keir Whitaker
 */
/*
  function starkers_script_enqueuer() {
  v  wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
  wp_enqueue_script( 'site' );

  wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
  wp_enqueue_style( 'screen' );
  }
*/
/*

  Comments

*/

/**
 * Custom callback for outputting comments
 *
 * @return void
 * @author Keir Whitaker
 */
function starkers_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;


// SLIDER SCRIPT QUEUE

// register_new_royalslider_files(1);

// add_action( 'wp_enqueue_scripts', 'enqueue_royal_sliders' );
//     function enqueue_royal_sliders() {
//         global $posts;

//         // can be also is_archive(), is_page() e.t.c.
//         if(is_single()) { 
//             register_new_royalslider_files(1); 
//         }
//     }

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

/*
  API
*/
function add_recs_controller($controllers) {
    $controllers[] = 'recs';
    return $controllers;
}
add_filter('json_api_controllers', 'add_recs_controller');

function set_recs_controller_path() {
    return get_stylesheet_directory() . "/ws/recs.php";
}
add_filter('json_api_recs_controller_path', 'set_recs_controller_path');

function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

/* Multiple Carousels */
function cptbc_shortcode_alt($atts) {
	$atts = (array) $atts;
	return cptbc_frontend_alt($atts);
}
add_shortcode('image-carousel-alt', 'cptbc_shortcode_alt');

// Display latest WftC
function cptbc_frontend_alt($atts){
	$id = rand(0, 999); // use a random ID so that the CSS IDs work with multiple on one page
    $category = get_the_category();
    $category_slug = $category[0]->slug;
    $is_mag_page = $category_slug == "mag" && !(is_front_page() && is_home());
    $args = array(
        'category_name' => $atts[0],
        'showposts' => 10);
    if ($atts[0] == "mag" && is_front_page()) {
        // randomize magazine articles on the front page
        $args['orderby'] = 'rand';
    }
    if ($is_mag_page) {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $ppp = get_option('posts_per_page');
        $args['offset'] = ($paged - 1) * $ppp;
    }
	$loop = new WP_Query( $args );
	$images = array();
	while ( $loop->have_posts() ) {
		$loop->the_post();
		if ( '' != get_the_post_thumbnail() ) {
            if (!$is_mag_page && $atts[0] == "mag") {
                // hide mainpage mag items that are also in models
                $get_name = function($value) {
                    return $value->slug;
                };
                $categories = get_the_category();
                $categories = array_map($get_name, $categories);
                if (in_array("models", $categories)) {
                    continue;
                }
            }
  			$title = get_the_title();
    		$content = get_the_excerpt();
            $permalink = get_permalink();
            $image = get_the_post_thumbnail( get_the_ID(), 'full' );
			$images[] = array('title' => $title, 'content' => $content, 'image' => $image, 'permalink' => $permalink);
		}
	}
    $images = array_slice($images, 0, 3);
	if(count($images) > 0){
		ob_start();
?>

		<div id="cptbc_<?php echo $id; ?>" class="carousel slide">
        <ol class="carousel-indicators">
<?php foreach ($images as $key => $image) { ?>
        <li data-target="#cptbc_<?php echo $id; ?>" data-slide-to="<?php echo $key; ?>" <?php echo $key == 0 ? 'class="active"' : ''; ?>></li>
<?php } ?>
        </ol>
<div class="carousel-inner">
<?php foreach ($images as $key => $image) { ?>
<div class="item <?php echo $key == 0 ? 'active' : ''; ?>">
        <a class="img" href="<?php echo $image['permalink']; ?>">
<?php echo $image['image']; ?>
        <div class="text">
<?php echo $image['title']; ?>
</div>
</a>
</div>
<?php } ?>
</div>
<a class="left carousel-control" href="#cptbc_<?php echo $id; ?>" data-slide="prev"><i class="ss-icon">&#x25C5;</i></a>
<a class="right carousel-control" href="#cptbc_<?php echo $id; ?>" data-slide="next"><i class="ss-icon">&#x25BB;</i></a>
</div>


<?php }
$output = ob_get_contents();
ob_end_clean();

// Restore original Post Data
wp_reset_postdata();

return $output;
    }

function get_template_part_with_hammy($template_name) {
    $content = load_template_part($template_name);
    if(function_exists('hammy_replace_images')){
        $content = hammy_replace_images($content);
    }
    echo $content;
}

add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['rsGalore'] = array(
           'label' => 'Galore Skin',
           'path' => get_stylesheet_directory_uri() . '/rs-galore-skin/rs-galore.css'  // get_stylesheet_directory_uri returns path to your theme folder
      );
      return $skins;
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
