<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php
  $args = array(
    'tax_query' => array(
      array(
        'taxonomy' => 'people', // change taxonomy
        'field' => 'slug',
        'terms' => 'kylie-jenner'
      )
		)
    );

  $myquery = new WP_Query( $args);
?>

<!-- put the rest of your loop here -->

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-10 col-sm-offset-1">
			<!-- <?php if ( have_posts() ): ?>
        <?php
        	$hero = get_field('hero_image');
        	$upstairs = get_field('upstairs_media');
        	$downstairs = get_field('downstairs_media');
        	$rates = get_field('rates_media');
        	$clients = get_field('client_media');
        ?>

      <div id="hero" class="room container-fluid">
      	<div id="big-brand" class="center-block" style="background: url(<?php echo $hero['sizes']['large']; ?>)">
      		<div id="big-logo">
      			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/figure8-logo-white.svg" />
      			<h3>
      				<?php if(get_field('intro_text')) {
      					echo get_field('intro_text');
      				} ?>
      			</h3>
      		</div>
      		<a id="scroll-down" href="#"><i class="fa fa-chevron-down"></i></a>
      	</div>
      </div> -->
      <?php
        function numberWithCommas($x){
          if ($x < 1000) {
            echo $x;
          }
          else {
            $regex = "/\B(?=(\d{3})+(?!\d))/";
            $intVal = $x;
            $strVal = (string)$x;
            $newVal = preg_replace($regex, "," , $strVal);
            echo $newVal;
          }
        };
      ?>

			<p class="text-center"></p>
      <img class="img-circle img-responsive celebPic" src="data:image/jpeg;base64,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" />
      <h1 class="text-center"><span class="kylieTag">
      <?php
        the_title();
      ?>
      </span></h1>
      <div class="col-sm-12 nopad">
        <table id="bioInfo">
          <tr>
            <td>
              <h2 class="text-right">
                <span class="bioTitles">Age:</span>
                <?php if(get_field('age')) {
                echo get_field('age');
              } ?>
              </h2>
            </td>
            <td>
              <h2>
                <span class="bioTitles">Relationship Status:</span>
                <?php if(get_field('relationship_status')) {
                echo get_field('relationship_status');
              } ?>
              </h2>
            </td>
          </tr>
          <tr>
            <td>
              <h2 class="text-right">
                <span class="bioTitles">Height:</span>
                <?php if(get_field('height')) {
                echo get_field('height');
                } ?>
              <h2>
            </td>
            <td>
              <h2>
                <span class="bioTitles">Net Worth:</span>
                $<?php if(get_field('net_worth')) {
                  echo numberWithCommas(get_field('net_worth'));
                } ?>
              </h2>
            </td>
          </tr>
          <tr>
            <td>
              <h2 class="text-right">
                <span class="bioTitles">Birthday:</span>
              <?php if(get_field('birthday')) {
                echo get_field('birthday');
              } ?>
              </h2>
            </td>
            <td>
              <h2>
                <span class="bioTitles">Follower Count:</span>
                <?php if(get_field('follower_count')) {
                  echo numberWithCommas(get_field('follower_count'));
                } ?>
              <h2>
            </td>
          </tr>
          <tr>
            <td>
              <h2 class="text-right">
                <span class="bioTitles">Hometown:</span>
                <?php if(get_field('hometown')) {
                echo get_field('hometown');
              } ?>
              </h2>
            </td>
            <td>
              <ul>
                <?php if(get_field('facebook')) {
                  echo '<li class="socialMediaBio"><a href="javascript:;" target="popup" onclick="window.open(' . get_field('facebook') . ')"><i class="fa fa-facebook"></i></a></li>';
                } ?>
                <?php if(get_field('instagram')) {
                  echo '<li class="socialMediaBio"><a href="javascript:;" target="popup" onclick="window.open(' . get_field('instagram') . ')"><i class="fa fa-instagram"></i></a></li>';
                } ?>
                <?php if(get_field('twitter')) {
                  echo '<li class="socialMediaBio"><a href="javascript:;" target="popup" onclick="window.open(' . get_field('twitter') . ')"><i class="fa fa-twitter"></i></a></li>';
                } ?>
                <?php if(get_field('personl_website')) {
                  echo '<li class="socialMediaBio"><a href="javascript:;" target="popup" onclick="window.open(' . get_field('personal_website') . ')"><i class="fa fa-globe"></i></a></li>';
                } ?>
                <?php if(get_field('snapchat')) {
                  echo '<li class="socialMediaBio"><a href="javascript:;" target="popup" onclick="window.open(' . get_field('snapchat') . ')"><i class="fa fa-snapchat"></i></a></li>';
                } ?>
              </ul>
            </td>
          </tr>
        </table>
        <div class="col-sm-12">
          <?php if(get_field('bio_paragraph')) {
            echo '<p class="bioParagraph">' . get_field('bio_paragraph') . '</p>';
          }
          ?>
        </div>
      </div>
			<hr></hr>
      <h1 class="text-center"><i class="fa fa-diamond"></i> Recent News <i class="fa fa-diamond"></i></h1>
			<ol>
			<?php while ($myquery->have_posts()) : $myquery->the_post();  ?>
				<li class="post">
					<article class="row-fluid">
						<div class="nopad col-sm-5">
							<div class="catlinks"><?php the_category(); ?></div>
							<div class="thumbnail">
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<h4>Share this post</h4>
							<ul class="post-social pull-left">
								<li><a href="mailto:Friend@somewhere.com?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
								<li><a href="javascript:;" target="popup" onclick="recordShare(); window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" target="popup" onclick="recordShare(); window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
						<div class="nopadright col-sm-7">
							<h3 class="nomartop"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p class="byline"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

							<div class="excerpt"><?php the_excerpt(); ?></div>

							<p class="pull-left"><a href="<?php esc_url( the_permalink() ); ?>">Full Story <i class="fa fa-mars"></i></a></p>

						</div>
					</article>
				</li>
				<hr>
			<?php endwhile; ?>
			</ol>
			<?php else: ?>
			<h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
			<?php endif; ?>

			<h1 class="text-center">And that's all she wrote about <span><?php echo single_tag_title( '', false ); ?></span></h1>

			<hr>

			<!-- <?php
			$tag = get_the_tags( get_query_var( 'people' ) );
			$tags = $tag->slug;
			echo do_shortcode('[ajax_load_more button_label="Loading" ignore_sticky_posts="true" tag="'.$tags.'" offset="0"]');
			?> -->

			<div class="spacer40"></div>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
