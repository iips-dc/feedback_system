<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- Including files for DB connection and Session Control -->
<?php
	//echo "before session ";
    session_start();
    ob_start();

    
    include '../../includes/login/connect.inc.php';

    
   		 $parameter_query= mysqli_query($con,"SELECT course,semester FROM feedback_student_info WHERE fs_id = '".$_SESSION['fs_id']."'" );
                                        $parameter_row = mysqli_num_rows($parameter_query);
                                        
                                        
                                        //print_r($subjectRows);
                                        $row = mysqli_fetch_array($parameter_query);
                                        
                                            $course_id = $row[0];
                                            //echo $course_id;
                                            $Current_Sem = $row[1];
                                            
                                        

    $section = "A";
    

?>

<?php 
	$all_subjects_ids    = array(); 		// array containing list of all subject ids
	$filled_subjects_ids = array(); 		// array containing list of filled subjects
	$subjects_to_fill    = array();			// array containing list of subjects still to be filled
	/* Query for selecting filled subjects in feedback of academic_assessment_info table*/
	 $query= mysqli_query($con,"SELECT subject_id FROM academic_assessment_info WHERE fs_id = '".$_SESSION['fs_id']."'" );
	 while ($row = mysqli_fetch_array($query)) {
			array_push($filled_subjects_ids, $row['subject_id']);
	 }

	/* Query for selecting all subjects from subject table */
	$selectSubjectQuery = mysqli_query($con, "SELECT * FROM subject WHERE course_id = '".$course_id."' AND semester = '".$Current_Sem."'  AND is_viva_or_lab=0" );
    $subjectRows = mysqli_num_rows($selectSubjectQuery);
	while ($subject_row = mysqli_fetch_array($selectSubjectQuery)){
        $name = $subject_row['name_of_subject'];
        $id = $subject_row['subject_id'];
        $all_subjects_ids[$id] = $name;
	    }
	    

	/* creating the $subjects_to_fill array*/
	
	foreach ($all_subjects_ids as $subject_id => $subject_name) {
	       	# code...
			if (!in_array($subject_id, $filled_subjects_ids)) {
				# code...
				$subjects_to_fill[$subject_id] = $subject_name;
			}

	       } 

	    //Condition to check if feedback of all subjects had been given than redirect to a thankyou page
	    if (count($subjects_to_fill)==0) {
	          	# code...
	    		 header('location:thankyou.php');
	          }      


 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Academic Assessment</title>
        <link rel="stylesheet" href="../../assests/css/bootstrap/bootstrap.min.css">
        <style type="text/css">
            .page-header{
                        font-style: normal;
                       }
             
                     h2{           
                           font-weight: bold;
                       }
            .container{
                         font-size: 15px;
                       }
                  label{
                        padding:5px;
                      }
                   hr{
                       margin-top:2px;
                     }
        </style>
    </head>
 
<body onload="show_all()">
<div class="panel panel-primary"> <!--Outermost panel-->
    <div class="panel-title">   <!--class=panelheading-->
        <div class="container">    <!--class=container-->
            <div class="row">   <!--class=row-->
               <div><img src="../../assests/img/2.png"></div>
            </div> <!--closing of class=row-->
        </div>     <!--closing of class=container-->
    </div> <!--closing of class=panelheading--> 
</div>  <!--closing of outermost panel-->
<div class="container">

<div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title text-center">ACADEMIC ASSESSMENT</h2>
        </div>
