<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
    // include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<?php
   session_start();
   $feedBatchId = $_SESSION['feedBatchId'];
   $_SESSION['feedBatchId'] = $feedBatchId;
   $course_id = $_SESSION['course_id'];
   $_SESSION['course_id'] = $course_id;
   $Current_Sem = $_SESSION['Current_Sem'];
   $_SESSION['Current_Sem'] = $Current_Sem;
   $Current_section = $_SESSION['Current_section'];

   echo $feedBatchId;
   $studentno=$_SESSION['student_no'];
   echo $studentno;

    if (isset($_POST['infrastructure_feedback_submit'])) {
        # code...
        echo "set";
        $availabilityOfBooks = $_POST['books_availability'];
        $basicRequirements = $_POST['basic_requirements'];
        $technologicalSupport = $_POST['technological_support'];
        $photocopyOfStudyMaterial = $_POST['study_material'];
        $availabilityOfOtherResources = $_POST['resourse_availability'];
        $cleanlinessOfClass = $_POST['cleaniliness_of_class'];

        //if (!empty($availabilityOfbooks) && !empty($basicRequirements) && !empty($technologicalSupport) && !empty($photocopyOfStudyMaterial) && !empty($availabilityOfOtherResources) && !empty($cleanlinessOfClass)) {
            # code...
            echo "not empty";
            echo $basicRequirements;
            $feedbackStudentInfo="INSERT INTO `feedback_system_db`.`feedback_student_info` (`fs_id`, `batch_id`,`course`,`semester`, `section`, `feedback_session`) VALUES ('','$feedBatchId','$course_id','$Current_Sem' ,'$Current_section',2014)";
            $test2=mysqli_query($con,$feedbackStudentInfo);
            $fsid=mysqli_insert_id($con);
            echo $fsid;
            $_SESSION['fs_id'] = $fsid;

            $insertQueryRun = mysqli_query($con,"INSERT INTO `infrastructure_support_info`(`s_no`,`fs_id`,`books_availability`, `basic_requirements`, `technological_support`, `study_material`, `resource_availability`, `cleaniliness_of_class`) VALUES ('','$fsid','$availabilityOfBooks', '$basicRequirements', '$technologicalSupport', '$photocopyOfStudyMaterial', '$availabilityOfOtherResources', '$cleanlinessOfClass')");
            if($insertQueryRun)
             {   
                echo "<script type='javascript'> window.alert('Feedback successfully submitted!'); </script>";
                header('location:academic_assessment.php');
             }
            else
                echo "Error"; 
        //}
        /*else
        {
            echo "<script type='javascript'> window.alert('Please fill all the required fields.'); </script>";
        }*/
    }
    
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Infrastructure Support</title>
<link rel="stylesheet" href="../../assests/css/bootstrap/bootstrap.min.css">
  <!--This  style is used in div class page header & conatiner-->
<style type="text/css">

/*font-weight apply in Infrastructue Support(title)*/  
             h2{           
                 font-weight: bold;
               }
/*font-size apply in body*/
     .container{
                 font-size: 15px;
               }
          label{
                padding:3px;
              }
           hr{
               margin-top:5px;
             }
      
</style>
</head>
 
<body>
 
    <div class="panel panel-primary"> <!--Outermost panel-->
  <div class="panel-title">   <!--paneltitle-->
      <div class="container">  <!--class=container-->
          <div class="row">      <!--class=row-->
            <div><img src="../../assests/img/2.png"></div>
          </div> <!--closing of class=row-->
      </div>     <!--closing of class=container-->
  </div>       <!--closing of class=panelheading-->
</div>         <!--closing of outermost panel-->

