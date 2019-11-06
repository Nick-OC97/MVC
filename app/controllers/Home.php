<?php
	class Home extends Controller
	{
		public function __construct($controller, $action)
		{
			parent::__construct($controller, $action);
		}

		public function indexAction()
		{
			$db = DB::getInstance();
/* 			$fields = [
				'fname' => 'nick',
				'lname' => 'OConnell',
				'email' => 'nick@hi.com',
				'id' => '7'
			]; */
			//$contactsQ = $db->update('contacts', 11, $fields);
			//$contacts = $db->query("SELECT * FROM contacts ORDER BY lname, fname")->count();
/* 			$contacts = $db->findFirst('contacts', [
				'conditions' => "lname = ?",
				'bind' => ['parham'],
				'order' => "lname, fname",
				'limit' => 4
			]); */
			//dnd($contacts);
			$this->view->render('home/index');
		}
	}