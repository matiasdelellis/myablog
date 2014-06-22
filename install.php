<?php
require_once 'includes/config.php';

/*
 * Upload folder.
 */

if (!mkdir ("uploads"))
	 die ("Failed to create \"uploads\" folder.");

/*
 * Databse:
 */
$config = mya_config::instance();

$host = $config->get("SQL", "host");
$user = $config->get("SQL", "username");
$pass = $config->get("SQL", "password");
$dbase = $config->get("SQL", "database");

$query  = "CREATE TABLE IF NOT EXISTS posts (";
$query .= " id         int(11)                              NOT NULL AUTO_INCREMENT,";
$query .= " title      varchar(140) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " text       text         COLLATE utf8_unicode_ci NOT NULL,";
$query .= " image_file varchar(80)  COLLATE utf8_unicode_ci NOT NULL,";
$query .= " slug       varchar(140) COLLATE utf8_unicode_ci NOT NULL,";
$query .= " date       int(11)                              NOT NULL,";
$query .= " PRIMARY KEY (id)";
$query .= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$db_link = mysqli_connect ($host, $user, $pass, $dbase);

if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();

if (!mysqli_query($db_link, $query))
	echo "Failed to create table: " . mysqli_error($db_link);
else {
	mysqli_close ($db_link);
	header("location: /composer");
}
