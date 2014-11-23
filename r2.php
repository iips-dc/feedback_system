<?php
session_start();
$server = "localhost";
$username = "root";
$password="root";
$database="feedback_system_db";

$con=mysqli_connect($server,$username,$password,$database);
// Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $firstname=$_SESSION['First_Name'];
  $midname=$_SESSION['Mid_name'];
  $lastname=$_SESSION['Last_Name'];
  $fathername=$_SESSION['Father_Name'];
  $mothername=$_SESSION['Mother_Name'];
  $month=$_SESSION['Bmonth'];
  $date= $_SESSION['Bdate'];
  $year=$_SESSION['Byear'];
  $gender=$_SESSION['Gender'];
  $category=$_SESSION['Category'];
  $studentnumber=$_SESSION['Mobile_Number'];
  $guardiannumber=$_SESSION['Telephone_Number'];
  $email=$_SESSION['Email'];
  $currentaddress=$_SESSION['Current_Address'];
  $permanentaddress=$_SESSION['Permanent_Address'];

  $sql="INSERT INTO `user_master` VALUES('','$firstname', '$midname', '$lastname', '$fathername', '$mothername','$month', '$date', '$year', '$gender','$category', '$studentnumber', '$guardiannumber', '$email', '$currentaddress', '$permanentaddress','student',1) "; 

   // The below 4 line code for as fetching firstname and email as unique identification for second table because firstname may be same but email can't

   mysqli_query($con,$sql); 
   $sql="SELECT * from `user_master` where `First_Name`='$firstname' AND `Email`='$email'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   $studentno=$row['student_no'];
   $_SESSION['student_no'] = $studentno; 

  $High_School_Name=$_POST['highschoolname'];
  $Year_Of_Passing10= $_POST['yearofpassing10'];
  $Higher_Secondary_School_Name= $_POST['highersecandryschoolname'];
  $Year_Of_Passing12= $_POST['yearofpassing12'];
  //$Enrollment_Number=$_POST['enrollmentnumber'];
  $enroll_id=$_POST['enroll_id'];
  $enroll_year=$_POST['enroll_year'];
  $enroll_no=$_POST['enroll_no'];
  $Enrollment_Number=$enroll_id."/".$enroll_year."/".$enroll_no;
  
  //$Roll_Number=$_POST['rollno'];
  $course_id=$_POST['course_id'];
  $year_id=$_POST['year_id'];
  $roll_id=$_POST['roll_id'];
  $Roll_Number = $course_id."-2K-".$year_id."-".$roll_id;

  $Current_Course=$_POST['course'];
  $Current_Sem=$_POST['sem'];
  $Current_section=$_POST['section'];
  $Enrollment_Year=$_POST['enrollmentnumber'];
  $Alternate_Email= $_POST['altemail'];
  
//This "if" is for while we selecting M.tech and B.com as course it places "-" in the place of section
  if($Current_Course!='MCA')
  $Current_section='-';
  
  $feedBatchId= $course_id."-2K-".$year_id;
  $_SESSION['feedBatchId'] = $feedBatchId;
  echo $course_id."-2K-".$year_id;
  echo $feedBatchId;

  $feedbackStudentInfo="INSERT INTO `feedback_system_db`.`feedback_student_info` (`fs_id`, `batch_id`,`course`,`semester`, `section`, `feedback_session`) VALUES ('','$feedBatchId','$course_id','$Current_Sem' ,'$Current_section',2014)";
  $test2=mysqli_query($con,$feedbackStudentInfo);
  

  $sql="INSERT INTO `student_info`(`student_no`,`High_School_Name`, `Year_Of_Passing`, `Higher_Secondary_School_Name`, `Year_Of_Passing1`, `Enrollment_Number`, `Roll_Number`, `Current_Course`, `Current_Sem`, `Current_section`, `Enrollment_Year`, `Alternate_Email`) VALUES ('$studentno','$High_School_Name','$Year_Of_Passing10','$Higher_Secondary_School_Name','$Year_Of_Passing12','$Enrollment_Number','$Roll_Number','$Current_Course','$Current_Sem','$Current_section','$Enrollment_Year','$Alternate_Email' )";
  $test=mysqli_query($con,$sql);
  
  if($test){
    header('location:app/feedback_forms/infrastructure_support.php');
  }
  echo "thank you";
?>