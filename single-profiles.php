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
  global $post;
  $person = $post->post_name;
  $args = array(
    'tax_query' => array(
      array(
        'post_type' => 'post',
        'tax_query' => array(
          array(
            'taxonomy' => 'people', // change taxonomy
            'field' => 'slug',
            'terms' => $person
            )
		      )
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
      <img class="img-circle img-responsive celebPic" src="<?php $hero = get_field('profile_image'); if(get_field('profile_image')) { echo $hero['sizes']['large']; } ?>" />
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
							<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
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
