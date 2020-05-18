<?php

class Verify extends Controller
{
	public function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
		$this->load_model('Users');
		$this->view->setLayout('default');
	}

	public function indexAction()
	{
		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
		{
			//dnd($_GET['email']);
			$user = $this->UsersModel->findByEmail($_GET['email']);
			if ($user->email === $_GET['email'] && $user->hash === $_GET['hash'])
			{
				$fields = ['deleted' => 0];
				$db = DB::getInstance();
				$db->update('users', $user->id, $fields);
				$this->view->render('verify/verify');
			}
			else
			{
				$this->view->render('verify/fail');
			}
		}
	}


}