<div class="panel panel-primary">    
    <div class="panel-heading">
          <h2 class="panel-title text-center">INFRASTRUCTURE SUPPORT</h2>
    </div>  <!--closing of class=panel-title-->
   <!--closing of class=panel panel-primary-->
			<div class=" row alert alert-info">
					<div class="col-md-4">
                     <strong >Instructions<br></strong>
                  	 
                     <label>1-Very poor</label> 
                     <label>2-Poor</label>
                     <label>3-Good</label>
                     <label>4-Average</label>
                     <label>5-Excellence</label>
                     </div>

                 <!-- Closing of class=colm-sm-6-->
            </div>
    <form action="#" method="POST" name="myForm">
        <div class="container" id="a">
                <strong class="col-lg-6">1.) Availability of Books in Library</strong>
                <div class="col-sm-6">
                     <label class="radio-inline">
                       <input type="radio" name="books_availability" required="required" value="1" onClick="changeColour('a')">1
                     </label> 
                     <label class="radio-inline">
                       <input type="radio" name="books_availability" required="required" value="2" onClick="changeColour('a')">2
                     </label>
                    <label class="radio-inline">
                      <input type="radio" name="books_availability" required="required" value="3" onClick="changeColour('a')">3
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="books_availability" required="required" value="4" onClick="changeColour('a')">4
                     </label>
                    <label class="radio-inline">
                      <input type="radio" name="books_availability" required="required" value="5" onClick="changeColour('a')">5
                    </label>
                </div>
        </div>
        <hr>
                                                           
        <div class="container" id="b">
            <strong class="col-lg-6">2.) Basic Requirements like Furniture, Chalk, Duster</strong>
                <div class="col-sm-6">
                  <label class="radio-inline">
                      <input type="radio" name="basic_requirements" required="required" value="1" onClick="changeColour('b')">1
                  </label> 
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="2" onClick="changeColour('b')">2
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="3" onClick="changeColour('b')">3
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="4"onClick="changeColour('b')">4
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="5" onClick="changeColour('b')">5
                  </label>
                </div>
        </div>  
        <hr >
        <div class="container" id="c">                            
          <strong class="col-lg-6">3.) Technological Support like OHP/LCD  </strong>
              <div class="col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="1" onClick="changeColour('c')">1
                  </label> 
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="2" onClick="changeColour('c')">2
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="3" onClick="changeColour('c')">3
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="4" onClick="changeColour('c')">4
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="5" onClick="changeColour('c')">5
                  </label>
              </div>
        </div> 
        <hr>
        <div class="container" id="d">                        
          <strong class="col-lg-6">4.) Photocopy of Study Material</strong>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="1" onClick="changeColour('d')">1
              </label> 
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="2" onClick="changeColour('d')">2
              </label>
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="3" onClick="changeColour('d')">3
              </label>
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="4" onClick="changeColour('d')">4
              </label>
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="5" onClick="changeColour('d')">5
              </label>
            </div>
        </div>                           
        <hr>                                             
        <div class="container" id="e">
          <strong class="col-lg-6">5.) Availability of Other Resources Like Internet/Computers/Softwares/Databases etc</strong>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="1" onClick="changeColour('e')">1
              </label> 
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="2" onClick="changeColour('e')">2
              </label>
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="3" onClick="changeColour('e')">3
              </label>
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="4" onClick="changeColour('e')">4
              </label>
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="5" onClick="changeColour('e')">5
              </label>
            </div>
        </div>                           
        <hr>
        <div class="container" id="f">
            <strong class="col-lg-6">6.) Cleanliness in the Classroom</strong>
              <div class="col-sm-6">
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="1" onClick="changeColour('f')">1
                </label> 
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="2" onClick="changeColour('f')">2
                </label>
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="3" onClick="changeColour('f')">3
                </label>
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="4" onClick="changeColour('f')">4
                </label>
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="5" onClick="changeColour('f')">5
                </label>
              </div>
        </div>
        <hr>                        
        <div class="col-sm-offset-6"> <input type="submit" class="btn btn-primary" name="infrastructure_feedback_submit" value="Submit and Next"></div>    
    </form> 
    <br> 
</div>
    
    <div class="footer">
      <div class="container">
        <center></center>
      </div>
    </div>

    <script>
    function changeColour(id)
    {
        document.getElementById(id).style.backgroundColor = "#D9F7BC";
    }      
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>