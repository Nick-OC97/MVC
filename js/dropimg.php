<?php


	$upload_dir = 'img/';
	$img = $_POST['img'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = $upload_dir.mktime().'.png';
	$success = file_put_contents($file, $data);
	echo $success ? $file : 'Unable to save the file.';