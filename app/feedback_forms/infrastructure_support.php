<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    // include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<?php
   session_start();
   $feedBatchId = $_SESSION['feedBatchId'];
   $_SESSION['feedBatchId'] = $feedBatchId;
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
            $insertQueryRun = mysqli_query($con,"INSERT INTO `infrastructure_support_info`(`s_no`,`batch_id`,`books_availability`, `basic_requirements`, `technological_support`, `study_material`, `resource_availability`, `cleaniliness_of_class`) VALUES ('','$feedBatchId','$availabilityOfBooks', '$basicRequirements', '$technologicalSupport', '$photocopyOfStudyMaterial', '$availabilityOfOtherResources', '$cleanlinessOfClass')");
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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Infrastructure Support</title>
  <link rel="stylesheet" href="../../assests/css/bootstrap/bootstrap.min.css">
  <style type="text/css">
      .page-header{
                  font-style: normal;
                 }
      .container{
                 font-size: 20px;
                 }
       
  </style>

</head>
 
<body>
  
    <div class="panel-heading">
         <div class="container">
          <center>Header</center>
         </div>
    </div>

    <div class="page-header">
              <h1 class="text-center"><u>INFRASTRUCTURE SUPPORT</u></h1>
    </div>

    <form action="#" method="POST" name="myForm">
        <div class="container" id="A1">
                <strong class="col-lg-6">1.) Availability of Books in Library</strong>
                <div class="col-sm-6">
                     <label class="radio-inline">
                       <input type="radio" name="books_availability" required="required" value="1" onClick="changeColour('a')">Very poor
                     </label> 
                     <label class="radio-inline">
                       <input type="radio" name="books_availability" required="required" value="2" onClick="changeColour('a')">Poor
                     </label>
                    <label class="radio-inline">
                      <input type="radio" name="books_availability" required="required" value="3" onClick="changeColour('a')">Good
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="books_availability" required="required" value="4" onClick="changeColour('a')">Average
                     </label>
                    <label class="radio-inline">
                      <input type="radio" name="books_availability" required="required" value="5" onClick="changeColour('a')">Excellent
                    </label>
                </div>
        </div>
                                                           
        <div class="container" id="A2">
            <strong class="col-lg-6">2.) Basic Requirements like Furniture, Chalk, Duster</strong>
                <div class="col-sm-6">
                  <label class="radio-inline">
                      <input type="radio" name="basic_requirements" required="required" value="1" onClick="changeColour('b')">Very poor
                  </label> 
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="2" onClick="changeColour('b')">Poor
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="3" onClick="changeColour('b')">Good
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="4"onClick="changeColour('b')">Average
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="basic_requirements"  required="required" value="5" onClick="changeColour('b')">Excellent
                  </label>
                </div>
        </div>  

        <div class="container" id="A3">                            
          <strong class="col-lg-6">3.) Technological Support like OHP/LCD  </strong>
              <div class="col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="1" onClick="changeColour('c')">Very poor
                  </label> 
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="2" onClick="changeColour('c')">Poor
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="3" onClick="changeColour('c')">Good
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="4" onClick="changeColour('c')">Average
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="technological_support"  required="required" value="5" onClick="changeColour('c')">Excellent
                  </label>
              </div>
        </div> 

        <div class="container" id="A4">                        
          <strong class="col-lg-6">4.) Photocopy of Study Material</strong>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="1" onClick="changeColour('d')">Very poor
              </label> 
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="2" onClick="changeColour('d')">Poor
              </label>
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="3" onClick="changeColour('d')">Good
              </label>
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="4" onClick="changeColour('d')">Average
              </label>
              <label class="radio-inline">
                <input type="radio" name="study_material" required="required" value="5" onClick="changeColour('d')">Excellent
              </label>
            </div>
        </div>                           
                                                           
        <div class="container" id="A5">
          <strong class="col-lg-6">5.) Availability of Other Resources Like Internet/Computers/Softwares/Databases etc</strong>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="1" onClick="changeColour('e')">Very poor
              </label> 
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="2" onClick="changeColour('e')">Poor
              </label>
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="3" onClick="changeColour('e')">Good
              </label>
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="4" onClick="changeColour('e')">Average
              </label>
              <label class="radio-inline">
                <input type="radio" name="resourse_availability" required="required" value="5" onClick="changeColour('e')">Excellent
              </label>
            </div>
        </div>                           

        <div class="container" id="A6">
            <strong class="col-lg-6">6.) Cleanliness in the Classroom</strong>
              <div class="col-sm-6">
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="1" onClick="changeColour('f')">Very poor
                </label> 
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="2" onClick="changeColour('f')">Poor
                </label>
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="3" onClick="changeColour('f')">Good
                </label>
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="4" onClick="changeColour('f')">Average
                </label>
                <label class="radio-inline">
                  <input type="radio" name="cleaniliness_of_class" required="required" value="5" onClick="changeColour('f')">Excellent
                </label>
              </div>
        </div></br>
        <br>                            
        <div class="col-sm-offset-6"> <input type="submit" class="btn btn-primary" name="infrastructure_feedback_submit" value="Submit"></div>    
    </form>  
    <div class="footer">
      <div class="container">
        <center></center>
      </div>
    </div>

    <script>
    function changeColour(value, name)
    {
        var color = document.body.style.backgroundColor;
        switch(value)
        {
            case 'a':
                
                color = "green";
                document.getElementById("A1").style.backgroundColor = color;
            break;
            case 'b':
                color = "green";
                document.getElementById("A2").style.backgroundColor = color;
            break;
            case 'c':
                color = "green";
                document.getElementById("A3").style.backgroundColor = color;
            break;
             case 'd':
                color = "green";
                document.getElementById("A4").style.backgroundColor = color;
            break;
             case 'e':
                color = "green";
                document.getElementById("A5").style.backgroundColor = color;
            break;
             case 'f':
                color = "green";
                document.getElementById("A6").style.backgroundColor = color;
            break;
          }
    }      
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>