<?php
    session_start();
    // include '../../includes/login/core.inc.php';
    include '../includes/login/connect.inc.php';
   // echo $_POST['course_id'];
 //$_SESSION['course_id']=$_POST['course_id'];
   // $_SESSION['course_id']=$_POST['course_id'];
    //$course_id = $_SESSION['course_id'];
    //$course = "MCA";
    //$sem = $studentInfo['Current_Sem'];
    //$sem = 1;
   // $Current_Sem = $_SESSION['Current_Sem'];
    //echo "course id";
    //echo $_SESSION['course_id'];
    //echo "current sem";
    //echo $_SESSION['Current_Sem'];
    //$section = $studentInfo['Current_section'];
   // $section = "A";
     $batch_id=$_POST['batch_id'];
     $course=$_POST['course'];
     $course_id=$_POST['course_id'];
     $semester=$_POST['semester'];
     $batch=$course_id.'-'.$batch_id;
     $section=$_POST['section'];
     echo $semester;
     $sql="INSERT INTO `feedback_student_info` VALUES ('', $batch,'$course_id','$semester','$section','2014')";
    $insertStudentInfo= mysqli_query($con,$sql) or die("Error : ".mysqli_error($con));
    echo $insertStudentInfo;
    echo "asuccessfully";


?>