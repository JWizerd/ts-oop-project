<?php require('./includes/header.php'); ?>
	
	<?php if (isset($registered)): ?>
		<?php if ($registered): ?>
			<h1 class="text-center text-danger">User Already Registered. Please choose another username.</h1>
		<?php elseif(!$registered):  ?>
			<h1 class="text-center text-success">User Successfully Registered.</h1>
		<?php endif; ?>
	<?php endif ?>
	
  <main>
    <div class="container content-wrapper">
      <div class="row inner">
	        <div class="form-wrapper">
	        <h1>Register</h1>
					<form method="POST" action="/register">
					  <div class="form-group">
					    <input required type="text" name="username" class="form-control" id="email" placeholder="Username">
					  </div>
					  <div class="form-group">
					    <input required type="password" name="password" class="form-control" id="pwd" placeholder="Password">
					  </div>
					  <input type="submit" name="register" class="btn btn-primary form-control"></input>
					</form>
				</div>
      </div>
    </div>
  </main>
  
<?php require('./includes/footer.php'); ?>