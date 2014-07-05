function afterSuccess ()
{
	var imageurl = $('#UploadedImage')[0].src;

	var hostname = 'http://' + window.location.hostname;
	imageurl = imageurl.replace(hostname, '');

	$('#ImageUrl')[0].value = imageurl;
}

$(document).ready(function() {
	var options = {
			target:  '#ImageOutput',
			success: afterSuccess
	};
	$('#imageInput')[0].onchange = function() {
		$('#ImageUploadForm').ajaxSubmit(options);
	};
});