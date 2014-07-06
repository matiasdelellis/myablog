<?php
require_once 'app/core/database.php';
require_once 'app/helpers/slug.php';

class Post extends Database {
	public function get ($slug)
	{
		$slug = $this->escape_string ($slug);
		$query = "SELECT * FROM posts WHERE slug = '$slug'";
		$result = $this->query ($query);
		$row_result = mysqli_fetch_assoc ($result);

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
