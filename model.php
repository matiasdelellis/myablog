<?php
require_once 'includes/slug.php';
require_once 'includes/config.php';

function mya_connection_db_open ()
{
	$config = mya_config::instance();

	$host = $config->get("SQL", "host");
	$user = $config->get("SQL", "username");
	$pass = $config->get("SQL", "password");
	$dbase = $config->get("SQL", "database");

	$link = mysqli_connect ($host, $user, $pass, $dbase);

	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	return $link;
}

function mya_connection_db_close ($db_link)
{
	mysqli_close ($db_link);
}

function mya_connection_get_posts ()
{
	$db_link = mya_connection_db_open ();

	$query = "SELECT * FROM posts ORDER BY id DESC";
	$result = mysqli_query($db_link, $query);

	$posts = array ();
	while ($row_result = mysqli_fetch_assoc ($result))
	{
		$posts[] = $row_result;
	}
	mya_connection_db_close ($db_link);

	return $posts;
}

function mya_connection_get_post_by_slug ($slug)
{
	$db_link = mya_connection_db_open ();

	$slug = mysqli_real_escape_string($db_link, $slug);
	$query = "SELECT * FROM posts WHERE slug = '$slug'";
	$result = mysqli_query ($db_link, $query);
	$row_result = mysqli_fetch_assoc ($result);

	mya_connection_db_close ($db_link);

	return $row_result;
}

function mya_connection_get_users ()
{
	$db_link = mya_connection_db_open ();

	$query = "SELECT * FROM users";
	$result = mysqli_query ($db_link, $query);

	$users = array ();
	while ($row_result = mysqli_fetch_assoc ($result))
	{
		$users[] = $row_result;
	}
	mya_connection_db_close ($db_link);

	return $users;
}

function mya_connection_save_new_post ($title, $text, $image_file)
{
	$db_link = mya_connection_db_open ();

	$title = mysqli_real_escape_string ($db_link, $title);
	$text = mysqli_real_escape_string ($db_link, $text);
	$slug = get_slug_from_title ($title);
	$date = time();

	$query = "INSERT INTO posts VALUES (NULL, '$title', '$text', '$image_file', '$slug', '$date')";

	if (!mysqli_query($db_link, $query))
		echo "Error: " . mysqli_error($db_link);
	else {
		mya_connection_db_close ($db_link);

		header("location: /posts");
	}
}
