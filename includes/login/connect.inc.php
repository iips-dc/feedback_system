<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db_name = "feedback_system_db";
	$con = mysqli_connect($host, $user, $pass, $db_name);
	if(mysqli_connect_errno($con)){
		echo 'Failed to connect to the database : '.mysqli_connect_error();
		die();
	}
?>