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
     $semester;

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