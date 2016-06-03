<?php
  $adlist = get_posts('numberposts=1&order=DESC&orderby=date&offset=0&post_type=sponsor');
  foreach ($adlist as $post) :
  setup_postdata($post);
?>

<li class="post specialMd">
  <article class="row-fluid">
    <div class="nopad col-sm-5">
      <div class="specialFlagMd">Presenting </i><?php echo get_post_meta( $post->ID, 'sponsor', true ); ?></div>
      <div class="thumb">
        <a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="<?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
      </div>
      <h4 class="hidden-xs">Share this post</h4>
      <ul class="post-social pull-left hidden-xs">
        <li><a class="share-email" href="/cdn-cgi/l/email-protection#2365514a464d4763504c4e46544b4651460d404c4e1c505641494640571e1f1c534b5303574b467c574a574f460b0a18031c1d05424e5318414c475a1e1f1c534b53X the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
        <li><a class="share-facebook" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Share this post on Facebook','width=600,height=400')"><i class="fa fa-facebook"></i></a></li>
        <li><a class="share-twitter" href="#" target="popup" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>','Tweet this post','width=600,height=400')"><i class="fa fa-twitter"></i></a></li>
        <li class="visible-xs"><h4>Share This Post</h4></li>
      </ul>
    </div>
    <div class="nopadright col-sm-7">
      <h3 class="nomartop"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" title="Permalink to <?php the_title(); ?>" target="_blank" rel="bookmark"><?php the_title(); ?></a></h3>
      <p class="byline hidden-xs"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>
      <p class="byline visible-xs pull-left nomarg"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('M j, Y \@\ g:i a'); ?></time> <br /> <i class="pink fa fa-flash"></i> <?php the_author_posts_link(); ?></p>

      <div class="excerpt hidden-xs"><?php the_excerpt(); ?></div>

      <p class="pull-left hidden-xs"><a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" target="_blank" >Full Story <i class="fa fa-mars"></i></a></p>

      <IMG class="specialPixel" SRC="https://ad.doubleclick.net/ddm/ad/N9556.2353504GALORE/B9575230.132666268;sz=1x1;ord=[timestamp];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement">
      <a href="https://ad.doubleclick.net/ddm/clk/305314311;132666268;w"/></a>

    </div>
  </article>
</li>

<hr />

<?php endforeach; ?>

<?php wp_reset_postdata(); ?>
