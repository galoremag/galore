<?php if(shopp('category','hasproducts','load=coverimages')): ?>

	<div class="shop-products">
	  <div class="row">
			<?php // shopp('catalog','breadcrumb'); ?>
			<div class="col-sm-12">
				<h2><?php shopp('collection','name'); ?></h2>
			</div><!--/span12-->
			<?php // shopp('catalog','views','label=Views: '); ?>
			<?php // shopp('category','subcategory-list','hierarchy=true&showall=true&class=subcategories&dropdown=1'); ?>
			<?php // shopp('catalog','orderby-list','dropdown=on'); ?>
			<?php // shopp('category','pagination','show=10'); ?>

			<?php while(shopp('category','products')): ?>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<a href="<?php shopp('product','url'); ?>">
						<?php shopp('product','coverimage','setting=full-image'); ?>
						<h3><?php shopp('product','name'); ?></h3>

						<!-- <p class="price"><?php // shopp('product','saleprice','starting=from'); ?> </p> -->

							<?php // global $Shopp; ?>
							<?php $product_stock = shopp('product','outofstock'); ?>
							<?php if($product_stock == 'Sold'): ?>
								<p class="sold">Sold Out</p>
							<?php else: ?>
								<div class="price"><?php shopp('product','price'); ?>
                                  <?php if (shopp('product','has-savings')): ?>
							      <div class="savings">Save <?php shopp('product','savings','show=percent'); ?></div>
						    <?php endif; ?>
                                </div>
							<?php endif; ?>
					</a>
				</div><!--/span3-->
			<?php endwhile; ?>

			<div class="col-sm-12">
				<?php // shopp('category','pagination','show=50'); ?>
			</div><!--/col-sm-12-->

	</div><!--/row-->
</div><!--/shop-products-->

<?php else: ?>
	<?php if (!shopp('catalog','is-landing')): ?>
	<?php shopp('catalog','breadcrumb'); ?>
	<h3><?php shopp('category','name'); ?></h3>
	<p>No products were found.</p>
	<?php endif; ?>
<?php endif; ?>
