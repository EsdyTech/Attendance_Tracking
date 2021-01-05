<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "attendance_tracking";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed To Connect to database:" . $conn->connect_error;
	}
?>