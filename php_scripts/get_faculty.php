
<?php

session_start();
ob_start();
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$db = 'feedback_system_db';
	$con = mysqli_connect($host,$user,$pass,$db);
	if(mysqli_connect_errno($con)){
		echo 'Failed to connect to the database : '.mysqli_connect_error();
		die();
	}

	 $section=$_SESSION['section'];

 // echo "before";
//include '../../includes/login/connect.inc.php';
//echo "after";
if($_POST['id'])
     {
     $id=$_POST['id'];
     
     $facultyIdQuery = mysqli_query($con, "SELECT name FROM faculty_table WHERE User_Id = (SELECT faculty_id FROM time_table
WHERE subject_id = '$id' and section='$section' )");
     $facultyRow = mysqli_fetch_array($facultyIdQuery);
     echo $facultyId = $facultyRow[0];
             
     }
//echo "end";
     ?>