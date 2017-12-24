<?php require('./includes/header.php'); ?>
<main>
	<div class="container content-wrapper">
		<div class="row inner">
			<div class="form-wrapper code-form-wrapper">
				<form action="care-plan" class="text-center" action="GET">
					<div class="form-group">
						<h2>Enter Diagnosis Code</h2>
						<h4 class="m-b-20">Clinical Expectations</h4>
						<div class="form-group">
							<label for="sel1">Select Code:</label>
							<select class="form-control" id="code" name="id">
								<option disabled selected>...Select Diagnosis Code</option>
								<?php foreach ($codes as $row => $field): ?>
									<option value="<?php echo $field['id']; ?>"><?php echo $field['code'] . " " . $field['the_title']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-sm-6 phase m-t-20 m-b-20">
						<h5><strong>Phase 1</strong></h5>
						<p>0-10 days</p>
						<p>10-33% wellness!</p>
					</div>
					<div class="col-sm-6 phase m-t-20 m-b-20">
						<h5><strong>Phase 2</strong></h5>
						<p>10-31 days</p>
						<p>33-66% wellness!</p>
					</div>
					<div class="col-sm-6 phase m-b-20">
						<h5><strong>Phase 3</strong></h5>
						<p>31-60 days</p>
						<p>66-100% wellness</p>
					</div>
					<div class="col-sm-6 phase m-b-20">
						<h5><strong>HM</strong></h5>
						<p>Health Maintenance</p>
					</div>
					<button type="submit" class="btn btn-primary form-control" method="GET">
					Continue <i class="fa fa-caret-right"></i>
					</button>
				</form>
			</div>
		</div>
	</div>
</main>
<?php require('./includes/footer.php'); ?>