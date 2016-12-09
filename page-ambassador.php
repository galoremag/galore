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

          <div class="row text-center contributorDescriptions">
            <?php the_content(); ?>
          </div>

          <div class="row text-center contributorStats">
            <div class="spacer20"></div>
            <div class="col-sm-12">
              <div class="col-sm-6">
                <i class="btr bt-gift" aria-hidden="true"></i>
                <h3 class="stats">Perks</h3>
                <ul>
                  <li>Receive Galore gift bags of bomb products from top fashion and beauty brands</li>
                  <li>Preferred access to GALORE parties and events</li>
                  <li>Get the inside scoop on our first annual Galore conference</li>
                  <li>Priority internship, employment, and Kitten influencer project consideration</li>
                  <li>Network with other dope girls just like yourself</li>
                </ul>
              </div>
              <div class="col-sm-6">
                <i class="btr bt-smile" aria-hidden="true"></i>
                <h3 class="stats">What You<br />Need to Do</h3>
                <ul>
                  <li>Follow us on all social media and engage in our content; like, comment, tag and add us to your bio, Galore Girl</li>
                  <li>Share stories from galoremag.com and don't forget to tell your friends</li>
                  <li>Be our eyes and ears- we may be in your city and need a local connect to hook us up!</li>
                  <li>Get involved in our new consumer insights group</li>
                  <li>Participate in the majority of projects within this program</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row text-center contributorForm">
            <div class="col-sm-6 col-sm-offset-3">
              <?php echo do_shortcode("[RM_Form id='1']"); ?>
              <div class="g-recaptcha" data-sitekey="6LfrzwYUAAAAAFNnNUAsGnGbMA1zM1vjXrnGo2O2"></div>

            </div>
          </div>

        </div>
    </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
