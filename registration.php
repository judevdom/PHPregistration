<?php include('registrationcheck.php'); ?>
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
			<form class ="form" method="post" action="registration.php">
				<?php include('errors.php'); ?>
				<div class="form-group">
					<label for="name">Name:</label> <input type="name" name="name" class="form-control" placeholder="Enter name" id="name">
				</div>
				<div class="form-group">
					<label for="email">Email:</label> <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
				</div>
				<div class="form-group">
					<label for = "pwd">Password:</label> <input type="password" name="password_1" class="form-control" id="pwd">
				</div>
				<div class="form-group">
					<label for = "pwd">Confirm Password:</label> <input type="password" name="password_2" class="form-control" id="pwd1">
				</div>
				<div class="form-group">
					<label>Website:</label> <input type="text" name="website" class="form-control" placeholder="Enter email" id="website">
				</div>
				<div class="form-check-inline">
				    <label class="form-check-label">
				        <input type="checkbox" class="form-check-input" name="gender" value="">Female
				    </label>
				</div>
				<div class="form-check-inline">	
				    <label class="form-check-label">
				        <input type="checkbox" class="form-check-input" name="gender" value="">Male
				    </label>
				</div>
				<div class="form-check-inline">
				    <label class="form-check-label">
				        <input type="checkbox" class="form-check-input" name="gender" value="" disabled>Other
				    </label>
				</div>
				<div class="form-group">
					<label for="comment">Comment:</label> <textarea class="form-control" name="comment" rows="5" cols="40"></textarea>
				</div>
				<input type="submit" name="submit-register" class="btn btn-primary">
				</div>
				
			</form>
		</div>
	</body>
</html>