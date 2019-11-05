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
				'fname' => 'mike',
				'lname' => 'OConnell',
				'email' => 'mike@hi.com'
				'id' => '3'
			]; */
			//$contactsQ = $db->update('contacts', 5, $fields);
			//$contacts = $db->query("SELECT * FROM contacts ORDER BY lname, fname")->count();
			$contacts = $db->find('contacts', [
				'conditions' => "lname = ?",
				'bind' => ['parham'],
				'order' => "lname, fname",
				'limit' => 5
			]);
			dnd($contacts);
			$this->view->render('home/index');
		}
	}