<?php
require_once '../model.php';

$title = $_POST['inputTitle'];
$text = $_POST['inputText'];
$image = $_POST['inputImageUrl'];

mya_connection_save_new_post ($title, $text, $image);
