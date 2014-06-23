<?php $title = 'Login' ?>
<?php $script = '/js/validateLogin.js' ?>
<?php ob_start() ?>
<div class="row featurette">
	<h2 class="featurette-heading">Login</h2>
	<form class="form-horizontal" role="form" name="loginForm" action="/includes/login.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="inputUsername" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="inputPassword" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type='button' class="btn btn-default" name="buttonLogin">Login</button>
			</div>
		</div>
	</form>
</div>
<?php $content = ob_get_clean() ?>
<?php include 'myablogTemplate.php' ?>