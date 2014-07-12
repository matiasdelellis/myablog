<?php
$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once ($HOST_ROOT.'/app/core/database.php');

class Admin extends Database {
	public function get_users ()
	{
		$query = "SELECT * FROM users";
		$result = $this->query ($query);

		$users = array ();
		while ($row_result = mysqli_fetch_assoc ($result))
		{
			$users[] = $row_result;
		}

		return $users;
	}
}
