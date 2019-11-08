<?php

	function dnd($data)
	{
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
		die();
	}

	function sanitize($dirty)
	{
		return (htmlentities($dirty, ENT_QUOTES, 'URF-8'));
	}

	function currentUser()
	{
		return Users::currentLoggedInUser();
	}