<?php

$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
set_include_path(get_include_path() . PATH_SEPARATOR . $HOST_ROOT);

require_once 'app/core/config.php';
require_once 'app/core/auth.php';
require_once 'app/controller.php';

$uri = $_SERVER['REQUEST_URI'];
$req_array = explode ('/', $uri);

$controller = $req_array[1];
$action = isset($req_array[2]) ? $req_array[2] : "show";

if ($controller) {
	switch ($controller) {
		case "index.php":
		case "posts":
			$controller = new MyaController;
			$controller->show_posts ();
			break;
		case "post":
			$controller = new MyaController;
			$controller->show_post_by_slug ($action);
			break;
		case "composer":
			$controller = new MyaController;
			$controller->compose_new_post ();
			break;
		case "login":
			$controller = new MyaController;
			$controller->login ($action);
			break;
		case "logout":
			$controller = new MyaController;
			$controller->logout ();
			break;
		case "admin":
			$controller = new MyaController;
			$controller->show_admin_page ();
			break;
		default:
			//header('Status: 404 Not Found');
			//echo '<html><body><h1>Page Not Found</h1></body></html>';
			break;
	}
}
else {
	$controller = new MyaController;
	$controller->show_posts ();
}