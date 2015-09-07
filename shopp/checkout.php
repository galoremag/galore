<form action="<?php shopp('checkout','url'); ?>" method="post" class="shopp validate form-horizontal" id="checkout">
	<?php //shopp('checkout','cart-summary'); ?>
	<?php if (shopp('cart','hasitems')): ?>
	<div class="shop-checkout">
		<h2>Checkout</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="row-fluid">
					<?php shopp('checkout','function'); ?>
					<?php if (shopp('customer','notloggedin')): ?>
					<div class="col-sm-12">
						<ul>
							<li>
								<label for="login">Login to Your Account</label>
								<label for="account-login">Email</label>
								<?php shopp('customer','account-login','size=20&title=Login'); ?>
							</li>
							<li>
								<label for="password-login">Password</label>
								<?php shopp('customer','password-login','size=20&title=Password'); ?>
							</li>
							<li>
								<?php shopp('customer','login-button','context=checkout&value=Login'); ?>
							</li>
						</ul>
					</div><!--/col-sm-12-->
					
					<?php endif; ?>
					<?php if (shopp('customer','notloggedin')): ?>
					
					<div class="col-sm-12">
						<ul>
							<li>
								<?php shopp('checkout','password','required=true&format=passwords&size=16&title=Password'); ?>
								<label for="password">Password</label>
							</li>
							<li>
								<?php shopp('checkout','confirm-password','required=true&format=passwords&size=16&title=Password Confirmation'); ?>
								<label for="confirm-password">Confirm Password</label>
							</li>
						</ul>
					</div><!--/col-sm-12-->
					
					<?php endif; ?>
					
					<div class="col-md-6">
						<h3>Your Contact Information</h3>
						<div class="form-group">
							<label for="firstname">First Name</label>
							<?php shopp('checkout','firstname','required=true&minlength=2&class=form-control&title=First Name'); ?>
						</div><!--/form-group-->
						<div class="form-group">
							<label for="lastname">Last Name</label>
							<?php shopp('checkout','lastname','required=true&minlength=3&class=form-control&title=Last Name'); ?>
						</div><!--/form-group-->
						<div class="form-group">
							<label for="company">Company Name</label>
							<?php shopp('checkout','company','size=22&class=form-control&title=Company/Organization'); ?>
						</div><!--/form-group-->
						<div class="form-group">
							<label for="phone">Phone</label>
							<?php shopp('checkout','phone','format=phone&size=15&class=form-control&title=Phone'); ?>
						</div><!--/form-group-->
						<div class="form-group">
							<label for="email">Email</label>
							<?php shopp('checkout','email','required=true&format=email&size=30&class=form-control&title=Email'); ?>
						</div><!--/form-group-->
					</div><!--/col-md-6-->
					
					<!-- <div class="col-md-6"><h3>Secure</h3></div> -->
					<div class="clearfix"></div>
					
					<div class="col-md-6">
						<h3>Billing Address</h3>
						<?php if (shopp('cart','needs-shipped')): ?>
							
						<div id="billing-address-fields" class="row-fluid">
							<?php else: ?>
							<?php endif; ?>
							<div class="form-group">
								<label for="billing-name">Full Name</label>
								<?php shopp('checkout','billing-name','required=false&class=form-control&title=Bill to'); ?>
							</div><!--/form-group-->
							<div class="form-group">
								<label for="billing-address">Steet Address</label>
								<?php shopp('checkout','billing-address','required=true&class=form-control&title=Billing street address'); ?>
							</div><!--/form-group-->
							<div class="form-group">
								<label for="billing-xaddress">Apt, Suite, Bldg. (optional)</label>
								<?php shopp('checkout','billing-xaddress','title=Billing address line 2&class=form-control'); ?>
							</div><!--/form-group-->
							<div class="form-group">
								<label for="billing-city">City</label>
								<?php shopp('checkout','billing-city','required=true&class=form-control&title=City billing address'); ?>
							</div><!--/form-group-->
							<div class="form-group">
								<label for="billing-state">State</label>
								<?php shopp('checkout','billing-state','required=true&class=form-control&title=State/Provice/Region billing address'); ?>
							</div><!--/form-group-->
							<div class="form-group">
								<label for="billing-postcode">Postal / Zip Code</label>
								<?php shopp('checkout','billing-postcode','required=true&class=form-control&title=Postal/Zip Code billing address'); ?>
							</div><!--/form-group-->
							<div class="form-group">
								<label for="billing-country">Country</label>
								<?php shopp('checkout','billing-country','required=true&class=form-control&title=Country billing address'); ?>
							</div><!--/form-group-->
						</div><!--/billing-address-fields-->
					</div><!--/col-md-6-->
					
					<div class="col-md-6">
						<h3>
							Shipping Address
							<div class=""><?php shopp('checkout','same-shipping-address'); ?></div>
						</h3>
						<?php if (shopp('cart','needs-shipped')): ?>
						<div id="shipping-address-fields" style="display:none">
							<div class="control-group">
								<label for="shipping-name" class="control-label">Full Name</label>
								<?php shopp('checkout','shipping-name','required=false&class=form-control&title=Bill to'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="shipping-address" class="control-label">Steet Address</label>
								<?php shopp('checkout','shipping-address','required=true&class=form-control&title=shipping street address'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="shipping-xaddress" class="control-label">Apt, Suite, Bldg. (optional)</label>
								<?php shopp('checkout','shipping-xaddress','title=shipping address line 2&class=form-control'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="shipping-city" class="control-label">City</label>
								<?php shopp('checkout','shipping-city','required=true&class=form-control&title=City shipping address'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="shipping-state" class="control-label">State</label>
								<?php shopp('checkout','shipping-state','required=true&class=form-control&title=State/Provice/Region shipping address'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="shipping-postcode" class="control-label">Postal / Zip Code</label>
								<?php shopp('checkout','shipping-postcode','required=true&class=form-control&title=Postal/Zip Code shipping address'); ?>
							</div><!--/control-group-->
							
							<div class="control-group">
								<label for="shipping-country" class="control-label">Country</label>
								<?php shopp('checkout','shipping-country','required=true&class=form-control&title=Country shipping address'); ?>
							</div><!--/control-group-->
						</div><!--/shipping-address-fields-->
						
						<?php else: ?>
						<?php endif; ?>
						
					</div><!--/col-md-6-->

					<div class="clearfix"></div>
					
					<div class="col-md-6">
						<?php if (shopp('checkout','billing-localities')): ?>
						<div class="half locale hidden">
							<div class="control-group">
								<label for="billing-locale" class="control-label">Local Jurisdiction</label>
								<?php shopp('checkout','billing-locale'); ?>
							</div><!--/control-group-->
						</div><!--/locale-->
						
						<?php endif; ?>
						<?php shopp('checkout','payment-options'); ?>
						<?php shopp('checkout','gateway-inputs'); ?>
						<?php if (shopp('checkout','card-required')): ?>
						
						<div class="payment">
							<h3>Payment Information</h3>
							<div class="control-group">
								<label for="billing-cardholder" class="control-label">Name on Card</label>
								<?php shopp('checkout','billing-cardholder','required=true&size=30&class=form-control&title=Card Holder\'s Name'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="billing-cardtype" class="control-label">Card Type</label>
								<?php shopp('checkout','billing-cardtype','required=true&class=form-control&title=Card Type'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="billing-card" class="control-label">Card Number</label>
								<?php shopp('checkout','billing-card','required=true&size=30&class=form-control&title=Credit/Debit Card Number'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="billing-cardexpires-mm" class="control-label">MM</label>
								<?php shopp('checkout','billing-cardexpires-mm','size=4&required=true&minlength=2&maxlength=2&class=form-control&title=Card\'s 2-digit expiration month'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="billing-cardexpires-yy" class="control-label">YY</label>
								<?php shopp('checkout','billing-cardexpires-yy','size=4&required=true&minlength=2&maxlength=2&class=form-control&title=Card\'s 2-digit expiration year'); ?>
							</div><!--/control-group-->
							<div class="control-group">
								<label for="billing-cvv" class="control-label">Card Security Code</label>
								<?php shopp('checkout','billing-cvv','size=7&minlength=3&maxlength=4&class=form-control&title=Card\'s security code (3-4 digits on the back of the card)'); ?>
							</div><!--/control-group-->
							
							<?php if (shopp('checkout','billing-xcsc-required')): // Extra billing security fields ?>
							<label for="billing-xcsc-start">Start Date</label>
							<?php shopp('checkout','billing-xcsc','input=start&size=7&minlength=5&maxlength=5&title=Card\'s start date (MM/YY)'); ?>
							<label for="billing-xcsc-issue">Issue #</label>
							<?php shopp('checkout','billing-xcsc','input=issue&size=7&minlength=3&maxlength=4&title=Card\'s issue number'); ?>
							<?php endif; ?>
						</div><!--/payment-->
						<?php endif; ?>
						<!-- <div class="inline"><label for="marketing"><?php shopp('checkout','marketing'); ?> Yes, I would like to receive e-mail updates and special offers!</label></div> -->
						<p class="submit"><?php shopp('checkout','submit','value=Submit Order&class=btn btn-success btn-block btn-large'); ?></p>
					</div><!--/col-md-6-->
					
					<div class="col-md-6">
						<h3>Secure Payment <i class="ss-icon ss-standard">&#x1F512;</i></h3>
						<p>This is a secure 128-bit SSL Encryption payment. You're Safe.</p>
						<span id="siteseal"><script type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=wJvwFTptDbKXsIEPMJQDLCyNeMlGaNRUfaG7kbDlEgmbx1tz2NcX9Q"></script></span>
					</div><!--/col-md-6-->
				</div><!--/row-->
			</div><!--/col-sm-12-->
		</div><!--/row-->
	</div><!--/shop-checkout-->
	
	<?php endif; ?>

</form>