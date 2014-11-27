<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- Including files for DB connection and Session Control -->
<?php
    session_start();
    ob_start();
    // include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';

    //$studentNo = $_SESSION['student_no'];
    //echo $studentNo;
    
    //Query to find student details like course name, semester, section etc.
    //$studentInfoQuery = mysqli_query($con, "SELECT * FROM `student_info` WHERE `student_no` = '$studentNo'");
    //$studentInfo = mysqli_fetch_array($studentInfoQuery);
    //$course = $studentInfo['Current_Course'];
    $course_id = $_SESSION['course_id'];
    //$course = "MCA";
    //$sem = $studentInfo['Current_Sem'];
    //$sem = 1;
    $Current_Sem = $_SESSION['Current_Sem'];
    echo "course id";
    echo $course_id;
    echo "current sem";
    echo $Current_Sem;
    //$section = $studentInfo['Current_section'];
    $section = "A";
    //Query to find course id from course table using course name
    //$courseIdQuery = mysqli_query($con, "SELECT `course_id` FROM `course` WHERE `course_name` = '$course'");
    /*if($courseIdQuery)
        echo "Success".$course;
    else
        echo "Failure";*/
    //$courseRow = mysqli_fetch_array($courseIdQuery);
    //$courseId = $courseRow['course_id'];
    //echo $courseId;

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
 
<body>
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
<div class="panel panely-primary" >
<div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title text-center">ACADEMIC ASSESSMENT</h2>
        </div>
</div>

            <div class="row alert alert-info">
                     <strong class="col-md-6">Instructions:</strong><br>
                    <!-- <div class="col-sm-6" style="margin-left:-10px;"> -->
                         <label>1-Very poor</label> 
                         <label>2-Poor</label>
                         <label>3-Good</label>
                         <label>4-Average</label>
                         <label>5-Excellence</label>
                    <!-- </div> --><!-- Closing of class=colm-sm-6-->
            </div>  

    <form action="#" method="POST">   
        <div class="lead"> 
            <div class="panel panel-primary">
            <div class="container">
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
                    <br>
                    
                    <label class=" control-label col-sm-offset-2 col-sm-2" for="subject">Subject:</label>  
                        <div class=" col-sm-2 col-sm-2">
                                <select id="company" required="required" class="form-control" name="subject_code">
                                   <?php

                                        //query to find subjects which are available in this course.
                                        $selectSubjectQuery = mysqli_query($con, "SELECT * FROM subject WHERE course_id = 'IC' AND semester = '11'  AND is_viva_or_lab=0" );
                                        $subjectRows = mysqli_num_rows($selectSubjectQuery);
                                        echo "rows";
                                        echo $subjectRows;
                                        print_r($subjectRows);
                                        while ($row = mysqli_fetch_array($selectSubjectQuery)){
                                            $name = $row['name_of_subject'];
                                            $id = $row['subject_id'];
                                            echo "<option value=".$id."> ".$name." </option>";
                                        }
                                    ?>
                                </select> 
                        
                    </div>
                </div>
            </div> 
            </div>
            <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title text-center">Teaching Assessment</h2>
                    </div>
            </div>


                                    
            <div class="container" id="a">
                <strong class="col-lg-6">1. Availability to bring conceptual clearity</strong>
                 <div class="col-sm-6">
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
                <strong class="col-lg-6">2. Teacher's Subject Knowledge</strong>
                 <div class="col-sm-6">
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
                <strong class="col-lg-6">3. Compliments theory with practical examples</strong>
                <div class="col-sm-6" id="A3">
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
                <strong class="col-lg-6">4. Handling of cases/ assignment/ exercises/ activities</strong>
                <div class="col-sm-6" id="A4">
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
                <strong class="col-lg-6">5. Motivation Provided By Teacher</strong>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">6. Ability of control the class</strong>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">7. Completion and coverage of course</strong>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">8. Teacher's communication of skill  </strong>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">9. Teacher's Regularity and Punctuality</strong>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">10. Interaction and Guidance Outside the Classroom</strong>
                <div class="col-sm-6">
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
            </div>
            <div class="container">
                <label class="col-lg-6">Any Other Suggestion(Regarding Subject):</label>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">1. Relevance Of Syllabus As Per Industry Requirement</strong>
                <div class="col-sm-6">
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
                <strong class="col-lg-6">2. Sufficiency Of Course Content</strong>
                <div class="col-sm-6">
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
                <label class="col-lg-6">Any Other Suggestion(Regarding Subject):</label>
                 <div class="col-sm-6">
                    <textarea rows="5" class="form-control" name="suggestion_for_course" placeholder="Suggestions..."></textarea>  
                 </div>
            </div>
            <br>
            <div class="col-md-offset-6"><input type="submit" name="submit_feedback" class="btn btn-primary" value="Submit"></div>    
        </div>
    </form>          
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

<?php
/*    if (isset($_POST['submit_feedback'])) 
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
*/
            /*if (!empty($conectualClearity) && !empty($subjectKnowledge) && !empty($practicalExamples) && !empty($handlingCapability) 
                && !empty($motivation) && !empty($controlAbility) && !empty($courseCompletion) && !empty($communicationSkill)
                && !empty($regularityPunctuality) && !empty($outsideGuidance) && !empty($syllabusIndustryRelvance) && !empty($sufficiencyOfCourse)
                && !empty($suggestionForSubject) && !empty($suggestionForCourse)) 
            {*/
                # Query to find faculty id from time table using subject id 
            /*$facultyIdQuery = mysqli_query($con, "SELECT `faculty_id` FROM `time_table` WHERE `subject_id` = '$subjectId'");
            $facultyRow = mysqli_fetch_array($facultyIdQuery);
            $facultyId = $facultyRow['faculty_id'];
            echo "faculty id = ".$facultyId."  ";
                */
            /*$insertQueryRun = mysqli_query($con, "INSERT INTO `academic_assessment_info`(`s_no`, `subject_id`, `faculty_id`, `conceptual_clarity`, `subject_knowledge`, `practical_example`, `handling_capability`, `motivation`, `control_ability`, `course_completion`, `communication_skill`, `regularity_punctuality`, `outside_guidance`, `syllabus_industry_relvance`, `sufficiency_of_course`, `suggestion_for_subject`, `suggestion_for_course`) 
                                                VALUES ('' , '$subjectId', '$facultyId', '$conceptualClearity', '$subjectKnowledge', '$practicalExamples', '$handlingCapability', '$motivation', '$controlAbility', '$courseCompletion', '$communicationSkill', '$regularityPunctuality', '$outsideGuidance', '$syllabusIndustryRelvance', '$sufficiencyOfCourse', '$suggestionForSubject', '$suggestionForCourse')");
            echo $insertQueryRun;*/
 /*           mysqli_query($con, "UPDATE `subject` SET `status` = 1 WHERE `subject_id` = '$subjectId'");
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
 */           /*}
            else
            {
                echo "<script type='javascript'> window.alert('Please fill all the required fields.'); </script>";
            }*/
       // }
?>
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
            /*$facultyIdQuery = mysqli_query($con, "SELECT `faculty_id` FROM `time_table` WHERE `subject_id` = '$subjectId'");
            if($facultyIdQuery)
                echo "Success";
            else
                echo "Failure";*/
            /*$facultyRow = mysqli_fetch_array($facultyIdQuery);
            $facultyId = $facultyRow['faculty_id'];
            echo "faculty id = ".$facultyId."  ";*/
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
            /*}
            else
            {
                echo "<script type='javascript'> window.alert('Please fill all the required fields.'); </script>";
            }*/
        }
        ?>
