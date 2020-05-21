<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div>
<?php //dnd($_SESSION); ?>
<p></p>
<a href="<?=PROOT?>profile/changeuser" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-left">Change</a>
</div>
<br>
<br>
<div>
<p>password</p>
<a href="<?=PROOT?>profile/changepassword" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-left">Change</a>
</div>
<br>
<br>
<div>
<p>email</p>
<a href="<?=PROOT?>profile/changeemail" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-left">Change</a>
</div>
<?php $this->end(); ?>