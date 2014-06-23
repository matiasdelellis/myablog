<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?php echo $title ?>
		</title>
		<!-- Bootstrap core CSS -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		<!-- Custom styles for this template -->
		<link href="/css/myablog.css" rel="stylesheet">
	</head>
	<!-- NAVBAR================================================== -->
	<body>
		<nav>
			<div class="navbar navbar-default " role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/posts">
							<?php echo mya_config::instance()->get("BLOG", "name")?>
						</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="/posts">Home</a>
							</li>
							<?php
								if (mya_auth::instance()->is_logged())
									echo "<li><a href='/composer'>Upload</a></li>";
							?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							</li>
								<?php echo mya_auth::instance()->button() ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<nav>
		<!-- Marketing messaging and featurettes ================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->
		<div class="container marketing">
			<section>
					<?php echo $content ?>
			</section>
			<footer>
				<p class="pull-right"><a href="#">Back to top</a></p>
				<p>&copy; 2014 Matias De lellis. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</footer>
		</div><!-- /.container -->
		<!-- Bootstrap core JavaScript ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
	</body>
</html>

