<?php
	//This file is use to redirect the user to infrastructure_support.php for feedack.
	//The user fills the information like course_id,semester, course etc on the index.php of app/feedback_forms
	//then submit the details, those details are processed here and a record is inserted in feedback_student_info table
	//to generate fs_id (auto-incremeted attribute).


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

    $_SESSION['feedBatchId']=$_POST['batch_id'];
   
    $_SESSION['course_id']=$_POST['courseid'];
   
    $_SESSION['Current_Sem']=$_POST['sem'];

    $_SESSION['Current_section']=$_POST['section'];

     $batch_id=$_POST['batch_id'];
    $course=$_POST['course'];
     $course_id=$_POST['courseid'];
     $semester=$_POST['sem'];
     $batch=$course_id.'-'.$batch_id;
     $section=$_POST['section'];
     
     if ($_POST['courseid']== "IC")
     {
        $_SESSION['Current_section']=$_POST['section'];
        $section=$_POST['section'];
     } 
     else{

       $section="";
       $_SESSION['Current_section']=$section;
     }

     $feedbackStudentInfo="INSERT INTO `feedback_system_db`.`feedback_student_info` (`fs_id`, `batch_id`,`course`,`semester`, `section`, `feedback_session`) VALUES ('','$batch','$course_id','$semester' ,'$section',2014)";
            $test2=mysqli_query($con,$feedbackStudentInfo);
            $fsid=mysqli_insert_id($con);
            echo $test2;
            echo $fsid;
            $_SESSION['fs_id'] = $fsid;
            if ($test2) {
                # code...
                    header('location:../app/feedback_forms/infrastructure_support.php');
            }


    


?>