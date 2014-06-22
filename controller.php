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
		require 'templates/composerView.php';
	}
}
