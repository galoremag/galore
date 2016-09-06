<?php
/*
Template Name: Contributor Submission
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
              <h1 class="text-center">Write For Us</h1>
            </div>
          </div>

          <div class="row text-center contributorStats">
            <div class="col-sm-12">
              <h2>Contributing to the Voice of Generation-Z</h2>
            </div>
            <div class="col-sm-12">
              <div class="col-sm-4">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <p class="stats">Over 1M Unique Visitors</p>
              </div>
              <div class="col-sm-4">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <p class="stats">Over 200k Instagram Followers</p>
              </div>
              <div class="col-sm-4">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <p class="stats">Over 200k Twitter Followers</p>
              </div>
            </div>
          </div>

          <div class="row text-center contributorDescriptions">
            <div class="col-sm-12">
              <h2>What We Seek</h2>
            </div>
            <div class="col-sm-12">
              <p><span style="color: #fa7470;">Galore’s </span> contributing writers are carefully selected based on a
                combination of talent, experience, and passion. We leave no stone unturned, and every topic,
                be it controversial or not, is explored through a variety of lenses and perspectives.</p>
            </div>
          </div>

          <div class="row text-center contributorForm">
            <form>
            <div class="col-sm-12">
              <h2>Apply</h2>
            </div>
            <div class="form-group row">
              <label class="col-xs-4 col-form-label">First:</label>
              <div class="col-xs-8">
                <input class="form-control" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-4 col-form-label">Last:</label>
              <div class="col-xs-8">
                <input class="form-control" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-4 col-form-label">Email Address:</label>
              <div class="col-xs-8">
                <input class="form-control" type="email">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-4 col-form-label">Birthdate:</label>
              <div class="col-xs-8">
                <input class="form-control" type="date">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-4 col-form-label">Location:</label>
              <div class="col-xs-8">
                <input class="form-control" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-12 col-form-label">Interests/Hobbies:</label>
              <p>Tell us about yourself</p>
              <div class="col-xs-12">
                <textarea class="form-control" rows="5" type="text">
                </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-12 col-form-label">Sample Writing Link:</label>
              <p>Please provide a link to a sample of your writing online</p>
              <div class="col-xs-12">
                <input class="form-control" type="url" placeholder="https://galoremag.com/barbie-has-officially-become-an-instagram-thot/">
              </div>
            </div>
            <div class="form-group row formInterests">
              <label class="col-xs-12 col-form-label">Interested Verticals:</label>
              <div class="checkbox" class="col-sm-12">
                <label>
                  <input type="checkbox" value="">
                  Beauty
                </label>
                <label>
                  <input type="checkbox" value="">
                  Health
                </label>
                <label>
                  <input type="checkbox" value="">
                  Models
                </label>
              </div>
              <div class="checkbox" class="col-sm-12">
                <label>
                  <input type="checkbox" value="">
                  Parties
                </label>
                <label>
                  <input type="checkbox" value="">
                  Pop
                </label>
                <label>
                  <input type="checkbox" value="">
                  Sex + Dating
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xs-12 col-form-label">Article Ideas:</label>
              <p>Please list some article ideas you have</p>
              <div class="col-xs-12">
                <textarea class="form-control" rows="5" type="text">
                </textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-default text-center">Submit</button>
            </form>
          </div>

        </div>
    </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
