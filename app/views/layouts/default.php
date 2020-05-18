<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title><?=$this->siteTitle(); ?></title>
	<link href="<?=PROOT?>css/w3.css" rel="stylesheet">
	<link href="<?=PROOT?>css/style.css" rel="stylesheet">
	<?= $this->content('head'); ?>
</head>
<body>
	<div class="w3-container w3-blue">
		<ul class="a">
			<li class="a"><a href="<?=PROOT?>" class="cam">Camagru</a></li>
			<li class="a"><a href="<?=PROOT?>register/login" >Log In</a></li>
			<li class="a"><a href="<?=PROOT?>camera" >Camera</a></li>
			<li class="a"><a href="<?=PROOT?>profile">Profile</a></li>
			<li class="a"><a href="<?=PROOT?>register/logout" >Log out</a></li>
		</ul>
	</div>
	<?= $this->content('body'); ?>
</body>
</html>

