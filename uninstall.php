<?php
require_once 'includes/config.php';
require_once 'includes/fileUtils.php';

/*
 * Clean "uploads" folder.
 */
if (!mya_rmdir("uploads"))
	die ("Failed to clean \"uploads\" folder.");

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
 * Drop posts and users Table.
 */
$query  = "DROP TABLE IF EXISTS posts, users;";

if (!mysqli_query($db_link, $query))
	die ("Failed to drop \"post\" or \"users\" tables: " . mysqli_error($db_link));

/*
 * Close connection
 */
mysqli_close ($db_link);

/*
 * Show msge.
 */
echo "<h3>Now can install again myablog</h3>";
