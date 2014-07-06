<?php $title = 'Upload new post' ?>
<?php $script = 'app/view/js/uploadImage.js' ?>
<?php ob_start() ?>
<div class="row featurette">
	<h1 class="featurette-heading">Upload a new post</h1>
	<hr class="featurette-divider">
		<div class="col-sm-4">
			<div class="thumbnail">
				<form action="/app/helpers/uploadImage.php" method="post" enctype="multipart/form-data" id="ImageUploadForm">
					<div id="ImageOutput">
						<img class="featurette-image img-responsive" src="images/no_image_inverted_600x300.png" id="ImageOutput"/></img>
					</div>
					<div>
						<input type="file" name="ImageFile" id="imageInput" />
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-8">
			<form class="form-horizontal" role="form" action="/app/helpers/uploadPost.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" class="form-control" name="inputTitle" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="10" name="inputText" placeholder="Blog text.."></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Summit</button>
				</div>
				<input type="hidden" name="inputImageUrl" id="ImageUrl">
			</form>
		</div>
</div>
<?php $content = ob_get_clean() ?>
<?php include 'app/templates/default/myablogTemplate.php' ?>
