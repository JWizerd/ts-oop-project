<?php require('./includes/header.php'); ?>
    <main>
				<div class="diagnosis-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="text-center"><?php echo $diagnosis['title']; ?></h1>
								<hr>
								<div>
								<?php echo html_entity_decode($diagnosis['content']); ?>
								</div>
								<hr>
								<p class="text-center"><a href="/diagnostic-code" class="text-center">&#8592; Go Back</a></p>
							</div><!-- col -->
						</div>
					</div>
				</div>
    </main>
<?php require('./includes/footer.php'); ?>
