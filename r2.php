<?php
session_start();
$server = "";
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

  $sql="INSERT INTO `user_master` VALUES('','$firstname', '$midname', '$lastname', '$fathername', '$mothername','$month', '$date', '$year', '$gender','$category', '$studentnumber', '$guardiannumber', '$email', '$currentaddress', '$permanentaddress','$student', '') "; 

   

   mysqli_query($con,$sql); 
   $sql="SELECT * from `user_master` where `First_Name`='$firstname' AND `Email` ='$email'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   $studentno=$row['student_no'];
   $_SESSION['student_no']=$studentno;
   

  $High_School_Name=$_POST['highschoolname'];
  $Year_Of_Passing= $_POST['yearofpassing10'];
  $Higher_Secondary_School_Name= $_POST['highersecandryschoolname'];
  $Year_Of_Passing= $_POST['yearofpassing12'];
  $Enrollment_Number=$_POST['enrollmentnumber'];
  $Roll_Number=$_POST['rollno'];
  $Current_Course=$_POST['course'];
  $Current_Sem=$_POST['sem'];
  $Current_section=$_POST['section'];
  $Enrollment_Year=$_POST['enrollmentnumber'];
  $Alternate_Email= $_POST['altemail'];
  

  if($Current_Course!='MCA')
	$Current_section='-';
	
  
  
  
  $sql="INSERT INTO `student_info`(`s_no`, `student_no`,`High_School_Name`, `Year_Of_Passing`, `Higher_Secondary_School_Name`, `Year_Of_Passing1`, `Enrollment_Number`, `Roll_Number`, `Current_Course`, `Current_Sem`, `Current_section`, `Enrollment_Year`, `Alternate_Email`) VALUES ('' ,'$studentno','$High_School_Name','$Year_Of_Passing','$Higher_Secondary_School_Name','$Year_Of_Passing','$Enrollment_Number','$Roll_Number','$Current_Course','$Current_Sem','$Current_section','$Enrollment_Year','$Alternate_Email' )";
   
 mysqli_query($con,$sql);
  
?>