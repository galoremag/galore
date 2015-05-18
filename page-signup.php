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

<div class="container-fluid">
    <div class="row-fluid">
        <div id="content" class="col-sm-8 col-sm-offset-2">
            <div class="row-fluid">

                <!-- Newsletter Signup -->

                <div id="email-signup">
                    <div class="email-signup-dialog col-md-4 col-md-offset-4">
                        <div class="email-signup-content">
                            <div class="email-signup-header">
                                <button id="newsletterClose" type="button" class="close" data-dismiss="email-signup" aria-label="Close"><span aria-hidden="true" class="fa fa-close"></span></button>
                            </div>
                            <div class="email-signup-body">
                                <div class="brand-white" style="margin: 0 auto -100px auto;"></div>
                                <p class="text-center">
                                    Get Galore updates right in your inbox.
                                </p>
                                <h2 class="text-center"><span>Get On The List</span></h2>
                                <form action="http://galoremag.createsend.com/t/i/s/tjcj/" method="post">
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>