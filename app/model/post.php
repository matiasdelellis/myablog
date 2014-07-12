<?php
$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once ($HOST_ROOT.'/app/core/auth.php');
require_once ($HOST_ROOT.'/app/core/database.php');
require_once ($HOST_ROOT.'/app/helpers/slug.php');
require_once ($HOST_ROOT.'/vendor/erusev/parsedown/Parsedown.php');

class Post extends Database {
	public function get ($slug)
	{
		$Parsedown = new Parsedown();

		$slug = $this->escape_string ($slug);
		$query = "SELECT * FROM posts WHERE slug = '$slug'";
		$result = $this->query ($query);
		$row_result = mysqli_fetch_assoc ($result);

		$row_result['text'] = $Parsedown->text($row_result['text']);

		return $row_result;
	}

	public function save ($title, $text, $image)
	{
		$title = $this->escape_string ($title);
		$text = $this->escape_string ($text);
		$slug = get_slug_from_title ($title);
		$date = time();

		$query = "INSERT INTO posts VALUES (NULL, '$title', '$text', '$image', '$slug', '$date')";

		return $this->query ($query);
	}
}
