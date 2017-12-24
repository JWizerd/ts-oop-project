<?php require('./includes/footer.php'); ?>
<body class="full-window">
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
        <div class="form-wrapper code-form-wrapper">
	<form action="care-plan.html" class="text-center" action="post">
	  <div class="form-group">
	  	<h2>Enter Diagnosis Code</h2>
	  	<h4 class="m-b-20">Clinical Expectations</h4>
	    <label for="sel1">Select Code:</label>
	    <select class="form-control" id="code" name="code">
	    	<option value="" disabled selected>...Select Diagnosis Code</option>
	      <option>M43.6</option>
	      <option>G44.211</option>
	      <option>M54.81</option>
	      <option>S13.4.4XXA</option>
	    </select>
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
	  <button type="submit" name="code-submit" class="btn btn-primary form-control">
	  	Continue <i class="fa fa-caret-right"></i>
	  </button>
	</form>
</div>
      </div>
    </div>
  </main>
<?php require('./includes/footer.php'); ?>
