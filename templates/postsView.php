<?php $title = mya_config::instance()->get("BLOG", "name")?>
<?php ob_start() ?>
	<?php foreach ($posts as $post): ?>
		<div class="row featurette">
			<div class="col-md-4">
				<a href='/post/<?php echo $post['slug']?>'>
					<img class="featurette-image img-responsive" src="/<?php echo $post['image_file']?>">
				</a>
			</div>
			<div class="col-md-8">
				<a href='/post/<?php echo $post['slug']?>' style="text-decoration:none">
					<h2 class="featurette-heading">
						<?php echo $post['title'] ?>
						<!--<span class="text-muted"> <?php echo date("d-m-Y", $post['date']); ?> </span>-->
					</h2>
				</a>
				<p class="lead">
					<?php echo $post['text']?>
				</p>
			</div>
		</div>
		<hr class="featurette-divider">
	<?php endforeach; ?>
<?php $content = ob_get_clean() ?>
<?php include 'myablogTemplate.php' ?>