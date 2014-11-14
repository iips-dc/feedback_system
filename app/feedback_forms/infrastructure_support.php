<!-- This is the html coding for the infrastructure support feedback-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Including files for DB connection and Session Control -->
<?php
    // include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<?php
	if (isset($_POST['infrastructure_feedback_submit'])) {
		# code...
		$availabilityOfBooks = $_POST['availability_of_books'];
		$basicRequirements = $_POST['basic_requirements'];
		$technologicalSupport = $_POST['technological_support'];
		$photocopyOfStudyMaterial = $_POST['photocopy_of_study_material'];
		$availabilityOfOtherResources = $_POST['availability_of_other_resources'];
		$cleanlinessOfClass = $_POST['cleanliness_of_class'];

 		if (!empty($availabilityOfbooks) && !empty($basicRequirements) && !empty($technologicalSupport) && !empty($photocopyOfStudyMaterial) && !empty($availabilityOfOtherResources) && !empty($cleanlinessOfClass)) {
 			# code...

 			$insertQueryRun = mysqli_query("INSERT INTO `infrastructure_support_info`(`s_no`, `student_no`, `books_availability`, `basic_requirements`, `technological_support`, `study_material`, `resource_availability`, `cleaniliness_of_class`) VALUES ('', '', '$availabilityOfBooks', '$basicRequirements', '$technologicalSupport', '$photocopyOfStudyMaterial', '$availabilityOfOtherResources', '$cleanlinessOfClass')", );
 			echo "<script type='javascript'> window.alert('Feedback successfully submitted!'); </script>";
 		}
 		else
 		{
 			echo "<script type='javascript'> window.alert('Please fill all the required fields.'); </script>";
 		}
 	}
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Infrastructure Support</title>
<link rel="stylesheet" href="..//assests//css//bootstrap//bootstrap.min.css">

</head>
 

<body>
  

<!--<div class="panel-heading">
     <div class="container">
      <center>Header</center>
     </div>
</div>
-->
    <div class="page-header">
          <h1 class="text-center"><u><em>INFRASTRUCTURE SUPPORT</em></u></h1>
    </div>
    <div class="lead">
        <div class="panel-body">
            <div class="container">
                                                   
                <strong class="col-lg-6">1. Availability of Books in Library</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                    <input type="radio" name="availability_of_books" id="inlineRadio1" value="1"> Very poor
                    </label> 
                    <label class="radio-inline">
                    <input type="radio" name="availability_of_books" id="inlineRadio2" value="2">Poor
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="availability_of_books" id="inlineRadio3" value="3">Good
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="availability_of_books" id="inlineRadio3" value="4">Average
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="availability_of_books" id="inlineRadio3" value="5">Excellent
                    </label>
                </div>
                                                   
                                               
                <strong class="col-lg-6">2. Basic Requirements like Furniture, Chalk, Duster</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                    <input type="radio" name="basic_requirements" id="inlineRadio1" value="1"> Very poor
                    </label> 
                    <label class="radio-inline">
                    <input type="radio" name="basic_requirements" id="inlineRadio2" value="2">Poor
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="basic_requirements" id="inlineRadio3" value="3">Good
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="basic_requirements" id="inlineRadio3" value="4">Average
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="basic_requirements" id="inlineRadio3" value="5">Excellent
                    </label>
                </div>
                                               
                                                
                <strong class="col-lg-6">3. Technological Support like OHP/LCD</strong>
                <div class="col-sm-6">
                            <label class="radio-inline">
                            <input type="radio" name="technological_support" id="inlineRadio1" value="1"> Very poor
                            </label> 
                            <label class="radio-inline">
                            <input type="radio" name="technological_support" id="inlineRadio2" value="2">Poor
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="technological_support" id="inlineRadio3" value="3">Good
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="technological_support" id="inlineRadio3" value="4">Average
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="technological_support" id="inlineRadio3" value="5">Excellent
                            </label>
                </div>
                                                 
                <strong class="col-lg-6">4. Photocopy of Study Material</strong>
                <div class="col-sm-6">
                            <label class="radio-inline">
                            <input type="radio" name="photocopy_of_study_material" id="inlineRadio1" value="1"> Very poor
                            </label> 
                            <label class="radio-inline">
                            <input type="radio" name="photocopy_of_study_material" id="inlineRadio2" value="2">Poor
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="photocopy_of_study_material" id="inlineRadio3" value="3">Good
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="photocopy_of_study_material" id="inlineRadio3" value="4">Average
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="photocopy_of_study_material" id="inlineRadio3" value="5">Excellent
                            </label>
                </div>
                                   
                <strong class="col-lg-6">5. Availability of Other Resources Like Internet/Computers/Softwares/Databases etc</strong>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                            <input type="radio" name="availability_of_other_resources" id="inlineRadio1" value="1"> Very poor
                            </label> 
                            <label class="radio-inline">
                            <input type="radio" name="availability_of_other_resources" id="inlineRadio2" value="2">Poor
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="availability_of_other_resources" id="inlineRadio3" value="3">Good
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="availability_of_other_resources" id="inlineRadio3" value="4">Average
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="availability_of_other_resources" id="inlineRadio3" value="5">Excellent
                            </label>
                         </div>

                <strong class="col-lg-6">6. Cleanliness in the Classroom</strong>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                            <input type="radio" name="cleanliness_of_class" id="inlineRadio1" value="1"> Very poor
                            </label> 
                            <label class="radio-inline">
                            <input type="radio" name="cleanliness_of_class" id="inlineRadio2" value="2">Poor
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="cleanliness_of_class" id="inlineRadio3" value="3">Good
                            </label>
                            <label class="radio-inline">
                               <input type="radio" name="cleanliness_of_class" id="inlineRadio3" value="4">Average
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="cleanliness_of_class" id="inlineRadio3" value="5">Excellent
                            </label>
                         </div>
                
                <input type="submit" name="infrastructure_feedback_submit" value="Submit Feedback"></input>

            </div>
        </div>
    </div>

   
    <div class="footer">
      <div class="container">
        <!--<center>Place sticky footer content here.</center>-->
      </div>
    </div>
          
           
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
<script src="..//assets//js/bootstrap.min.js"></script>
</body>
</html>
