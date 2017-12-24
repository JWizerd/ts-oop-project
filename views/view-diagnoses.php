<?php require('./includes/header.php'); ?>

<div class="container">
	<div class="row">
			<h1>Diagnoses</h1>

			<table class="table">
				<thead>
					<tr>
						<td>id</td>
						<td>code</td>
						<td>title</td>
						<td>link</td>
						<td>update</td>
						<td>delete</td>
						<td>duplicate</td>
					</tr>
				</thead>
				<?php foreach ($diagnoses as $db_obj => $diagnosis): ?>
					<tr>
						<td><?php echo $diagnosis['id']; ?></td>
						<td><?php echo $diagnosis['code']; ?></td>
						<td><?php echo $diagnosis['the_title']; ?></td>
						<td><a target="_blank" href="/care-plan?id=<?php echo $diagnosis['id'];  ?>">View Content</a></td>
						<td>
							<a href="/edit-diagnoses?code=<?php echo $diagnosis['code']; ?>" class="btn btn-submit text-uppercase">update</a>
						</td>
						<td>
							<form action="/delete-diagnosis" method="POST">
								<input type="hidden" name="id" value="<?php echo $diagnosis['id']; ?>">
								<input class="text-danger text-uppercase" type="submit" name="delete-diagnosis" value="DELETE">
							</form>
						</td>
						<td>
							<form action="/duplicate-diagnosis" method="POST">
								<input type="hidden" name="id" value="<?php echo $diagnosis['id'];  ?>">
								<input class="text-success" type="submit" name="duplicate-diagnosis" value="Duplicate">
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
	</div>
</div>

<?php require('./includes/footer.php'); ?>