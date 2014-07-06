<?php
require_once 'app/core/database.php';

class Posts extends Database {
	public function get ()
	{
		$query = "SELECT * FROM posts ORDER BY id DESC";
		$result = $this->query ($query);

		$posts = array ();
		while ($row_result = mysqli_fetch_assoc ($result))
		{
			$posts[] = $row_result;
		}

		return $posts;
	}
}
