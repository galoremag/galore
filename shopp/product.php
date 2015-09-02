<?php // Get the Page Title, then encode it ?>
<?php $title = get_post_field('post_title', $post_id, 'raw'); $title = urlencode($title); ?>
<?php // Get the URL, then encode it ?>
<?php $url = get_permalink(); $url = urlencode($url); ?>
<?php // Get the Feature Image Thumbnail, get just the first?, then encode it ?>
<?php $thumburl = shopp('product','coverimage', 'setting=full-image&property=url&echo=off'); ?>

<?php // shopp('catalog','breadcrumb')?>

<div class="shop-product">
  <div class="row">

    <?php if (shopp('product','found')): ?>
    <div class="col-md-6">
      <?php shopp('product','gallery','p_setting=full-image'); ?>
      <!-- <?php shopp('product','coverimage','size=full-image'); ?>
      <ul class="product-thumbnails">
        <?php while(shopp('product','images')): ?>
          <li>
            <a href="<?php shopp('product', 'image', 'setting=full-image&property=src'); ?>"><?php shopp('product', 'image', 'setting=gallery-thumbnails&fit=crop'); ?></a>
          </li>
        <?php endwhile; ?>
      </ul> -->
    </div><!--/col-md-6-->

    <div class="col-md-6">

      <!-- Title -->
      <h3><?php shopp('product','name'); ?></h3>
      <!-- Price -->
      <?php if (shopp('product','onsale')): ?>
      <h3 class="original price"><?php shopp('product','price'); ?></h3>
      <h3 class="sale price"><?php shopp('product','saleprice'); ?></h3>
      <?php if (shopp('product','has-savings')): ?>
      <p class="savings">You save <?php shopp('product','savings'); ?> (<?php shopp('product','savings','show=%'); ?>)!</p>
      <?php endif; ?>
      <?php else: ?>
      <p class="price"><?php shopp('product','price'); ?></p>
      <?php endif; ?>

      <!-- Free Shipping -->
      <?php // if (shopp('product','freeshipping')): ?>
      <?php //<p class="freeshipping">Free Shipping!</p> ?>
      <?php // endif; ?>

      <div id="product-details">
      <!-- Summary -->
      <!-- <p class="headline"><?php // shopp('product','summary'); ?></p> -->
      <!-- Description -->
      <?php shopp('product','description'); ?>
      <!-- Details & Specs -->
      <?php if(shopp('product','has-specs')): ?>
      <dl class="details">
        <?php while(shopp('product','specs')): ?>
        <dt><?php shopp('product','spec','name'); ?>:</dt><dd><?php shopp('product','spec','content'); ?></dd>
        <?php endwhile; ?>
      </dl>
       <?php endif; ?>
    </div><!--/product-details-->


      <ul class="share">
        <li><strong>Share:</strong></li>
        <li><a class="share-facebook" href="//www.facebook.com/sharer.php?u=<?php echo $url; ?>" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF610;</i></a></li>
        <li><a class="share-twitter" href="//twitter.com/share?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=TheGaloreMag" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF611;</i></a></li>
        <li><a class="share-pinterest" href="//pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $thumburl; ?>&description=<?php echo $title; ?>" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF650;</i></a></li>
        <li><a class="share-google" href="//plus.google.com/share?url=<?php echo $url; ?>" rel="nofollow" target="_blank"><i class="ss-icon ss-social-regular">&#xF613;</i></a></li>
        <li><a class="share-fancy" href="//www.fancy.com/fancyit?ItemURL=<?php echo $url; ?>&Title=<?php echo $title; ?>&Category=Women's&ImageURL=<?php echo $thumburl; ?>" rel="nofollow" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/fancy.png"></a></li>
      </ul><!--/social-->

      <form action="<?php shopp('cart','url'); ?>" method="post" class="shopp product validate validation-alerts">
        <?php if(shopp('product','has-variations')): ?>
        <ul class="variations">
          <?php shopp('product','variations','mode=multiple&label=true&before_menu=<li>&after_menu=</li>'); ?>
        </ul>
        <?php endif; ?>
        <?php if(shopp('product','has-addons')): ?>
        <ul class="addons">
          <?php shopp('product','addons','mode=menu&label=true&defaults=Select an add-on&before_menu=<li>&after_menu=</li>'); ?>
        </ul>
        <?php endif; ?>
        <!-- Quantity -->
        <?php // shopp('product','quantity'); ?>
        <!-- Add to Cart -->
        <?php shopp('product','addtocart', 'class=btn btn-block btn-large btn-success'); ?>
      </form>





    </div><!--/col-md-6-->



    <?php else: ?>
    <h3>Product Not Found</h3>
    <p>Sorry! The product you requested is not found in our catalog!</p>
    <?php endif; ?>

  </div><!--/row-->
</div><!--/shop-category-->
</div><!--/shopp-->
