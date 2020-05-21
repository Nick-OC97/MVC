<?php

define('DEBUG', true);

//define('DB_DSN_FIRST', 'mysql:host=localhost'); 
define('DB_NAME', 'mvc'); //database name
define('DB_USER', 'root'); //database user
define('DB_PASSWORD', ''); //database password
define('DB_HOST', 'localhost'); //database host




define('DEFAULT_CONTROLLER', 'Home'); //default controller if no url controller is defined

define('DEFAULT_LAYOUT', 'default');

define('SITE_TITLE', 'MVC Framework');

define('PROOT', '/mvc/'); //this is set to '/' for live server.




define('CURRENT_USER_SESSION_NAME', 'jashbvnhuqAbSD');
define('REMEMBER_ME_COOKIE_NAME', 'uughiuhwovwsdnvvlgbrjfoshvADS');
define('REMEMBER_ME_COOKIE_EXPIRY', 604800);


define('ACCESS_RESTRICTED', 'Restricted'); 

	require('database.php');
	try
	{
		$pdo = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'CREATE DATABASE IF NOT EXISTS mvc';
		$pdo->exec($sql);
	}

	catch (Exception $e)
	{
		die('Error: ' . $e->getMessage());
	}
		
	try
	{
		$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$sql = "CREATE TABLE `contacts` (
		`id` int(11) NOT NULL,
		`fname` varchar(150) NOT NULL,
		`lname` varchar(155) NOT NULL,
		`email` varchar(175) NOT NULL,
		`phone1` varchar(50) NOT NULL,
		`phone2` varchar(50) NOT NULL,
		`phone3` varchar(50) NOT NULL,
		`address` varchar(255) NOT NULL,
		`address2` varchar(255) NOT NULL,
		`city` varchar(255) NOT NULL,
		`state` varchar(150) NOT NULL,
		`zip_code` varchar(50) NOT NULL,
		`country` varchar(155) NOT NULL,
		`user_id` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		$pdo->exec($sql);
	
	
		$sql = "CREATE TABLE `users` (
		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`username` varchar(150) NOT NULL,
		`email` varchar(150) NOT NULL,
		`password` varchar(150) NOT NULL,
		`fname` varchar(150) NOT NULL,
		`lname` varchar(150) NOT NULL,
		`hash` varchar(32) NOT NULL,
		`acl` text CHARACTER SET utf8 COLLATE utf8_general_ci,
		`deleted` tinyint(4) DEFAULT '0'
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		$pdo->exec($sql);
	
	
		$sql = "CREATE TABLE `user_sessions` (
		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`user_id` int(11) NOT NULL,
		`session` varchar(255) NOT NULL,
		`user_agent` varchar(255) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		$pdo->exec($sql);

	}

	catch (Exception $e)
	{
		die('Error: ' . $e->getMessage());
	}

	$pdo = null;
?>