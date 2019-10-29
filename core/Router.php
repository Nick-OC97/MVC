<?php

	class Router {

		public static function route($url)
		{
			//controller
			$controller = (isset($url[0]) && url[0] != '') ? ucwords($url[0]): DEFAULT_CONTROLLER;
			dnd($controller);
		}
	}