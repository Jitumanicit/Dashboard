<?php
	include('server.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Face Recognition Record | Registration Panel</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>REGISTER YOUR ACCOUNT</h2>
		</div>
		<form method="post" action="registration.php">
		<!--display validation errors here-->
		<?php include('errors.php') ?>
			<div class="input-group">
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="input-group">
				<label>Identification Number</label>
				<input type="text" name="identification_no" value="<?php echo $identification_no; ?>">
			</div>
			<div class="input-group">
				<label>Gender</label>
				<input type="text" name="gender" value="<?php echo $gender; ?>">
			</div>
			<div class="input-group">
				<label>Phone No</label>
				<input type="number" name="phone" value="<?php echo $phone; ?>">
				<p style="color: red;">* Please enter "+91" before enter the number.</p>
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm Password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" name="register" class="btn">Register</button>
			</div>
			<p>
				Already a member?<a href="login.php">Sign in</a>
			</p>
		</form>
	</body>
</html>