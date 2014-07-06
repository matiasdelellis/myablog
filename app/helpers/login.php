<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html/myablog');

require_once 'app/core/auth.php';
require_once 'app/core/database.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

if (!Auth::instance()->is_logged()) {
	$databse = new Database();

	$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";

	$result = $databse->query ($query);
	$row_result = mysqli_fetch_assoc ($result);

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