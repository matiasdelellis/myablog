<?php $title = Config::instance()->get("BLOG", "name")?>
<?php ob_start() ?>
	<?php foreach ($posts as $post): ?>
		<div class="row featurette">
			<div class="col-md-4">
				<a href='/post/<?php echo $post['slug']?>'>
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
				</a>
			</div>
			<div class="col-md-8">
				<a href='/post/<?php echo $post['slug']?>' style="text-decoration:none">
					<h1 class="featurette-heading">
						<?php echo $post['title'] ?>
						<!--<span class="text-muted"> <?php echo date("d-m-Y", $post['date']); ?> </span>-->
					</h1>
				</a>
				<p class="lead">
					<?php echo $post['text']?>
				</p>
			</div>
		</div>
		<hr class="featurette-divider">
	<?php endforeach; ?>
<?php $content = ob_get_clean() ?>
<?php include 'app/templates/default/myablogTemplate.php' ?>