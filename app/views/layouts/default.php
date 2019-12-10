<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title><?=$this->siteTitle(); ?></title>
	<link href="<?=PROOT?>css/w3.css" rel="stylesheet">
	<!-- <link href="<?=PROOT?>css/bootstrap.min.css" rel="stylesheet"> -->
	<?= $this->content('head'); ?>
</head>
<body>
	<div class="w3-container w3-blue">
		<ul class="a">
			<li class="a"><a href="<?=PROOT?>" class="cam">Camagru</a></li>
			<li class="a"><a href="<?=PROOT?>/register/login" >Log In</a></li>
			<li class="a"><a href="#contact" >Contact</a></li>
			<li class="a"><a href="#about">About</a></li>  <!-- going to break -->
		</ul>
	</div>
	<?= $this->content('body'); ?>
</body>
</html>

