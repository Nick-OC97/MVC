<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div>
	<form action="" method="post" class="w3-container">
		<div class="w3-text-red"><?= $this->displayErrors ?></div>
		<h3 class="w3-container w3-blue">Register Here!</h3>
		<div>
			<label for="fname" class="w3-text-white">First Name</label>
			<input class="w3-input" type="text" id="fname" name="fname" value="<?=$this->post['fname']?>">
		</div>
		<div>
			<label for="lname" class="w3-text-white">Last Name</label>
			<input class="w3-input" type="text" id="lname" name="lname" value="<?=$this->post['lname']?>">
		</div>
		<div>
			<label for="email" class="w3-text-white">Email</label>
			<input class="w3-input" type="email" id="email" name="email" value="<?=$this->post['email']?>">
		</div>
		<div>
			<label for="username" class="w3-text-white">Choose a Username</label>
			<input class="w3-input" type="text" id="username" name="username" value="<?=$this->post['username']?>">
		</div>
		<div>
			<label for="password" class="w3-text-white">Choose a Password</label>
			<input class="w3-input" type="password" id="password" name="password" value="<?=$this->post['password']?>">
		</div>
		<div>
			<label for="confirm" class="w3-text-white">Confirm Password</label>
			<input class="w3-input" type="password" id="confirm" name="confirm" value="<?=$this->post['confirm']?>">
		</div>
		<div>
			<input class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-left w3-margin" type="submit" value="Register">
		</div>
	</form>
</div>
<?php $this->end(); ?>