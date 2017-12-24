<?php require('./includes/header.php'); ?>

<div class="container">
	<div class="row">
			<h1>Users</h1>

			<table class="table">
				<thead>
					<tr>
						<td>id</td>
						<td>username</td>
						<td>password <span class="text-italic">(if client loses password)</span></td>
						<td>login count</td>
						<!-- <td>update</td> -->
						<td>delete</td>
					</tr>
				</thead>
				<?php foreach ($users as $index => $user): ?>
					<?php if ($user['username'] !== 'admin'): ?>
						<tr>
							<td><?= $user['id']; ?></td>
							<td><?= $user['username']; ?></td>
							<td><?= $user['password']; ?></td>
							<td><?= $user['login_count'];  ?></td>
							<td>
								<form action="/delete-user" method="POST">
									<input type="hidden" name="username" value="<?php echo $user['username'];  ?>">
									<input class="text-danger text-uppercase" type="submit" name="delete-user" value="DELETE">
								</form>
							</td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			</table>
	</div>
</div>

<?php require('./includes/footer.php'); ?>