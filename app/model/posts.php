<?php
$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once ($HOST_ROOT.'/app/core/database.php');
require_once ($HOST_ROOT.'/vendor/erusev/parsedown/Parsedown.php');

class Posts extends Database {
	public function __construct ()
	{
		parent::__construct();
	}

	public function get ()
	{
		$Parsedown = new Parsedown();
		$query = "SELECT * FROM posts ORDER BY id DESC";
		$result = $this->query ($query);

		$posts = array ();
		while ($row_result = mysqli_fetch_assoc ($result))
		{
			$row_result['text'] = $Parsedown->text($row_result['text']);
			$posts[] = $row_result;
		}

		return $posts;
	}
}
