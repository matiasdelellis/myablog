<?php $title = "Administration Page" ?>
<?php ob_start() ?>
<div class="row featurette">
	<h1 class="featurette-heading">Administration Page</h1>
	<hr class="featurette-divider">
	<div class="col-sm-10">
		<h2 class="featurette-heading">Users</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Username</th>
					<th>Full User</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo $user['username'] ?></td>
						<td><?php echo $user['fullname'] ?></td>
						<td><?php echo $user['user_email'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<hr class="featurette-divider">
<?php $content = ob_get_clean () ?>
<?php include 'myablogTemplate.php' ?>