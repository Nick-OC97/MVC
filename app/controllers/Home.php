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
				'id' => '2',
			];
			$contactsQ = $db->update('contacts', 4, $fields); */
			$contacts = $db->query("SELECT * FROM contacts ORDER BY lname, fname")->results();
			dnd($contacts);
			$this->view->render('home/index');
		}
	}