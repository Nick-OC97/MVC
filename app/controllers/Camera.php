<?php

	class Camera extends Controller
	{
		public function __construct($controller, $action)
		{
			parent::__construct($controller, $action);
		}

		public function indexAction() 
		{
			$this->view->render('camera/camera');
		}

		public function photoAction()
		{
			if (isset($_POST['imgData']))
			{
				$filter = $_POST['filter'];
				$data = $_POST['imgData'];
				$data = str_replace('data:image/png;base64,', '', $data);
				$data = str_replace(' ', '+', $data);
				$data = base64_decode($data);
				$image = imagecreatefromstring($data);

				$user = $this->UsersModel->currentLoggedInUser()->id;				
				$file_name = time().rand().".png";

				imagepng($image, PROOT."/images/". $file_name);
				$this->PostsModel->uploadImage($file_name, $user);

				die();
			}
		}
	}
