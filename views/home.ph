<?php require('./includes/header.php'); ?>
<header class="container-fluid">
	<div class="header-inner">
		<div class="row">
			<div class="col-md-6 text-left">
				<h1>
					<a href="/">
						<img class="img-responsive" src="./assets/img/logo.png" alt="">
					</a>
				</h1>
			</div>
			<div class="col-md-6 text-right">
				<a href="login.html" class="btn btn-secondary">Contact</a>
				<a href="diagnostic-code.html" class="btn btn-primary">Register</a>
			</div>
		</div>
	</div>
</header>
  <main>
    <div class="container content-wrapper">
      <div class="row inner">
	        <div class="form-wrapper">
					<form action="" method="POST">
					  <div class="form-group">
					    <input type="text" name="username" class="form-control" id="email" placeholder="Username">
					  </div>
					  <div class="form-group">
					    <input type="password" name="password" class="form-control" id="pwd" placeholder="Password">
					  </div>
					  <input type="submit" class="btn btn-primary form-control"></input>
					</form>
				</div>
      </div>
    </div>
  </main>
<?php require('./includes/footer.php'); ?>
