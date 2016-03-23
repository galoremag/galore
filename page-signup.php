<?php
/*
Template Name: Newsletter Signup
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
*
        * @package  WordPress
        * @subpackage   Starkers
                * @since        Starkers 4.0
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="container-fluid">
    <div class="row-fluid">
        <div id="content" class="col-sm-10 col-sm-offset-1">
            <div class="row-fluid">

                <!-- Newsletter Signup -->
                <div class="email-signup-body col-sm-6 col-sm-offset-3 font2 text-center">

                    <?php the_content(); ?>

                    <h1 class="text-center">Get On The List</h1>
                    <p class="font2 text-center">We promise not to spam you, we don't like it either.</p>
                    <form action="https://galoremag.createsend.com/t/i/s/tjcj/" method="post">
                        <div class="form-group">
                            <input placeholder="Name" class="form-control" id="fieldName" name="cm-name" type="text" required />
                        </div>
                        <div class="form-group">
                            <input placeholder="Email" class="form-control" id="fieldEmail" name="cm-tjcj-tjcj" type="email" required />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-bp" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="spacer40"></div>

            <hr />

    			  <!-- Infinite Scroll -->

    				<?php
    				echo do_shortcode('[ajax_load_more button_label="Loading" offset="32" post_type="post"]');
    				?>

    				<div class="spacer40"></div>

        </div>
    </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
