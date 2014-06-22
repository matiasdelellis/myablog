<?php
require_once 'includes/config.php';

/*
 * Upload folder.
 */
if (!file_exists("uploads")) {
	if (!mkdir ("uploads"))
		 die ("Failed to create \"uploads\" folder.");
}

/*
 * Databse:
 */
$config = mya_config::instance();

$host = $config->get("SQL", "host");
$user = $config->get("SQL", "username");
$pass = $config->get("SQL", "password");
$dbase = $config->get("SQL", "database");

$db_link = mysqli_connect ($host, $user, $pass, $dbase);

if (mysqli_connect_errno())
	die ("Failed to connect to MySQL: " . mysqli_connect_error());

/*
 * Posts Table.
 */
$query  = "CREATE TABLE IF NOT EXISTS posts (";
$query .= " id         int(11)                              NOT NULL AUTO_INCREMENT,";
$query .= " title      varchar(140) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " text       text         COLLATE utf8_unicode_ci NOT NULL,";
$query .= " image_file varchar(80)  COLLATE utf8_unicode_ci NOT NULL,";
$query .= " slug       varchar(140) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " date       int(11)                              NOT NULL,";
$query .= " PRIMARY KEY (id)";
$query .= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

if (!mysqli_query($db_link, $query))
	die ("Failed to create \"post\" table: " . mysqli_error($db_link));

/*
 * Users Table.
 */
$query  = "CREATE TABLE IF NOT EXISTS users (";
$query .= " id         int(11)                             NOT NULL AUTO_INCREMENT,";
$query .= " username   varchar(20) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " fullname   varchar(25) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " user_email varchar(40) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " password   varchar(20) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " PRIMARY KEY (id)";
$query .= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

if (!mysqli_query($db_link, $query))
	die ("Failed to create \"Users\" table: " . mysqli_error($db_link));

/*
 * Add a test user.
 */
$query = "INSERT INTO users VALUES (NULL, 'test', 'Test User', 'test@localhost.com', 'test')";

if (!mysqli_query($db_link, $query))
	die ("Failed to append the test user: " . mysqli_error($db_link));

/*
 * Close connection
 */
mysqli_close ($db_link);

/*
 * Redirect to composer.
 */
header("location: /composer");
