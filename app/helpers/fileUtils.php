<?php
function mya_cmp_files ($file1, $file2)
{
	$md5_file1 = md5_file($file1);
	$md5_file2 = md5_file($file2);

	if ($md5_file1 == FALSE) {
		return FALSE;
	}
	if ($md5_file2 == FALSE) {
		return FALSE;
	}

	return ($md5_file1 != $md5_file2);
}

function mya_rmdir ($dir)
{
	if (!file_exists ($dir)) {
		return TRUE;
	}

	$files = array_diff(scandir($dir), array('.','..'));
	foreach ($files as $file) {
		(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
	}

	return rmdir($dir);
}