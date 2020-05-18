<?php

class Profile extends Controller
{
	public function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
	}

	public function indexAction()
	{
		$this->view->render('profile/profile');
	}

	public function changeAction()
	{
		
	}

	public function changeuserAction()
	{
		$this->view->render('profile/changeuser');
		//$user = $this->UsersModel->findByEmail($_POST['email']);
		//$fields = ['username' => ];
		//$db = DB::getInstance();
		//$db->update('users', $user->id, $fields);
		//$this->view->render('profile');
	}

	public function changepasswordAction()
	{

	}

	public function changeemailAction()
	{

	}
}