<?php $title = $post['title']?>
<?php ob_start() ?>
<div class="row featurette">
	<div class="col-md-4">
		<?php
			$jarray = json_decode ($post['image_file'], true);
			$type = $jarray["SourceType"];
			$source = $jarray["Source"];
			switch ($type) {
				case "Image":
					echo "<img class='featurette-image img-responsive' src='$source'>";
					break;
				case "Video":
					echo "<div class='vid'><iframe src='$source' allowfullscreen=''></iframe></div>";
					break;
				default:
					echo "<img class='featurette-image img-responsive' src='/images/no_image_inverted_600x300.png'>";
					break;
			}
		?>
	</div>
	<div class="col-md-8">
		<h1 class="featurette-heading">
			<?php echo $post['title'] ?>
		</h1>
		<p class="lead">
			<?php echo $post['text']?>
		</p>
	</div>
</div>
<hr class="featurette-divider">
<?php $content = ob_get_clean () ?>
<?php include 'app/templates/default/myablogTemplate.php' ?>