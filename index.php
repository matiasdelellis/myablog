<?php
require_once 'includes/auth.php';
require_once 'model.php';
require_once 'controller.php';

$uri = $_SERVER['REQUEST_URI'];
$req_array = explode ('/', $uri);
$request = $req_array[1];

if ($request) {
	switch ($request) {
		case "index.php":
		case "posts":
			$controller = new MyaController;
			$controller->show_posts ();
			break;
		case "post":
			$controller = new MyaController;
			$controller->show_post_by_slug ($_GET['slug']);
			break;
		case "composer":
			$controller = new MyaController;
			$controller->compose_new_post ();
			break;
		case "login":
			$controller = new MyaController;
			$controller->login ();
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