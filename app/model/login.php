<?php
$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once ($HOST_ROOT.'/app/core/auth.php');
require_once ($HOST_ROOT.'/app/core/database.php');

class Login extends Database {
	public function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
		$auth = Auth::instance();

		if (!$auth->is_logged()) {
			$username = $_POST['Username'];
			$password = $_POST['Password'];

			$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";

			$result = $this->query ($query);

			if (!mysqli_fetch_assoc ($result)) {
				echo "The username or password is incorrect";
			}
			else {
				$auth->login ($username);
				echo "Okey";
			}
		}
		else {
			echo "Alrady loged as ".$auth->logged_user();
		}
	}
}