</div>
			<!--div to show ID for the session, if power gets cut than this ID can be used to resume-->
          <div class="alert alert-block">
              
              
                             <?php echo "Note down this ID for feedback session :";
                                   echo $_SESSION['fs_id']; 
                              ?>
          </div>
            <div class="row alert alert-info">
                     <strong class="col-md-6">Instructions:</strong><br>
                         <label>1-Very poor</label> 
                         <label>2-Poor</label>
                         <label>3-Good</label>
                         <label>4-Average</label>
                         <label>5-Excellence</label>
            </div>  

    <form action="#" method="POST" >   
        <div class="lead"> 
            <div class="panel panel-primary">
            <div class="container">
            <div class="row">


                    <br>
                    
                    <label class=" control-label col-sm-offset-2 col-sm-2" for="subject">Subject:</label>  
                        <div class=" col-sm-2 col-sm-2">
                                <select id="company" required="required" class="form-control" value = "select" name="subject_code" placeholder="Select" onchange="show_all()">
                                   <?php

                                        //Iterating list of subjects available to be filled .
                                        echo "<option> Select </option>";
                                        foreach ($subjects_to_fill as $subject_id => $subject_name) {
                                        	# code...
                                        	
                                        		echo "<option value=".$subject_id."> ".$subject_name." </option>";
                                            
                                        }
                                            
                                        
                                    ?>
                                </select> 

                        
                   		 </div>
                    
            </div>
            </div> 
            </div>
            <!-- main form starts here . Below will be hided onload and will show after subject is selected -->
    <div id="main-form" class="container">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title text-center">Teaching Assessment</h2>
                    </div>
            </div>


                                    
            <div class="container" id="a">
                <strong class="col-md-6">1. Availability to bring conceptual clearity</strong>
                 <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="1" onClick="changeColour('a')">1
                    </label>         
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="2" onClick="changeColour('a')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="3" onClick="changeColour('a')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="4" onClick="changeColour('a')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="5" onClick="changeColour('a')">5
                    </label>
                </div>
            </div>
           
            <hr>

           <div class="container" id="b">
                <strong class="col-md-6">2. Teacher's Subject Knowledge</strong>
                 <div class="col-md-6">
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="1" onClick="changeColour('b')">1
                     </label> 
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="2" onClick="changeColour('b')">2
                     </label>
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="3" onClick="changeColour('b')">3
                     </label>
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="4" onClick="changeColour('b')">4
                     </label>
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="5" onClick="changeColour('b')">5
                     </label>
                </div>
            </div>

            <hr>

            <div class="container" id="c">         
                <strong class="col-md-6">3. Compliments theory with practical examples</strong>
                <div class="col-md-6" id="A3">
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="1" onClick="changeColour('c')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="2" onClick="changeColour('c')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="3" onClick="changeColour('c')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="4" onClick="changeColour('c')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="5" onClick="changeColour('c')">5
                    </label>
                </div>
            </div>

            <hr>

            <div class="container" id="d">                                                     
                <strong class="col-md-6">4. Handling of cases/ assignment/ exercises/ activities</strong>
                <div class="col-md-6" id="A4">
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="1" onClick="changeColour('d')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="2" onClick="changeColour('d')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="3" onClick="changeColour('d')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="4" onClick="changeColour('d')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="5" onClick="changeColour('d')">5
                    </label>
                </div>
            </div>
               
            <hr>

            <div class="container" id="e">
                <strong class="col-md-6">5. Motivation Provided By Teacher</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="1" onClick="changeColour('e')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="2" onClick="changeColour('e')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="3" onClick="changeColour('e')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="4" onClick="changeColour('e')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="5" onClick="changeColour('e')">5
                    </label>
                </div>
            </div>

            <hr>

            <div class="container" id="f">
                <strong class="col-md-6">6. Ability of control the class</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="1" onClick="changeColour('f')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="2" onClick="changeColour('f')">2
                    </label>
                    <label class="radio-inline"> 
                        <input type="radio" name="control_ability" required="required" value="3" onClick="changeColour('f')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="4" onClick="changeColour('f')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="5" onClick="changeColour('f')">5
                    </label>
                </div>
            </div>
               
            <hr>

            <div class="container" id="g">
                <strong class="col-md-6">7. Completion and coverage of course</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="1" onClick="changeColour('g')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="2" onClick="changeColour('g')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="3" onClick="changeColour('g')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="4" onClick="changeColour('g')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="5" onClick="changeColour('g')">5
                    </label>
                </div>
            </div>

            <hr>
                
            <div class="container" id="h">  
                <strong class="col-md-6">8. Teacher's communication of skill  </strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill" required="required" value="1" onClick="changeColour('h')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill"  required="required" value="2" onClick="changeColour('h')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill"  required="required" value="3" onClick="changeColour('h')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill"  required="required" value="4" onClick="changeColour('h')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill" required="required" value="5" onClick="changeColour('h')">5
                    </label>
                </div>
            </div>

            <hr>

            <div class="container" id="i">
                <strong class="col-md-6">9. Teacher's Regularity and Punctuality</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="1" onClick="changeColour('i')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="2" onClick="changeColour('i')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="3" onClick="changeColour('i')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="4" onClick="changeColour('i')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="5" onClick="changeColour('i')">5
                    </label>
                </div>
            </div>

            <hr>

            <div class="container" id="j">
                <strong class="col-md-6">10. Interaction and Guidance Outside the Classroom</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance" required="required" value="1" onClick="changeColour('j')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance" required="required" value="2" onClick="changeColour('j')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance"  required="required" value="3" onClick="changeColour('j')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance" required="required" value="4" onClick="changeColour('j')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance"  required="required" value="5" onClick="changeColour('j')">5
                    </label>
                </div>
            </div></br>
            
            <div class="container">
                <label class="col-md-6">Any Other Suggestion(Regarding Subject):</label>
                <div class="col-md-6">
                   <textarea rows="5" class="form-control" name="suggestion_for_subject" placeholder="Suggestions..."></textarea>
                </div>
            </div>
            <hr>
            
            <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title text-center">Teaching Assessment</h2>
                    </div>
            </div>
            
            <div class="container" id="A">
                <strong class="col-md-6">1. Relevance Of Syllabus As Per Industry Requirement</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="1" onClick="changeColour('A')" >1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="2" onClick="changeColour('A')" >2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="3" onClick="changeColour('A')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="4" onClick="changeColour('A')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="5" onClick="changeColour('A')">5
                    </label>
                </div>
            </div>
              
            <hr>

            <div class="container" id="B">
                <strong class="col-md-6">2. Sufficiency Of Course Content</strong>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="1" onClick="changeColour('B')">1
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="2" onClick="changeColour('B')">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="3" onClick="changeColour('B')">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course" required="required" value="4" onClick="changeColour('B')">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="5" onClick="changeColour('B')">5
                    </label>
                </div>
            </div>
            <br>

            <div class="container">
                <label class="col-md-6">Any Other Suggestion(Regarding Subject):</label>
                 <div class="col-md-6">
                    <textarea rows="5" class="form-control" name="suggestion_for_course" placeholder="Suggestions..."></textarea>  
                 </div>
            </div>
            <br>
            
            <div class="col-md-offset-6"><input type="submit" name="submit_feedback" class="btn btn-primary" value="Submit"></div>    
        	
    </div> <!-- main-form div ended -->
    	</div>

    </form>   
    </div>
    </div>       
    <script>

	function show_all(){
	    	// Showing the form after selecting subject
	    	var val = document.getElementById('company').value;
	    	if (val != "Select") {
	    	document.getElementById('main-form').style.display = 'inherit';
	    }
	    else{
	    	document.getElementById('main-form').style.display = 'none';

	    }
	}

  
    function changeColour(id)
    {
        document.getElementById(id).style.backgroundColor = "#D9F7BC";
    }
    </script>



    
