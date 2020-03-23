<?php include('../controller/server.php')?>
<!DOCTYPE HTML>
<html>
<head>
	<title>form register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="regis-content">
			<div class="regis-form">
				<h2 class="title-form">SIGN UP</h2>
				<h5 class="title-form">Create a new account</h5>
				<form method="POST" class="register-form" id="register-form" action="../controller/formregister.php">
					<?php include('../controller/errors.php'); ?>
					<div class="row">
						<div class="col">
							First Name:<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="firstname" required=>
						</div>
						<div class="col">
							Last Name:<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lastname" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							Username:<input type="text" class="form-control" name="username" placeholder="Enter Username" id="uname" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							Password:<input type="Password" class="form-control" name="pass" placeholder="Enter Password" id="pw" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							Confirm Password:
							<input type="password" class="form-control" name="conpass" placeholder="Enter Confirmation Password" id="cpw" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							Birthday:<input type="date" class="form-control" name="birthday" id="bday" required>
						</div>
						<div class="col">
							Gender:
							<select name="gender" class="form-control" required>
								<option selected>Choose Gender</option>
								<option value="female">Female</option>
								<option value="male">Male</option>
								<option value="nosay">Prefer not to say</option>
							</select>
						</div>
					</div>
					<button type="submit" name="signup" class="btn">Sign Up</button>

					<p>Already have an account?<a href="login.php"> Log in</a></p>
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>