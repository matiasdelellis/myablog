<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html/myablog');
require_once 'app/model/post.php';

$title = $_POST['inputTitle'];
$text = $_POST['inputText'];
$image = $_POST['inputImageUrl'];

$model = new Post;
if ($model->save ($title, $text, $image))
	header("location: /posts");
