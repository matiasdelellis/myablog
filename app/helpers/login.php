<?php
require_once '../core/auth.php';
require_once '../model.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

if (!Auth::instance()->is_logged()) {
	$db_link = mya_connection_db_open ();

	$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query ($db_link, $query);
	$row_result = mysqli_fetch_assoc ($result);

	mya_connection_db_close ($db_link);

	if (!$row_result) {
		echo "The username or password is incorrect";
	}
	else {
		Auth::instance()->login ($username);
		echo "Okey";
	}
}
else {
	echo "Alrady loged as " . Auth::instance()->logged_user();
}