<?php
require_once '../core/auth.php';
require_once '../model.php';

$username = $_POST['inputUsername'];
$password = $_POST['inputPassword'];

if (!Auth::instance()->is_logged()) {
	$db_link = mya_connection_db_open ();

	$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query ($db_link, $query);
	$row_result = mysqli_fetch_assoc ($result);

	mya_connection_db_close ($db_link);

	if (!$row_result) {
		echo "<script type = 'text/javascript'>".
		        "alert('Username or password is incorrect');".
		        "window.location = '/login';".
		     "</script>";
	}
	else {
		Auth::instance()->login ($username);
		header("location: /posts");
	}
}
else {
	echo "<h3>Alrady loged as " . Auth::instance()->user_logged . "</h3>";
}