<?php
$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once ($HOST_ROOT.'/app/core/config.php');

class Database {
	private $db_link;

	public function __construct ()
	{
		$this->connect();
	}

	public function __destruct ()
	{
		mysqli_close ($this->db_link);
	}

	private function connect ()
	{
		$config = Config::instance();

		$host = $config->get("SQL", "host");
		$user = $config->get("SQL", "username");
		$pass = $config->get("SQL", "password");
		$dbase = $config->get("SQL", "database");

		$this->db_link = mysqli_connect ($host, $user, $pass, $dbase);

		if (mysqli_connect_errno())
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	public function escape_string ($string)
	{
		return mysqli_real_escape_string ($this->db_link, $string);
	}

	public function query ($sql_query)
	{
		return mysqli_query ($this->db_link, $sql_query);
	}
}