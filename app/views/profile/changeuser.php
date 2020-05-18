<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div>
	<label for="username" class="w3-text-white">Choose a new Username</label>
	<input class="w3-input" type="text" id="username" name="username" >
</div>
<div>
	<input type="submit" value="change" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-left">
</div>
<?php $this->end(); ?>