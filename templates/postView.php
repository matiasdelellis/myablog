<?php $title = $post['title']?>
<?php ob_start() ?>
<div class="row featurette">
	<div class="col-md-4">
		<img class="featurette-image img-responsive" src="/<?php echo $post['image_file']?>">
	</div>
	<div class="col-md-8">
		<h2 class="featurette-heading">
			<?php echo $post['title'] ?> 
		</h2>
		<p class="lead">
			<?php echo $post['text']?>
		</p>
	</div>
</div>
<?php $content = ob_get_clean () ?>
<?php include 'myablogTemplate.php' ?>