<?php require('./includes/header.php'); ?>
	<?php if (isset($logged_in)): ?>
		<?php if ($logged_in): ?>

			<h1 class="text-success text-center">logged in</h1>

			<h2><?php echo $_SESSION['user_token']; ?></h2>

		<?php else : ?>

			<h1 class="text-danger text-center">Could not log in. Please try again.</h1>

		<?php endif; ?>
	<?php endif ?>
  <main>
    <div class="container content-wrapper">
      <div class="row inner">
	        <div class="form-wrapper">
					<form method="POST" action="/login">
					  <div class="form-group">
					    <input required type="text" name="username" class="form-control" id="email" placeholder="Username">
					  </div>
					  <div class="form-group">
					    <input required type="password" name="password" class="form-control" id="pwd" placeholder="Password">
					  </div>
					  <input type="submit" name="login" class="btn btn-primary form-control"></input>
					</form>
				</div>
      </div>
    </div>
  </main>
<?php require('./includes/footer.php'); ?>
