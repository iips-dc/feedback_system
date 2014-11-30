
<?php 
session_start(); 
include 'includes/login/connect.inc.php';
/* variables from previous page */
/* for storing data of registration.php */
 
 //$_SESSION['course_id']=$_POST['course_id'];

   //$_SESSION['course_id']=$_POST['course_id'];

 
  /*$course=@$_SESSION['Current_Course'];
  $sem=@$_SESSION['Current_Sem'];
  $section=@$_SESSION['Current_section'];*/
 
/* End of session variables */

?>

<html>
<head>
	
</head>
</html>


<!DOCTYPE html>
<html>
  <head>
    <title>
     Student Feedback Form
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- Bootstrap -->
     <!--link rel="stylesheet" type="text/css" href="bootstrap/Flat-UI-master/css/flat-ui.css"-->
    <link rel="stylesheet" href="../../assests/css/bootstrap/bootstrap.min.css">
</head>
<body>
  <div class="panel panel-primary">
   <!-- <div class="page-header"> -->
      <div class="panel-heading">
          <h2 class="text-center">STUDENT's FEEDBACK</h2>
      </div>
   <!-- </div> -->
   </div>
   <div class="row alert alert-info" align="center">
                     <strong class="col-md-12" >Thank-you for registering with IIPS. You may now proceed for feedback anonymously.</strong><br>
                    <!-- <div class="col-sm-6" style="margin-left:-10px;"> -->
                         
                    <!-- </div> --><!-- Closing of class=colm-sm-6-->
            </div>  

   <div class="row alert alert-info">
      <div class="panel-body">
          <h3><strong>INSTRUCTIONS:</strong></h3>
          <p><small>1.)You are requested to give your frank and objective opinion about various aspects of the subject taught to you for improving and maintaining quality of teaching.</br>
          2.) Your response will be kept confidential.</br>
          3.) Specify the BatchId correctly you have provided e.g:IC-2k10</small>
          </p>
       </div>
  </div>
<form name="feedback_login_form" method="post" action='../../php_scripts/feedback_login.php' id = 'feedback__login_form'>
<div class="jumbotron container-custom" >
    <div class="form-group">
         <div class="row">  
              <label class="control-label col-sm-offset-2 col-sm-2" for="company">Name of programmes</label>
            <div class="col-sm-6 col-sm-4">
               <select name="course" class="form-control">
                  <option>MCA</option>
                  <option>MTECH</option>
                  
               </select> 
            </div>
        </div>
     </div>

     <div class="form-group">
         <div class="row">  
              <label class="control-label col-sm-offset-2 col-sm-2" for="company">Course ID</label>
            <div class="col-sm-6 col-sm-4">
               <select name="course_id" class="form-control">
                  <option>IC</option>
                  <option>IT</option>
                  
               </select> 

            </div>
        </div>
     </div>

     <div class="form-group">
         <div class="row">  
              <label class="control-label col-sm-offset-2 col-sm-2" for="company">Batch ID</label>
            <div class="col-sm-6 col-sm-4">
                <select name="batch_id" class="form-control">
                  <option>2K9</option>
                  <option>2K10</option>
                  <option>2K11</option>
                  <option>2K12</option>
                  <option>2K13</option>
                  <option>2K14</option>              
               </select>

            </div>
        </div>
     </div>

      <div class="form-group">
         <div class="row">  
              <label class="control-label col-sm-offset-2 col-sm-2" for="company">Section</label>
            <div class="col-sm-6 col-sm-4">
                <select name="section" class="form-control">
                  <option>A</option>
                  <option>B</option>              
               </select>

            </div>
        </div>
     </div>         

   <div class="form-group">
        <div class="row">
                   <label class="control-label col-md-offset-2 col-md-2" for="company">Semester</label>
            <div class="col-md-4 col-md-4">
                     <select name="semester" class="form-control">
                            <option>1</option>
                            
                            <option>3</option>
                            <option>5</option>
                            
                            <option>7</option>
                            
                            <option>9</option>
                            
                            <option>11</option>
                            
                    </select> 
            </div>
        </div>
    </div>

<!-- <div class="form-group">
        <div class="row">
                         <label class="control-label col-sm-offset-2 col-md-2" for="company">Id(Provided to you):</label>
            <div class="col-sm-2 col-md-4">
                 <input type="text" class="form-control" id="inputLabel4" placeholder="Id">
            </div>
        </div>
</div> -->

<div class="form-group" >
    <div class="row" >
                      <!-- <label class="control-label col-sm-offset-2 col-md-2" for="company">BatchId</label> -->
           <div  align="center">
               <!-- <input type="text" class="form-control" id="inputLabel4" placeholder="BatchId"></br> -->
               <button type="submit" name="submit" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-danger">Exit</button>     
           </div>
    <div>
</div>
</form>
    

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--script src="bootstrap/js/jquery.js"></script-->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

