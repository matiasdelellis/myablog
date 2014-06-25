<?php
require_once '../model.php';
require_once 'fileUtils.php';

if ($_FILES["file"]["error"] > 0) {
	echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else {
	$file_name = $_FILES["file"]["name"];
	$temp_file = $_FILES["file"]["tmp_name"];
	$dest_file = "../../uploads/" . $file_name;
	$link_file = "/uploads/" . $file_name;

	if (!is_uploaded_file ($temp_file)) {
		header ("Status: 403");
		exit ("Failt to upload file!");
	}

	if (file_exists ($dest_file)) {
		if (mya_cmp_files ($dest_file, $temp_file)) {
			header ("Status: 403");
			exit ("Already have a file with the same name but different md5");
		}
	}
	else {
		if (!move_uploaded_file ($temp_file, $dest_file)) {
			header ("Status: 403");
			exit ("Fail to move file");
		}
	}

	mya_connection_save_new_post ($_POST['inputTitle'], $_POST['inputText'], $link_file);
}
