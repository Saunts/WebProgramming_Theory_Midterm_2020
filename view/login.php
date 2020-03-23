<?php include('../controller/server.php') ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="login-box">
	<h1>Log in here</h1>
	<form method="post" action="../controller/server_login.php">
		<?php include('../controller/errors.php'); ?>
		<div class="textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" placeholder="Username" name="username" value="">
		</div>
		<div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="password" value="">
		</div>
		<div class="textbox">
			Captcha:
			<img src="../controller/captcha.php" alt="../asset/captcha/gambar" /><br>
			<input  name="kodecaptcha" value="" maxlength="5" required>
		</div>
		<button type="submit" name="login" class="btn">Log in</button>
		<a href="formregister.php">create an account</a>
	</form>
</body>
</html>