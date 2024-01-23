<?php
/**
 * The Sidebar containing the main widget area for the galoretv page.
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */
?>
<div class="col-md-4">
		<div class="sidebar-nav">
            <?php
    if ( function_exists('dynamic_sidebar')) dynamic_sidebar("sidebar-shop");
?>
</div><!--/.well .sidebar-nav -->
</div><!-- /.span4 -->
</div><!-- /.row .content -->

