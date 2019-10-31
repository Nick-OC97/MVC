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
			$fields = [
				'fname' => 'Toni',
				'lname' => 'Parham',
				'email' => 'toni@stark.com'
			];
			$contactsQ = $db->insert('contacts', $fields);
			//dnd($contactsQ);
			$this->view->render('home/index');
		}
	}