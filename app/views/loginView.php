<?php $title = 'Login' ?>
<?php $script = 'app/views/js/validateLogin.js' ?>
<?php ob_start() ?>
<div class="row featurette">
	<h1 class="featurette-heading">Login</h1>
	<form class="form-horizontal" role="form" name="loginForm" action="app/helpers/login.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="inputUsername" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Password</label>
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
<?php include 'app/templates/default/myablogTemplate.php' ?>