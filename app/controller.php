<?php
class MyaController {
	function show_posts ()
	{
		require_once 'app/model/posts.php';
		$model = new Posts;
		$posts = $model->get ();
		require 'app/view/posts.php';
	}

	function show_post_by_slug ($slug)
	{
		require_once 'app/model/post.php';
		$model = new Post;
		$post = $model->get ($slug);
		require 'app/view/post.php';
	}

	function compose_new_post ()
	{
		if (Auth::instance()->is_logged())
			require 'app/view/composer.php';
	}

	function login ($action = "show")
	{
		switch ($action) {
			case "show":
				if (!Auth::instance()->is_logged()) {
					require 'app/view/login.php';
				}
				else {
					$this->show_posts ();
				}
				break;
			case "login":
				if (!Auth::instance()->is_logged()) {
					require_once 'app/model/login.php';
					$model = new Login;
					$model->login ();
				}
				else {
					$this->show_posts ();
				}
				break;
			default:
				$this->show_posts ();
				break;
		}
	}

	function logout ()
	{
		if (Auth::instance()->is_logged()) {
			Auth::instance()->logout ();
		}
		$this->show_posts ();
	}

	function show_admin_page ()
	{
		if (Auth::instance()->is_logged()) {
			require_once 'app/model/admin.php';
			$model = new Admin;
			$users = $model->get_users ();
			require 'app/view/admin.php';
		}
		else {
			$this->show_posts ();
		}
	}
}
