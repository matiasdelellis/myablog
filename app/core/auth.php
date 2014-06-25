<?php
session_start();
class Auth {
	private function __construct ()
	{
		$this->settings = parse_ini_string ($contents, TRUE);
	}

	public function is_logged ()
	{
		return isset($_SESSION['username']);
	}

	public function logout ()
	{
		unset($_SESSION['username']);
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
