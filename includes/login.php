<?php
session_start();

$username = $_POST['inputUsername'];
$password = $_POST['inputPassword'];

if (!isset($_SESSION['username'])) {
	$_SESSION['username'] = $username;
	header("location: /posts");
}
else {
	echo "<h3>Alrady loged as " . $_SESSION['username'] . "</h3>";
}
