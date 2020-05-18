<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div>
	<p>Please log In before verifying email</p>
	<form class="w3-container w3-white" action="<?=PROOT?>register/login" method="post">
		<div><?=$this->displayErrors ?></div>
		<h3 class="w3-container w3-blue">Log In</h3>
		<div>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="w3-input">
		</div>
		<div>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="w3-input">
		</div>
		<div>
			<label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value="on" class="w3-check w3-margin"></label>
		</div>
		<div class="">
			<input type="submit" value="login" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-left">
		</div>
		<div>
			<a href="<?=PROOT?>register/register" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-right">Register</a>
		</div>
	</form>
</div>
<?php $this->end(); ?>