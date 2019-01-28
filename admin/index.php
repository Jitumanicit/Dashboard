<!DOCTYPE html>
<html>
	<head>
		<title>Face Recognition | Admin Login Panel</title>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body style="padding-top: 80px;">
		<div class="header" style="background-color: #ddd;">
			<h2 style="color: black;">ADMIN LOGIN</h2>
		</div>
		<?php
      if(isset($_POST['submit'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'password'){
          $_SESSION['login'] = true; header('LOCATION:dashboard.php'); die();
        } {
          echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }

      }
    ?>
		<form method="post" action="">
		<!--Display validation errors here-->
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" id="username" class="form-control" required>
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" id="pwd" required>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn" style="background-color: #2fcc66;">Login</button>
			</div>
		</form>
	</body>
</html>