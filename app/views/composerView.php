<?php $title = 'Upload new post' ?>
<?php ob_start() ?>
<div class="row featurette">
	<h1 class="featurette-heading">Upload a new post</h1>
	<form class="form-horizontal" role="form" action="/app/helpers/uploadPost.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="inputTitle" placeholder="Title">
			</div>
		</div>
		<div class="form-group">
			<label for="inputText" class="col-sm-2 control-label">Text</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="7" name="inputText"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputText" class="col-sm-2 control-label">Image</label>
			<div class="col-sm-10">
				<input type="file" name="file">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Summit</button>
			</div>
		</div>
	</form>
</div>
<?php $content = ob_get_clean() ?>
<?php include 'app/templates/default/myablogTemplate.php' ?>