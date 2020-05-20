<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '/opt/lampp/htdocs/mvc/PHPMailer/src/Exception.php';
	require '/opt/lampp/htdocs/mvc/PHPMailer/src/PHPMailer.php';
	require '/opt/lampp/htdocs/mvc/PHPMailer/src/SMTP.php';

	class Users extends Model
	{
		private $_isLoggedIn, $_sessionName, $_cookieName;
		public static $currentLoggedInUser = null;

		public function __construct($user='')
		{
			$table = 'users';
			parent::__construct($table);
			$this->_sessionName = CURRENT_USER_SESSION_NAME;
			$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
			$this->_softDelete = true;
			if ($user != '')
			{
				if (is_int($user))
				{
					$u = $this->_db->findFirst('users',['conditions'=>'id = ?', 'bind'=>[$user]]);
				}
				else
				{
					$u = $this->_db->findFirst('users',['conditions'=>'username = ?', 'bind'=>[$user]]);
				}
				if($u)
				{
					foreach($u as $key => $val)
					{
						$this->$key = $val;
					}
				}
			}
		}

		public function findByUsername($username)
		{
			return $this->findFirst(['conditions'=> "username = ?", 'bind'=>[$username]]);
		}

		public function findByEmail($email)
		{
			return $this->findFirst(['conditions'=> "email = ?", 'bind'=>[$email]]);
		}

		public static function currentLoggedInUser()
		{
			if (!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME))
			{
				$u = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
				self::$currentLoggedInUser = $u;
			}
			return self::$currentLoggedInUser;
		}

		public function login($rememberMe)
		{
			Session::set($this->_sessionName, $this->id);
			if($rememberMe)
			{
				$hash = md5(uniqid() + rand(0, 100));
				$user_agent = Session::uagent_no_version();
				Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
				$fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
				$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
				$this->_db->insert('user_sessions', $fields);
			}
		}

		public static function loginUserFromCookie()
		{
			$userSession = UserSessions::getFromCookie();
			if ($userSession->user_id != '')
			{
				$user = new self((int)$userSession->user_id);
			}
			if ($user)
			{
				$user->login();
			}
			return $user;
		}

		public function logout()
		{
			$userSession = UserSessions::getFromCookie();
			if ($userSession)
			{
				$userSession->delete();
			}
			Session::delete(CURRENT_USER_SESSION_NAME);
			if (Cookie::exists(REMEMBER_ME_COOKIE_NAME))
			{
				Cookie::delete(REMEMBER_ME_COOKIE_NAME);
			}
			self::$currentLoggedInUser = null;
			return true;
		}

		public function registerNewUser($params)
		{
			$this->assign($params);
			$this->deleted = 1;
			$this->password = password_hash($this->password, PASSWORD_BCRYPT);
			$this->hash = md5($this->hash);
			$this->save(); //works to here
			//require_once '/opt/lampp/htdocs/mvc/PHPMailer/PHPMailerAutoload.php';    //windows version
			$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'nicholasoconnell87@gmail.com';          // SMTP username
$mail->Password = 'lwljlygzmmdacuxi'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@example.com', 'CodexWorld');
$mail->addReplyTo('info@example.com', 'CodexWorld');
$mail->addAddress('nicholasoconnell87@gmail.com');   // Add a recipient
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'Email from Localhost by CodexWorld';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
			/*$to = $this->email;
			//dnd($this->email);
			$subject = 'Signup | Verification';
			$message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$this->username.'
Password: '.$this->password.'
------------------------

Please click this link to activate your account:
http://localhost/mvc/verify?email='.$this->email.'&hash='.$this->hash.'

'; // Our message above including the link

			$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
			//dnd($message);
			mail($to, $subject, $message, $headers); // Send our email*/  // windows version of mail 
		}

		public function acls()
		{
			if(empty($this->acl)) return [];
			return json_decode($this->acl, true);
		}
	}