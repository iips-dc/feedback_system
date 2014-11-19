<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- Including files for DB connection and Session Control -->
<?php
    session_start();
    // include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';

    //$studentNo = $_SESSION['student_no'];
    //echo $studentNo;
    
    //Query to find student details like course name, semester, section etc.
    //$studentInfoQuery = mysqli_query($con, "SELECT * FROM `student_info` WHERE `student_no` = '$studentNo'");
    //$studentInfo = mysqli_fetch_array($studentInfoQuery);
    //$course = $studentInfo['Current_Course'];
    $course = "MCA";
    //$sem = $studentInfo['Current_Sem'];
    $sem = 1;
    //$section = $studentInfo['Current_section'];
    $section = "A";
    //Query to find course id from course table using course name
    $courseIdQuery = mysqli_query($con, "SELECT `course_id` FROM `course` WHERE `course_name` = '$course'");
    /*if($courseIdQuery)
        echo "Success".$course;
    else
        echo "Failure";*/
    $courseRow = mysqli_fetch_array($courseIdQuery);
    $courseId = $courseRow['course_id'];
    echo $courseId;

    if (isset($_POST['submit_feedback'])) 
        {
            # code...
            echo "feedback submit";
            $subjectId = $_POST['subject_code'];
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

            /*if (!empty($conectualClearity) && !empty($subjectKnowledge) && !empty($practicalExamples) && !empty($handlingCapability) 
                && !empty($motivation) && !empty($controlAbility) && !empty($courseCompletion) && !empty($communicationSkill)
                && !empty($regularityPunctuality) && !empty($outsideGuidance) && !empty($syllabusIndustryRelvance) && !empty($sufficiencyOfCourse)
                && !empty($suggestionForSubject) && !empty($suggestionForCourse)) 
            {*/
                # Query to find faculty id from time table using subject id 
            $facultyIdQuery = mysqli_query($con, "SELECT `faculty_id` FROM `time_table` WHERE `subject_id` = '$subjectId'");
            if($facultyIdQuery)
                echo "Success";
            else
                echo "Failure";
            /*$facultyRow = mysqli_fetch_array($facultyIdQuery);
            $facultyId = $facultyRow['faculty_id'];
            echo "faculty id = ".$facultyId."  ";*/

            $insertQueryRun = mysqli_query($con, "INSERT INTO `academic_assessment_info`(`s_no`, `subject_id`, `faculty_id`, `conceptual_clarity`, `subject_knowledge`, `practical_example`, `handling_capability`, `motivation`, `control_ability`, `course_completion`, `communication_skill`, `regularity_punctuality`, `outside_guidance`, `syllabus_industry_relvance`, `sufficiency_of_course`, `suggestion_for_subject`, `suggestion_for_course`) 
                                                VALUES ('' , '$subjectId', '$facultyId', '$conceptualClearity', '$subjectKnowledge', '$practicalExamples', '$handlingCapability', '$motivation', '$controlAbility', '$courseCompletion', '$communicationSkill', '$regularityPunctuality', '$outsideGuidance', '$syllabusIndustryRelvance', '$sufficiencyOfCourse', '$suggestionForSubject', '$suggestionForCourse')");
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
            /*}
            else
            {
                echo "<script type='javascript'> window.alert('Please fill all the required fields.'); </script>";
            }*/
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
             
        </style>
    </head>
 
<body>

    <div class="page-header">
              <h1 class="text-center"><u>ACADEMIC ASSESSMENT</u></h1>
    </div>

    <form action="#" method="POST">   
        <div class="lead"> 
            <div class="row">
                    <!--<label class=" control-label col-sm-offset-2 col-sm-2" for="faculty">Faculty Name:</label>  
                        <div class=" col-sm-2 col-sm-2">
                                <select id="company" class="form-control">
                                               <option>Faculty1</option>
                                               <option>Faculty2</option>
                                               <option>Faculty3</option>
                                               <option>Faculty4</option>
                                               <option>Faculty5</option>
                                </select> 
                        </div>-->

                    <label class=" control-label col-sm-offset-2 col-sm-2" for="subject">Subject Code:</label>  
                        <div class=" col-sm-2 col-sm-2">
                                <select id="company" required="required" class="form-control" name="subject_code">
                                   <?php

                                        //query to find subjects which are available in this course.
                                        $selectSubjectQuery = mysqli_query($con, "SELECT * FROM `subject` WHERE `course_id` = '$courseId' AND `semester` = '$sem' AND `status` = 0" );
                                        $subjectRows = mysqli_num_rows($selectSubjectQuery);
                                        while ($row = mysqli_fetch_array($selectSubjectQuery)){
                                            $name = $row['name_of_subject'];
                                            $id = $row['subject_id'];
                                            echo "<option value=".$id."> ".$name." </option>";
                                        }
                                    ?>
                                </select> 
                        </div>
            </div> 

            <div class="container">
                <h3><div class="panel-heading"><u>Faculty Assesment:</u></div></h3>  
            </div>


                                    
            <div class="container" id="A1">
                <strong class="col-lg-6">1. Availability to bring conceptual clearity</strong>
                 <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="1" onClick="changeColour('a')">Very poor
                    </label>         
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="2" onClick="changeColour('a')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="3" onClick="changeColour('a')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="4" onClick="changeColour('a')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="conceptual_clearity" required="required" value="5" onClick="changeColour('a')">Excellent
                    </label>
                </div>
            </div>
           
           <div class="container" id="A2">
                <strong class="col-lg-6">2. Teacher's Subject Knowledge</strong>
                 <div class="col-sm-6">
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="1" onClick="changeColour('b')">Very poor
                     </label> 
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="2" onClick="changeColour('b')">Poor
                     </label>
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="3" onClick="changeColour('b')">Good
                     </label>
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="4" onClick="changeColour('b')">Average
                     </label>
                     <label class="radio-inline">
                        <input type="radio" name="subject_knowledge" required="required" value="5" onClick="changeColour('b')">Excellent
                     </label>
                </div>
            </div>

            <div class="container" id="A3">         
                <strong class="col-lg-6">3. Compliments theory with practical examples</strong>
                <div class="col-sm-6" id="A3">
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="1" onClick="changeColour('c')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="2" onClick="changeColour('c')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="3" onClick="changeColour('c')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="4" onClick="changeColour('c')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="practical_example" required="required" value="5" onClick="changeColour('c')">Excellent
                    </label>
                </div>
            </div>


            <div class="container" id="A4">                                                     
                <strong class="col-lg-6">4. Handling of cases/ assignment/ exercises/ activities</strong>
                <div class="col-sm-6" id="A4">
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="1" onClick="changeColour('d')"> Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="2" onClick="changeColour('d')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="3" onClick="changeColour('d')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="4" onClick="changeColour('d')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="handling_capability" required="required" value="5" onClick="changeColour('d')">Excellent
                    </label>
                </div>
            </div>
                                
            <div class="container" id="A5">
                <strong class="col-lg-6">5. Motivation Provided By Teacher</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="1" onClick="changeColour('e')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="2" onClick="changeColour('e')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="3" onClick="changeColour('e')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="4" onClick="changeColour('e')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="motivation" required="required" value="5" onClick="changeColour('e')">Excellent
                    </label>
                </div>
            </div>

            <div class="container" id="A6">
                <strong class="col-lg-6">6. Ability of control the class</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="1" onClick="changeColour('f')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="2" onClick="changeColour('f')">Poor
                    </label>
                    <label class="radio-inline"> 
                        <input type="radio" name="control_ability" required="required" value="3" onClick="changeColour('f')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="4" onClick="changeColour('f')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="control_ability" required="required" value="5" onClick="changeColour('f')">Excellent
                    </label>
                </div>
            </div>
               
            <div class="container" id="A7">
                <strong class="col-lg-6">7. Completion and coverage of course</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="1" onClick="changeColour('g')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="2" onClick="changeColour('g')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="3" onClick="changeColour('g')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="4" onClick="changeColour('g')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="course_completion" required="required" value="5" onClick="changeColour('g')">Excellent
                    </label>
                </div>
            </div>
                
            <div class="container" id="A8">  
                <strong class="col-lg-6">8. Teacher's communication of skill  </strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill" required="required" value="1" onClick="changeColour('h')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill"  required="required" value="2" onClick="changeColour('h')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill"  required="required" value="3" onClick="changeColour('h')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill"  required="required" value="4" onClick="changeColour('h')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="communication_skill" required="required" value="5" onClick="changeColour('h')">Excellent
                    </label>
                </div>
            </div>

            <div class="container" id="A9">
                <strong class="col-lg-6">9. Teacher's Regularity and Punctuality</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="1" onClick="changeColour('i')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="2" onClick="changeColour('i')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="3" onClick="changeColour('i')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="4" onClick="changeColour('i')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="regularity_punctuality" required="required" value="5" onClick="changeColour('i')">Excellent
                    </label>
                </div>
            </div>

            <div class="container" id="A10">
                <strong class="col-lg-6">10. Interaction and Guidance Outside the Classroom</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance" required="required" value="1" onClick="changeColour('j')">Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance" required="required" value="2" onClick="changeColour('j')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance"  required="required" value="3" onClick="changeColour('j')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance" required="required" value="4" onClick="changeColour('j')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="outside_guidance"  required="required" value="5" onClick="changeColour('j')">Excellent
                    </label>
                </div>
            </div></br>

            <div class="container">
                <label class="col-lg-6">Any Other Suggestions(Regarding Subject):</label>
                <div class="col-sm-6">
                   <textarea rows="5" class="form-control" name="suggestion_for_subject" placeholder="Comments"></textarea>
                </div>
            </div>

            <div class="container">
                <h3><div class="panel-heading"><u>Course Assessment:</u></div></h3>  
            </div>
            
            <div class="container" id="C1">
                <strong class="col-lg-6">1. Relevance Of Syllabus As Per Industry Requirement</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="1" onClick="changeColour('A')" >Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="2" onClick="changeColour('A')" >Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="3" onClick="changeColour('A')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="4" onClick="changeColour('A')">Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="syllabus_industry_relevance" required="required" value="5" onClick="changeColour('A')">Excellent
                    </label>
                </div>
            </div>
                                    
            <div class="container" id="C2">
                <strong class="col-lg-6">2. Sufficiency Of Course Content</strong>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="1" onClick="changeColour('B')"> Very poor
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="2" onClick="changeColour('B')">Poor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="3" onClick="changeColour('B')">Good
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course" required="required" value="4" onClick="changeColour('B')"> Average
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sufficiency_of_course"  required="required" value="5" onClick="changeColour('B')">Excellent
                    </label>
                </div>
            </div><br>

            <div class="container">
                <label class="col-lg-6">Any Other Suggestions(Regarding Subject):</label>
                 <div class="col-sm-6">
                    <textarea rows="5" class="form-control" name="suggestion_for_course" placeholder="Comments"></textarea>  
                 </div>
            </div>

            <div class="col-md-offset-6"><input type="submit" name="submit_feedback" class="btn btn-primary" value="Submit"></div>    
        </div>
    </form>          
 

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
             case 'g':
                color = "green";
                document.getElementById("A7").style.backgroundColor = color;
            break;
             case 'h':
                color = "green";
                document.getElementById("A8").style.backgroundColor = color;
            break;
             case 'i':
                color = "green";
                document.getElementById("A9").style.backgroundColor = color;
            break;
             case 'j':
                color = "green";
                document.getElementById("A10").style.backgroundColor = color;
            break;
            case 'A':
                color = "green";
                document.getElementById("C1").style.backgroundColor = color;
            break;
            case 'B':
                color = "green";
                document.getElementById("C2").style.backgroundColor = color;
            break;
        }
        
    }
    </script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    if (isset($_POST['submit_feedback'])) 
        {
            # code...
            echo "feedback submit";
            $subjectId = $_POST['subject_code'];
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

            /*if (!empty($conectualClearity) && !empty($subjectKnowledge) && !empty($practicalExamples) && !empty($handlingCapability) 
                && !empty($motivation) && !empty($controlAbility) && !empty($courseCompletion) && !empty($communicationSkill)
                && !empty($regularityPunctuality) && !empty($outsideGuidance) && !empty($syllabusIndustryRelvance) && !empty($sufficiencyOfCourse)
                && !empty($suggestionForSubject) && !empty($suggestionForCourse)) 
            {*/
                # Query to find faculty id from time table using subject id 
            $facultyIdQuery = mysqli_query($con, "SELECT `faculty_id` FROM `time_table` WHERE `subject_id` = '$subjectId'");
            $facultyRow = mysqli_fetch_array($facultyIdQuery);
            $facultyId = $facultyRow['faculty_id'];
            echo "faculty id = ".$facultyId."  ";

            $insertQueryRun = mysqli_query($con, "INSERT INTO `academic_assessment_info`(`s_no`, `subject_id`, `faculty_id`, `conceptual_clarity`, `subject_knowledge`, `practical_example`, `handling_capability`, `motivation`, `control_ability`, `course_completion`, `communication_skill`, `regularity_punctuality`, `outside_guidance`, `syllabus_industry_relvance`, `sufficiency_of_course`, `suggestion_for_subject`, `suggestion_for_course`) 
                                                VALUES ('' , '$subjectId', '$facultyId', '$conceptualClearity', '$subjectKnowledge', '$practicalExamples', '$handlingCapability', '$motivation', '$controlAbility', '$courseCompletion', '$communicationSkill', '$regularityPunctuality', '$outsideGuidance', '$syllabusIndustryRelvance', '$sufficiencyOfCourse', '$suggestionForSubject', '$suggestionForCourse')");
            echo $insertQueryRun;
            mysqli_query($con, "UPDATE `subject` SET `status` = 1 WHERE `subject_id` = '$subjectId'");
            echo "update query for subject status";

            if ($subjectRows == 0) {
                # code...
                echo "final feedback submission";
                mysqli_query($con, "UPDATE `subject` SET `status` = 0" );
                echo "<script type='javascript'> window.alert('Feedback successfully submitted!'); </script>";
            }
            else {
                echo "<script type='javascript'> window.alert('Feedback for ".$name." submitted, Press OK to submit next subject feedback.'); </script>";
            }
            /*}
            else
            {
                echo "<script type='javascript'> window.alert('Please fill all the required fields.'); </script>";
            }*/
        }
?>