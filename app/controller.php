<?php
class MyaController {
	function show_posts ()
	{
		$posts = mya_connection_get_posts ();
		require 'app/views/postsView.php';
	}

	function show_post_by_slug ($slug)
	{
		$post = mya_connection_get_post_by_slug ($slug);
		require 'app/views/postView.php';
	}

	function compose_new_post ()
	{
		if (mya_auth::instance()->is_logged())
			require 'app/views/composerView.php';
	}

	function login ()
	{
		if (!mya_auth::instance()->is_logged()) {
			require 'app/views/loginView.php';
		}
		else {
			$posts = mya_connection_get_posts ();
			require 'app/views/postsView.php';
		}
	}

	function logout ()
	{
		if (mya_auth::instance()->is_logged()) {
			mya_auth::instance()->logout ();
		}

		$posts = mya_connection_get_posts ();
		require 'app/views/postsView.php';
	}

	function show_admin_page ()
	{
		if (mya_auth::instance()->is_logged()) {
			$users = mya_connection_get_users ();
			require 'app/views/adminView.php';
		}
		else {
			$posts = mya_connection_get_posts ();
			require 'app/views/postsView.php';
		}
	}
}
