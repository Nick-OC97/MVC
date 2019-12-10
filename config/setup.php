
	CREATE TABLE `contacts` (
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
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;


	CREATE TABLE `users` (
	`id` int(11) NOT NULL,
	`username` varchar(150) NOT NULL,
	`email` varchar(150) NOT NULL,
	`password` varchar(150) NOT NULL,
	`fname` varchar(150) NOT NULL,
	`lname` varchar(150) NOT NULL,
	`acl` text CHARACTER SET utf8 COLLATE utf8_general_ci,
	`deleted` tinyint(4) DEFAULT '0'
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;


	CREATE TABLE `user_sessions` (
	`id` int(11) NOT NULL,
	`user_id` int(11) NOT NULL,
	`session` varchar(255) NOT NULL,
	`user_agent` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;