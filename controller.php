<?php
class MyaController {
	function show_posts ()
	{
		$posts = mya_connection_get_posts ();
		require 'templates/postsView.php';
	}

	function show_post_by_slug ($slug)
	{
		$post = mya_connection_get_post_by_slug ($slug);
		require 'templates/postView.php';
	}

	function compose_new_post ()
	{
		if (mya_auth::instance()->is_logged())
			require 'templates/composerView.php';
	}

	function login ()
	{
		if (!mya_auth::instance()->is_logged()) {
			require 'templates/loginView.php';
		}
		else {
			$posts = mya_connection_get_posts ();
			require 'templates/postsView.php';
		}
	}

	function logout ()
	{
		if (mya_auth::instance()->is_logged()) {
			mya_auth::instance()->logout ();
		}

		$posts = mya_connection_get_posts ();
		require 'templates/postsView.php';
	}
}
