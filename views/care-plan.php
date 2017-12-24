<?php require('./includes/header.php'); ?>
  <main>
		<div class="container">
			<div class="m-t-50 m-b-75 care-services">
				<?php if (count($content) > 0): ?>

					<?php include('includes/phases.php'); ?>
					<?php include('includes/overview-tabs.php'); ?>
					
				<?php else : ?>

					<h1 class="text-center text-danger"><strong>In Construction...</strong></h1>
					<h3 class="text-center"><a href="/diagnostic-code" class="text-danger">&#x2190; Go Back</a></h3>

				<?php endif;  ?>
			</div><!-- care-services -->
		</div><!-- container -->
	</main>
<?php require('./includes/footer.php'); ?>
