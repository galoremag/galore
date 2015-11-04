<?php
/*
Template Name: Newsletter Thanks
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
        <div id="content" class="col-sm-8 col-sm-offset-2">
            <div class="row-fluid">

                <!-- Newsletter Signup -->

                <div class="email-signup-body col-sm-12">
                    
                    <?php the_content(); ?>

                </div>

                <div class="text-center">
                    <div id="_giphy_tv"></div>
                    <script>
                    var _giphy_tv_tag="email";
                    var g = document.createElement('script'); g.type = 'text/javascript'; g.async = true;
                    g.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'giphy.com/static/js/widgets/tv.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(g, s);
                    </script>
                </div>

                <hr>

                <div class="spacer40"></div>
                <h2 class="text-center">Join The <span>Party</span></h2>
                <div class="spacer40"></div>

                <?php echo do_shortcode('[ajax_load_more orderby="date" category="parties" button_label="Loading"]'); ?>

            </div>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>