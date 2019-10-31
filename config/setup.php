<?php

	'CREATE TABLE `contacts` (
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
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;'

?>