<?php
class MyaController {
	function show_posts ()
	{
		$posts = mya_connection_get_posts ();
		require 'app/view/posts.php';
	}

	function show_post_by_slug ($slug)
	{
		$post = mya_connection_get_post_by_slug ($slug);
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
			$posts = mya_connection_get_posts ();
			require 'app/view/posts.php';
		}
	}

	function logout ()
	{
		if (Auth::instance()->is_logged()) {
			Auth::instance()->logout ();
		}

		$posts = mya_connection_get_posts ();
		require 'app/view/posts.php';
	}

	function show_admin_page ()
	{
		if (Auth::instance()->is_logged()) {
			$users = mya_connection_get_users ();
			require 'app/view/admin.php';
		}
		else {
			$posts = mya_connection_get_posts ();
			require 'app/view/posts.php';
		}
	}
}
