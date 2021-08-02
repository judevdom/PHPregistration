<!DOCTYPE html>
<html>
	<head>
		<title>Validation Form</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body class="bg-secondary">
		<?php
		  include 'menu.php';
		?>
		<div class = "container">
			<form class ="form" method="post" action="loginuser.php">
				<?php include 'errors.php'; ?>
				<div class="form-group">
					<label for="name">Name:</label> <input type="name" name="name" class="form-control" placeholder="Enter name" id="name">
				</div>			
				<div class="form-group">
					<label for = "pwd">Password:</label> <input type="password" name="password" class="form-control" id="pwd">
				</div>
				<div>
					<input type="submit" name="login_user" class="btn btn-primary">
				</div>
				<?php include('registrationcheck.php'); ?>
				<p>
			  		Not yet a member? <a href="registration.php">Sign up</a>
			  	</p>
			  	
			</form>
		</div>
	</body>
</html>