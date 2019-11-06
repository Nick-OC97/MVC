<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
	<form class="" action="<?=PROOT?>register/login" method="post">
		<h3 class="">Log In</h3>
		<div class="">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="">
		</div>
		<div class = "">
			<label for="password">Password</label>
			<input type="text" name="password" id="password" class="">
		</div>
		<div class="">
			<label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value="on"></label>
		</div>
		<div class="">
			<input type="submit" value="login" class="">
		</div>
		<div class="">
			<a href="<?=PROOT?>register/register" class="">Register</a>
		</div>
	</form>
</div>
<?php $this->end(); ?>