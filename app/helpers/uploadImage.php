<?php
if (isset($_POST))
{
	$DestinationDirectory = '../../uploads/';

	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		die();
	}

	if (!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])) {
		die('Something wrong with uploaded file, something missing!');
	}

	$TempSrc = $_FILES['ImageFile']['tmp_name'];
	$ImageName = str_replace (' ','-',strtolower($_FILES['ImageFile']['name']));
	$RandomNumber = rand (0, 9999999999);

	$ImageExt = substr ($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace ('.', '', $ImageExt);

	$ImageName = preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName);

	$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;

	$DestRandImageName = $DestinationDirectory.$NewImageName;

	if (move_uploaded_file ($TempSrc, $DestRandImageName)) {
		echo "<img class='featurette-image img-responsive' src='uploads/".$NewImageName."' id='UploadedImage'/>";
	}
	else {
		die('Can not move file');
	}
}
