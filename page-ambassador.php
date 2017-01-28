<?php
/*
Template Name: Ambassador Submission
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
        <div id="content" class="nopad col-sm-10 col-sm-offset-1">

          <div class="row-fluid contributorHeading">
            <div class="col-sm-12">
              <h1 class="text-center"><?php the_title(); ?></h1>
            </div>
          </div>

          <hr />

          <div class="row-fluid text-center contributorDescriptions">
            <div class="col-sm-8 col-sm-offset-2">
              <?php the_content(); ?>
            </div>
          </div>

        </div>
    </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
