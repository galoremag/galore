<form action="<?php shopp('checkout','url'); ?>" method="post" class="shopp validate form-horizontal" id="checkout">
<?php //shopp('checkout','cart-summary'); ?>
<?php if (shopp('cart','hasitems')): ?>
<div class="shop-checkout">

<h2>Checkout</h2>

<div class="row">
<div class="span12">
	<div class="well">
	<div class="row">
		<?php shopp('checkout','function'); ?>

				<?php if (shopp('customer','notloggedin')): ?>
				<div class="span12">
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
				</div><!--/span12-->
				<?php endif; ?>

				<?php if (shopp('customer','notloggedin')): ?>
				<div class="span12">
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
				</div><!--/span12-->
				<?php endif; ?>

				<div class="span6">
      	<legend>Your Contact Information</legend>
					<div class="control-group">
						<label for="firstname" class="control-label">First Name</label>
						<div class="controls"><?php shopp('checkout','firstname','required=true&minlength=2&class=input-block-level&title=First Name'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="lastname" class="control-label">Last Name</label>
						<div class="controls"><?php shopp('checkout','lastname','required=true&minlength=3&class=input-block-level&title=Last Name'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="company" class="control-label">Company Name</label>
						<div class="controls"><?php shopp('checkout','company','size=22&class=input-block-level&title=Company/Organization'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="phone" class="control-label">Phone</label>
						<div class="controls"><?php shopp('checkout','phone','format=phone&size=15&class=input-block-level&title=Phone'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="email" class="control-label">Email</label>
						<div class="controls"><?php shopp('checkout','email','required=true&format=email&size=30&class=input-block-level&title=Email'); ?></div>
					</div><!--/control-group-->
				</div><!--/span6-->

				<!-- <div class="span6"><legend>Secure</legend></div> -->
				<div class="clearfix"></div>

				<div class="span6">
				<legend>Billing Address</legend>
				<?php if (shopp('cart','needs-shipped')): ?>
				<div id="billing-address-fields">
				<?php else: ?>
				<?php endif; ?>
					<div class="control-group">
						<label for="billing-name" class="control-label">Full Name</label>
						<div class="controls"><?php shopp('checkout','billing-name','required=false&class=input-block-level&title=Bill to'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-address" class="control-label">Steet Address</label>
						<div class="controls"><?php shopp('checkout','billing-address','required=true&class=input-block-level&title=Billing street address'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-xaddress" class="control-label">Apt, Suite, Bldg. (optional)</label>
						<div class="controls"><?php shopp('checkout','billing-xaddress','title=Billing address line 2&class=input-block-level'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-city" class="control-label">City</label>
						<div class="controls"><?php shopp('checkout','billing-city','required=true&class=input-block-level&title=City billing address'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-state" class="control-label">State</label>
						<div class="controls"><?php shopp('checkout','billing-state','required=true&class=input-block-level&title=State/Provice/Region billing address'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-postcode" class="control-label">Postal / Zip Code</label>
						<div class="controls"><?php shopp('checkout','billing-postcode','required=true&class=input-block-level&title=Postal/Zip Code billing address'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-country" class="control-label">Country</label>
						<div class="controls"><?php shopp('checkout','billing-country','required=true&class=input-block-level&title=Country billing address'); ?></div>
					</div><!--/control-group-->
					</div><!--/billing-address-fields-->
				</div><!--/span6-->

				<div class="span6">
				<legend>
					Shipping Address
					<div class="pull-right"><?php shopp('checkout','same-shipping-address'); ?></div>
				</legend>
				<?php if (shopp('cart','needs-shipped')): ?>
				<div id="shipping-address-fields" style="display:none">
					<div class="control-group">
            <label for="shipping-name" class="control-label">Full Name</label>
            <div class="controls"><?php shopp('checkout','shipping-name','required=false&class=input-block-level&title=Bill to'); ?></div>
          </div><!--/control-group-->
          <div class="control-group">
            <label for="shipping-address" class="control-label">Steet Address</label>
            <div class="controls"><?php shopp('checkout','shipping-address','required=true&class=input-block-level&title=shipping street address'); ?></div>
          </div><!--/control-group-->
          <div class="control-group">
            <label for="shipping-xaddress" class="control-label">Apt, Suite, Bldg. (optional)</label>
            <div class="controls"><?php shopp('checkout','shipping-xaddress','title=shipping address line 2&class=input-block-level'); ?></div>
          </div><!--/control-group-->
          <div class="control-group">
            <label for="shipping-city" class="control-label">City</label>
            <div class="controls"><?php shopp('checkout','shipping-city','required=true&class=input-block-level&title=City shipping address'); ?></div>
          </div><!--/control-group-->
          <div class="control-group">
            <label for="shipping-state" class="control-label">State</label>
            <div class="controls"><?php shopp('checkout','shipping-state','required=true&class=input-block-level&title=State/Provice/Region shipping address'); ?></div>
          </div><!--/control-group-->
          <div class="control-group">
            <label for="shipping-postcode" class="control-label">Postal / Zip Code</label>
            <div class="controls"><?php shopp('checkout','shipping-postcode','required=true&class=input-block-level&title=Postal/Zip Code shipping address'); ?></div>
          </div><!--/control-group-->
          <div class="control-group">
            <label for="shipping-country" class="control-label">Country</label>
            <div class="controls"><?php shopp('checkout','shipping-country','required=true&class=input-block-level&title=Country shipping address'); ?></div>
          </div><!--/control-group-->
				</div><!--/shipping-address-fields-->
				<?php else: ?>
				<?php endif; ?>
				</div><!--/span6--><div class="clearfix"></div>

				<div class="span6">

				<?php if (shopp('checkout','billing-localities')): ?>
				<div class="half locale hidden">
					<div class="control-group">
						<label for="billing-locale" class="control-label">Local Jurisdiction</label>
						<div class="controls"><?php shopp('checkout','billing-locale'); ?></div>
						</div><!--/control-group-->
				</div><!--/locale-->
				<?php endif; ?>


				<?php shopp('checkout','payment-options'); ?>
				<?php shopp('checkout','gateway-inputs'); ?>


				<?php if (shopp('checkout','card-required')): ?>
				<div class="payment">
					<legend>Payment Information</legend>
					<div class="control-group">
						<label for="billing-cardholder" class="control-label">Name on Card</label>
						<div class="controls"><?php shopp('checkout','billing-cardholder','required=true&size=30&class=input-block-level&title=Card Holder\'s Name'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-cardtype" class="control-label">Card Type</label>
						<div class="controls"><?php shopp('checkout','billing-cardtype','required=true&class=input-block-level&title=Card Type'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-card" class="control-label">Card Number</label>
						<div class="controls"><?php shopp('checkout','billing-card','required=true&size=30&class=input-block-level&title=Credit/Debit Card Number'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-cardexpires-mm" class="control-label">MM</label>
						<div class="controls"><?php shopp('checkout','billing-cardexpires-mm','size=4&required=true&minlength=2&maxlength=2&class=input-block-level&title=Card\'s 2-digit expiration month'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-cardexpires-yy" class="control-label">YY</label>
						<div class="controls"><?php shopp('checkout','billing-cardexpires-yy','size=4&required=true&minlength=2&maxlength=2&class=input-block-level&title=Card\'s 2-digit expiration year'); ?></div>
					</div><!--/control-group-->
					<div class="control-group">
						<label for="billing-cvv" class="control-label">Card Security Code</label>
						<div class="controls"><?php shopp('checkout','billing-cvv','size=7&minlength=3&maxlength=4&class=input-block-level&title=Card\'s security code (3-4 digits on the back of the card)'); ?></div>
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
			</div><!--/span6-->

			<div class="span6">
				<legend>Secure Payment <i class="ss-icon ss-standard">&#x1F512;</i></legend>
				<p>This is a secure 128-bit SSL Encryption payment. You're Safe.</p>
				<span id="siteseal"><script type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=wJvwFTptDbKXsIEPMJQDLCyNeMlGaNRUfaG7kbDlEgmbx1tz2NcX9Q"></script></span>
			</div><!--/span6-->

		</div><!--/row-->
</div><!--/well-->
</div><!--/span12-->
</div><!--/row-->
</div><!--/shop-checkout-->
<?php endif; ?>
</form>
