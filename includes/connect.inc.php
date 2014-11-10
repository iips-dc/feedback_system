<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db_name = "feedback_system_db";
	echo "connecting to db";
	$con = mysqli_connect($host, $user, $pass, $db_name);
	echo "connected to db";
	if(mysqli_connect_errno($con)){
		echo 'Failed to connect to the database : '.mysqli_connect_error();
		die();
	}
?>