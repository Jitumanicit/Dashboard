<?php
	session_start();
	$name="";
	$identification_no="";
	$gender="";
	$phone="";
	$username="";
	$errors=array();
	//Connect to the database
	$link = mysqli_connect('localhost','root','','face_record');
	//if register button is clicked
	if(isset($_POST['register'])){
		$name=mysqli_real_escape_string($link,$_POST['name']);
		$identification_no=mysqli_real_escape_string($link,$_POST['identification_no']);
		$gender=mysqli_real_escape_string($link,$_POST['gender']);
		$phone=mysqli_real_escape_string($link,$_POST['phone']);
		$username=mysqli_real_escape_string($link,$_POST['username']);
		$password_1=mysqli_real_escape_string($link,$_POST['password_1']);
		$password_2=mysqli_real_escape_string($link,$_POST['password_2']);

		//ensure that form fields are filled proparly
		if(empty($name)){
			array_push($errors,"Name is required");
		}
		if(empty($identification_no)){
			array_push($errors,"Id is required");
		}
		if(empty($gender)){
			array_push($errors,"Gender No is required");
		}
		if(empty($phone)){
			array_push($errors,"Phone is required");
		}
		if(empty($username)){
			array_push($errors,"Email is required");
		}
		if(empty($password_1)){
			array_push($errors,"Password is required");
		}
		if($password_1 !=$password_2){
			array_push($errors,"The two password do not match");
		}
		//if there are no errors, save user to database
		if(count($errors)==0){
			$password=md5($password_1);//encrypt password before storing in database(sequirty)
			$sql="INSERT INTO info (name, identification_no, gender, phone, username, password) VALUES('$name','$identification_no','$gender','$phone','$username','$password')";
			mysqli_query($link,$sql);
			$_SESSION['username']=$username;
			$_SESSION['success']="You are now logged in";
			header('location:index.php');//redirect to home page
		}
	}
	//log user in from login page
	if(isset($_POST['login'])){
		$username=mysqli_real_escape_string($link,$_POST['username']);
		$password=mysqli_real_escape_string($link,$_POST['password']);
		//ensure that form fields are filled proparly
		if(empty($username)){
			array_push($errors, "Username is required");
		}
		if(empty($password)){
			array_push($errors, "Password is required");
		}
	if(count($errors)==0){
		$password=md5($password);//encrypt password before comparing with that from database
		$query = "SELECT * FROM info WHERE username='$username' AND password='$password'";
		$result = mysqli_query($link,$query);
		if(mysqli_num_rows($result)==1){
			//log user in
			$_SESSION['username']=$username;
			$_SESSION['success']="You are now logged in";
			
			header('location:dashboard.php');
		}else{
			array_push($errors,"Wrong username/password");
		}
	}
}

	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location:index.php');
	}
?>