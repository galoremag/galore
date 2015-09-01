<?php if(shopp('catalog','has-categories')): ?>
<div class="shop-category">
  <div class="row">

    <div class="col-md-3">
      <h4>Shop</h4>
      <?php shopp('storefront','category-list','hierarchy=on&#038;products=on'); ?>

      <!-- <h4>Lookbooks</h4>
      <ul class="shopp-categories-menu">
      <?php $my_query = new WP_Query('category_name=collections&showposts=10'); ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul> -->
    </div><!--/col-md-3-->

    <div class="col-md-9">
      <h2>Latest Products</h2>
      <?php shopp('storefront','catalog-products', 'title=&show=50'); ?>
    </div><!--/span9-->

  </div><!--/row-->
</div><!--/shop-category-->
<?php endif; ?>
