<?php
function mya_cmp_files ($file1, $file2)
{
	$md5_file1 = md5_file($file1);
	$md5_file2 = md5_file($file2);

	if ($md5_file1 == false) {
		echo "Bad file 1";
		return false;
	}
	if ($md5_file2 == false) {
		echo "Bad file 2";
		return false;
	}

	return ($md5_file1 != $md5_file2);
}
