<?php
$HOST_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once ($HOST_ROOT.'/app/model/post.php');

$title = $_POST['inputTitle'];
$text = $_POST['inputText'];
$image = $_POST['inputImageUrl'];

$model = new Post;
if ($model->save ($title, $text, $image))
	header("location: /posts");
