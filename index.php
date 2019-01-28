<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Face Recognition | Login Panel</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header" style="background-color:#ddd;">
			<h2 style="color: black;">LOGIN YOUR ACCOUNT</h2>
		</div>
		<form method="post" action="index.php">
		<!--Display validation errors here-->
		<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" name="login" class="btn" style="background-color:#2fcc66;">Login</button>
			</div>
			<p>
				Not yet a member?<a href="registration.php">Sign in</a>
			</p>
		</form>
	</body>
</html>