<?php
session_start();
class Auth {
	public function login ($username)
	{
		session_regenerate_id(true);

		$_SESSION['username'] = $username;
	}

	public function logged_user ()
	{
		return $_SESSION['username'];
	}

	public function is_logged ()
	{
		return isset($_SESSION['username']);
	}

	public function logout ()
	{
		session_unset();
		session_destroy();
		session_start();
		session_regenerate_id(true);
	}

	public function button ()
	{
		$button  = "<a href='";
		$button .= isset($_SESSION['username']) ? "/logout'>" : "/login'>";
		$button .= "<button type='button' class='btn btn-default navbar-btn'>";
		$button .= isset($_SESSION['username']) ? $_SESSION['username'].": Logout" : "Login";
		$button .= "</button></a>";

		return $button;
	}

	public static function & instance ()
	{
		static $_instance = null;

		return $_instance = (empty($_instance)) ? new self() : $_instance;
	}
}