</body>
</html>

<?php

?>
<?php
    if (isset($_POST['submit_feedback'])) 
        {
            # code...
            echo "feedback submit";
            echo $subjectId = $_POST['subject_code'];
            $conceptualClearity = $_POST['conceptual_clearity'];
            $subjectKnowledge = $_POST['subject_knowledge'];
            $practicalExamples = $_POST['practical_example'];
            $handlingCapability = $_POST['handling_capability'];
            $motivation = $_POST['motivation'];
            $controlAbility = $_POST['control_ability'];
            $courseCompletion = $_POST['course_completion'];
            $communicationSkill = $_POST['communication_skill'];
            $regularityPunctuality = $_POST['regularity_punctuality'];
            $outsideGuidance = $_POST['outside_guidance'];
            $syllabusIndustryRelvance = $_POST['syllabus_industry_relevance'];
            $sufficiencyOfCourse = $_POST['sufficiency_of_course'];
            $suggestionForSubject = $_POST['suggestion_for_subject'];
            $suggestionForCourse = $_POST['suggestion_for_course'];

            
            $facultyIdQuery = mysqli_query($con, "SELECT `faculty_id` FROM `time_table` WHERE `subject_id` = '$subjectId'");
            $facultyRow = mysqli_fetch_array($facultyIdQuery);
            $facultyId = $facultyRow['faculty_id'];
            echo "faculty id = ".$facultyId."  ";
            $feedBatchId = $_SESSION['feedBatchId'];
            $fsid = $_SESSION['fs_id'];
            echo $fsid;

            $insertQueryRun = mysqli_query($con, "INSERT INTO `academic_assessment_info`(`s_no`,`fs_id`, `subject_id`, `faculty_id`, `conceptual_clarity`, `subject_knowledge`, `practical_example`, `handling_capability`, `motivation`, `control_ability`, `course_completion`, `communication_skill`, `regularity_punctuality`, `outside_guidance`, `syllabus_industry_relvance`, `sufficiency_of_course`, `suggestion_for_subject`, `suggestion_for_course`) 
                                                VALUES ('' ,'$fsid','$subjectId', '$facultyId', '$conceptualClearity', '$subjectKnowledge', '$practicalExamples', '$handlingCapability', '$motivation', '$controlAbility', '$courseCompletion', '$communicationSkill', '$regularityPunctuality', '$outsideGuidance', '$syllabusIndustryRelvance', '$sufficiencyOfCourse', '$suggestionForSubject', '$suggestionForCourse')");
            echo $insertQueryRun;
            mysqli_query($con, "UPDATE `subject` SET `status` = 1 WHERE `subject_id` = '$subjectId'");
            echo "no. of rows- ".$subjectRows;
            
            if ($subjectRows == 0) {
                # code...
                echo "final feedback submission";
                mysqli_query($con, "UPDATE `subject` SET `status` = 0" );
                echo "<script type='javascript'> window.alert('Feedback successfully submitted!'); </script>";
            }
            else {
                echo "<script type='javascript'> window.alert('Feedback for ".$name." submitted, Press OK to submit next subject feedback.'); </script>";
            }
            header('Location: '.$_SERVER['PHP_SELF']);
            
        }
        ?>
