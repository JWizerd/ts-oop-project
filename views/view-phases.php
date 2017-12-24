<?php require('./includes/header.php'); ?>

<div class="container">
	<div class="row">
			<h1>Phases</h1>

			<table class="table">
				<thead>
					<tr>
						<td>id</td>
						<td>belongs to</td>
						<td>title</td>
						<td>link</td>
						<td>update</td>
						<td>delete</td>
					</tr>
				</thead>
				<?php foreach ($phases as $db_obj => $phase): 
					$code_title = Diagnosis::get_diagnosis_title_by_id($phase['code_id']);
				?>
					<tr>
						<td><?php echo $phase['id']; ?></td>
						<td><strong><?php echo $code_title['code'] . " " . $code_title['the_title']; ?></strong> | ID: <?php echo $phase['code_id']; ?></td>
						<td><?php echo $phase['title']; ?></td>
						<td><a target="_blank" href="/care-plan?id=<?php echo $phase['code_id'];  ?>">View Content</a></td>
						<td>
							<a href="/edit-phase?id=<?php echo $phase['id']; ?>" class="btn btn-submit text-uppercase">update</a>
						</td>
						<td>
							<form action="/delete-phase" method="POST">
								<input type="hidden" name="id" value="<?php echo $phase['id'];  ?>">
								<input class="text-danger text-uppercase" type="submit" name="delete-phase" value="DELETE">
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
	</div>
</div>

<?php require('./includes/footer.php'); ?>