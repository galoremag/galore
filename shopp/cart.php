<?php if (shopp('cart','hasitems')): ?>
<div class="shop-cart">
	<h2>Items in Your Cart</h2>
	<p><a href="/shop"><i class="fa fa-long-arrow-left"></i> Keep Shopping</a></p>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<div class="row">
					<form id="cart" action="<?php shopp('cart','url'); ?>" method="post">
						<?php shopp('cart','function'); ?>
						<div class="col-sm-12">
							<table class="cart">
								<thead>
									<tr>
										<th scope="col" class="item">Product</th>
										<th scope="col" class="money">Price</th>
										<th scope="col" class="qty">Qty.</th>
										<th scope="col" class="money">Total</th>
										<th scope="col" class="remove">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php while(shopp('cart','items')): ?>
									<tr>
										<td>
											<a href="<?php shopp('cartitem','url'); ?>">
												<?php shopp('cartitem','thumbnail','setting=cart'); ?>
												<span class="cartitem-name"><?php shopp('cartitem','name'); ?></span>
												<span class="cartitem-options"><?php shopp('cartitem','options', 'show=selected'); ?></span>
											</a>
											<?php shopp('cartitem','addons-list'); ?>
											<?php shopp('cartitem','inputs-list'); ?>
										</td>
										<td class="money"><?php shopp('cartitem','unitprice'); ?></td>
										<td><?php shopp('cartitem','quantity','input=text&class=col-sm-1 pull-right'); ?></td>
										<td class="money"><?php shopp('cartitem','total'); ?></td>
										<td>
											<?php shopp('cartitem','remove','label=X&input=button'); ?>
										</td>
									</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
							<?php while(shopp('cart','promos')): ?>
							<tr><td colspan="4" class="money"><?php shopp('cart','promo-name'); ?><strong><?php shopp('cart','promo-discount',array('before' => '&nbsp;&mdash;&nbsp;')); ?></strong></td></tr>
							<?php endwhile; ?>
						</div><!--/col-sm-12-->
						<div class="col-md-9 "><br/>
							<?php // if (shopp('cart','needs-shipping-estimates')): ?>
							<h4>Estimate Shipping &amp; Tax</h4>
							<p>Enter your shipping destination to get an estimate.</p>
							<?php // shopp('cart','shipping-estimates'); ?>
							<?php // endif; ?>
						</div>
						<div class="col-sm-3 pull-right">
							<?php shopp('cart','update-button', 'value=Update Cart&class=btn btn-small btn-bp'); ?>
							<hr>
							<?php shopp('cart','promo-code','class=btn btn-small btn-bp pull-right'); ?>
							<table class="order-total">
								<tbody>
									<tr class="totals">
										<th scope="row">Subtotal</th>
										<td class="money"><?php shopp('cart','subtotal'); ?></td>
									</tr>
									<?php if (shopp('cart','hasdiscount')): ?>
									<tr class="totals">
										<th scope="row">Discount</th>
										<td class="money">-<?php shopp('cart','discount'); ?></td>
									</tr>
									<?php endif; ?>
									<?php if (shopp('cart','needs-shipped')): ?>
									<tr class="totals">
										<th scope="row"><?php shopp('cart','shipping','label=Shipping'); ?></th>
										<td class="money"><?php shopp('cart','shipping'); ?></td>
									</tr>
									<?php endif; ?>
									<tr class="totals">
										<th scope="row"><?php shopp('cart','tax','label=Tax'); ?></th>
										<td class="money"><?php shopp('cart','tax'); ?></td>
									</tr>
									<tr class="totals total">
										<th scope="row">Grand Total</th>
										<td class="money"><?php shopp('cart','total'); ?></td>
									</tr>
								</tbody>
							</table>
							<a href="<?php shopp('checkout','url'); ?>" class="right btn btn-bp btn-block btn-large">Secure Checkout &rsaquo;</a>
						</div><!--/col-md-3-->
						<div class="col-sm-12">
							<big>
							<a href="<?php shopp('cart','referrer'); ?>">&laquo; Continue Shopping</a>
							<!-- <a href="<?php shopp('checkout','url'); ?>" class="right">Proceed to Checkout &raquo;</a> -->
							</big>
						</div>
							
					</form>

					<?php else: ?>
					<h2>Your Cart Is Empty :(</h2>
					<p>There are currently no items in your shopping cart.</p>
					<p><a href="<?php shopp('catalog','url'); ?>">&laquo; Continue Shopping</a></p>
					<?php endif; ?>
					
					</div><!--/col-sm-12-->
				</div><!--/row-->
			</div><!--/well-->
		</div><!--/col-sm-12-->
	</div><!--/row-->
</div><!--/shop-category-->