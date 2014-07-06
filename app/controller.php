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

	function login ()
	{
		if (!Auth::instance()->is_logged()) {
			require 'app/view/login.php';
		}
		else {
			require_once 'app/model/posts.php';
			$model = new Posts;
			$posts = $model->get ();
			require 'app/view/posts.php';
		}
	}

	function logout ()
	{
		if (Auth::instance()->is_logged()) {
			Auth::instance()->logout ();
		}

		require_once 'app/model/posts.php';
		$model = new Posts;
		$posts = $model->get ();
		require 'app/view/posts.php';
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
			require_once 'app/model/posts.php';
			$model = new Posts;
			$posts = $model->get ();
			require 'app/view/posts.php';
		}
	}
}
