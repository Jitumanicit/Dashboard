<?php

	// Required if your environment does not handle autoloading
	require 'C:\xampp\htdocs\vendor\autoload.php';

	// Use the REST API Client to make requests to the Twilio REST API
	use Twilio\Rest\Client;

	// Your Account SID and Auth Token from twilio.com/console
	$sid = 'AC4a34c2f4b27b1b0998ad1650dc92bf11';
	$token = 'ca538b8fcac176bf38f9530bc155b689';
	$client = new Client($sid, $token);

	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("localhost", "root", "", "face_record");
 
	// Check connection
	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	
	}
 
// Escape user inputs for security
$face_class = mysqli_real_escape_string($link, $_REQUEST['face_class']);
$identification_no = mysqli_real_escape_string($link, $_REQUEST['identification_no']);
$photo = mysqli_real_escape_string($link, $_REQUEST['photo']);

 
// attempt insert query execution
$recognized=0;
$phone;
$name = '';
$complete_match = 0;
$sql1="SELECT phone,name,face_class FROM info WHERE identification_no='".$identification_no."'";
if($result = mysqli_fetch_array(mysqli_query($link, $sql1))) {
	$recognized = 1;
	$phone = $result['phone'];
	$name = $result['name'];
	if($face_class == $result['face_class'])
		$complete_match = 1;
}
else{
	$recognized = 0;
}
$photo_id = rand(1,10000);
$sql = "INSERT INTO recognition_result (face_class, identification_no, photo, photo_id, date, time, status) VALUES ('$face_class','$identification_no', 'photo', '$photo_id', NOW(), NOW(), '$complete_match')";
if(mysqli_query($link, $sql)){
	$sql2 = "INSERT INTO attendance (identification_no, date, ispresent) VALUES ('$identification_no', NOW(), '$complete_match')";
		if(mysqli_query($link, $sql2)){
			if($recognized) {
				$msg = "";
				if($complete_match == 1)
					$msg = 'Your face is recognized properly. at' .  date("d-m-Y") . 'in' . date("h:i:sa");
				else
					$msg = 'Sorry, Your face is not recognized. at' .  date("d-m-Y") . 'in' . date("h:i:sa");
				echo "<script>alert(\"". $msg ."\")</script>";
				// Use the client to do fun stuff like send text messages!
				$client->messages->create(
				    // the number you'd like to send the message to
				    $phone,
				    array(
				        // A Twilio phone number you purchased at twilio.com/console
				        'from' => '+19495183187',
				        // the body of the text message you'd like to send
				        'body' => 'Hi, '. $name . ' ' . $msg
				    )
			);
		}
		else
			echo "<script type='text/javascript'>alert('Your record save successfully but your face is not recognised.')</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// close connection
mysqli_close($link);
?>
<!---+19495183187-->