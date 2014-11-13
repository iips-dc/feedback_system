<!DOCTYPE html>
<!-- Including files for DB connection and Session Control -->
<?php
    // include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<?php
	

	if (isset($_POST['submit_feedback'])) {
		# code...
		$facultyName = $_POST['faculty_name'];
		$subjectCode = $_POST['subject_code'];
		$conceptualClearity = $_POST['conceptual_clearity'];
		$subjectKnowledge = $_POST['subject_knowledge'];
		$practicalExample = $_POST['practical_example'];
		$handlingCapability = $_POST['handling_capability'];
		$motivation = $_POST['motivaion'];
		$controlAbility = $_POST['control_ability'];
		$courseCompletion = $_POST['course_completion'];
		$communicationSkill = $_POST['communication_skill'];
		$regularityPunctuality = $_POST['regularity_punctuality'];
		$outsideGuidance = $_POST['outside_guidance'];
		$syllabusIndustryRelvance = $_POST['syllabus_industry_relvance'];
		$sufficiencyOfCourse = $_POST['sufficiency_of_course'];

		$insertQuery = "INSERT INTO `feedback_info`(`s_no`, `student_no`, `subject_id`, `faculty_id`, `conceptual_clearity`, `subject_knowledge`, `practical_example`, `handling_capability`, `motivation`, `control_ability`, `course_completion`, `communication_skill`, `regularity_punctuality`, `outside_guidance`, `syllabus_industry_relvance`, `sufficiency_of_course`, `books_availability`, `basic_requirements`, `technological_support`, `study_material`, `resourse_availability`, `cleaniliness_of_class`) 
											VALUES ('', '', '$subjectCode', '$facultyName', '$conceptualClearity', '$subjectKnowledge', '$practicalExample', '$handlingCapability', '$motivation', '$controlAbility', '$courseCompletion', '$communicationSkill', '$regularityPunctuality', '$outsideGuidance', '$syllabusIndustryRelvance', '$sufficiencyOfCourse', '', '', '', '', '', '')"
		$queryRun = mysqli_query($insertQuery, $dbConnect);
	}
?>

<head>
	<title>Academic Assessment</title>
</head>
<body>
	<label><center><b><h1>ACADEMIC ASSESSMENT</b></h1></center></label>
	<!--<label><b><h5>Faculty Assessment</h5></b></label>-->
	
	<!--Feedback form starts here-->
	<form action="#" method="POST">
		<table border="1px">
			<tr>
				
				<th colspan=3>Faculty Name 
					<select name="faculty_name">
						<option>Faculty1</option>
						<option>Faculty2</option>
						<option>Faculty3</option>
						<option>Faculty4</option>
					</select>
				</th>
				<th colspan=3>Subject Code
					<select name="subject_code">
						<option>code1</option>
						<option>code2</option>
						<option>code3</option>
						<option>code4</option>
					</select>
				</th>
			</tr>
			<tr><th>Faculty Assessment</th><th>1-Very Poor</th><th>2-Poor</th><th>3-Good</th><th>4-Average</th><th>5-Excellent</th></tr>
			<tr>
				<th>1. Availability to bring conceptual clearity</th>
				<th><input type="radio" name="conceptual_clearity" value=1/> 1<br /></th>
				<th><input type="radio" name="conceptual_clearity" value=2/> 2<br /></th>
				<th><input type="radio" name="conceptual_clearity" value=3/> 3<br /></th>
				<th><input type="radio" name="conceptual_clearity" value=4/> 4<br /></th>
				<th><input type="radio" name="conceptual_clearity" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>2. Teacher's Subject Knowledge</th>
				<th><input type="radio" name="subject_knowledge" value=1/> 1<br /></th>
				<th><input type="radio" name="subject_knowledge" value=2/> 2<br /></th>
				<th><input type="radio" name="subject_knowledge" value=3/> 3<br /></th>
				<th><input type="radio" name="subject_knowledge" value=4/> 4<br /></th>
				<th><input type="radio" name="subject_knowledge" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>3. Compliments theory with practical examples</th>
				<th><input type="radio" name="practical_example" value=1/> 1<br /></th>
				<th><input type="radio" name="practical_example" value=2/> 2<br /></th>
				<th><input type="radio" name="practical_example" value=3/> 3<br /></th>
				<th><input type="radio" name="practical_example" value=4/> 4<br /></th>
				<th><input type="radio" name="practical_example" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>4. Handling of cases/ assignment/ exercises/ activities</th>
				<th><input type="radio" name="handling_capability" value=1/> 1<br /></th>
				<th><input type="radio" name="handling_capability" value=2/> 2<br /></th>
				<th><input type="radio" name="handling_capability" value=3/> 3<br /></th>
				<th><input type="radio" name="handling_capability" value=4/> 4<br /></th>
				<th><input type="radio" name="handling_capability" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>5. Motivation Provided By Teacher</th>
				<th><input type="radio" name="motivation" value=1/> 1<br /></th>
				<th><input type="radio" name="motivation" value=2/> 2<br /></th>
				<th><input type="radio" name="motivation" value=3/> 3<br /></th>
				<th><input type="radio" name="motivation" value=4/> 4<br /></th>
				<th><input type="radio" name="motivation" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>6. Ability of control the class</th>
				<th><input type="radio" name="control_ability" value=1/> 1<br /></th>
				<th><input type="radio" name="control_ability" value=2/> 2<br /></th>
				<th><input type="radio" name="control_ability" value=3/> 3<br /></th>
				<th><input type="radio" name="control_ability" value=4/> 4<br /></th>
				<th><input type="radio" name="control_ability" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>7. Completion & coverage of course</th>
				<th><input type="radio" name="course_completion" value=1/> 1<br /></th>
				<th><input type="radio" name="course_completion" value=2/> 2<br /></th>
				<th><input type="radio" name="course_completion" value=3/> 3<br /></th>
				<th><input type="radio" name="course_completion" value=4/> 4<br /></th>
				<th><input type="radio" name="course_completion" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>8. Teacher's communication of skill</th>
				<th><input type="radio" name="communication_skill" value=1/> 1<br /></th>
				<th><input type="radio" name="communication_skill" value=2/> 2<br /></th>
				<th><input type="radio" name="communication_skill" value=3/> 3<br /></th>
				<th><input type="radio" name="communication_skill" value=4/> 4<br /></th>
				<th><input type="radio" name="communication_skill" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>9. Teacher's Regularity & Punctuality</th>
				<th><input type="radio" name="regularity_punctuality" value=1/> 1<br /></th>
				<th><input type="radio" name="regularity_punctuality" value=2/> 2<br /></th>
				<th><input type="radio" name="regularity_punctuality" value=3/> 3<br /></th>
				<th><input type="radio" name="regularity_punctuality" value=4/> 4<br /></th>
				<th><input type="radio" name="regularity_punctuality" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>10. Interaction & Guidance Outside The Classroom</th>
				<th><input type="radio" name="outside_guidance" value=1/> 1<br /></th>
				<th><input type="radio" name="outside_guidance" value=2/> 2<br /></th>
				<th><input type="radio" name="outside_guidance" value=3/> 3<br /></th>
				<th><input type="radio" name="outside_guidance" value=4/> 4<br /></th>
				<th><input type="radio" name="outside_guidance" value=5/> 5<br /></th>
			</tr>
			
			
		</table>
		
		<br/>
			
		<label><b><h3>Any Other Suggestion (regarding subject)</h3></b></label>
		
		<textarea name="fcomment"></textarea>
		
		</br>
		</br>

		<!--<label><b><h5>Course Assessment</h5></b></label>-->
	    <table border="1px">
			<!--<tr>
				
				<th colspan=3>Faculty Name 
					<select name="faculty_name">
						<option>Faculty1</option>
						<option>Faculty2</option>
						<option>Faculty3</option>
						<option>Faculty4</option>
					</select>
				</th>
				<th colspan=3>Subject Code
					<select name="subject_code">
						<option>code1</option>
						<option>code2</option>
						<option>code3</option>
						<option>code4</option>
					</select>
				</th>
			</tr>-->
			<tr><th>Course Assessment</th><th>1-Very Poor</th><th>2-Poor</th><th>3-Good</th><th>4-Average</th><th>5-Excellent</th></tr>
			<tr>
				<th>1. Relevance Of Syllabus As Per Industry Requirement</th>
				<th><input type="radio" name="syllabus_industry_relvance" value=1/> 1<br /></th>
				<th><input type="radio" name="syllabus_industry_relvance" value=2/> 2<br /></th>
				<th><input type="radio" name="syllabus_industry_relvance" value=3/> 3<br /></th>
				<th><input type="radio" name="syllabus_industry_relvance" value=4/> 4<br /></th>
				<th><input type="radio" name="syllabus_industry_relvance" value=5/> 5<br /></th>
			</tr>
			<tr>
				<th>2. Sufficiency Of Course Content</th>
				<th><input type="radio" name="sufficiency_of_course" value=1/> 1<br /></th>
				<th><input type="radio" name="sufficiency_of_course" value=2/> 2<br /></th>
				<th><input type="radio" name="sufficiency_of_course" value=3/> 3<br /></th>
				<th><input type="radio" name="sufficiency_of_course" value=4/> 4<br /></th>
				<th><input type="radio" name="sufficiency_of_course" value=5/> 5<br /></th>
			</tr>
		</table> <!--Feedback form ends here-->

		<button type="submit" name="submit_feedback" value="Submit Feedback"></button>
	</form>
	<br/>
		
	<label><b><h3>Any Other Suggestion (regarding course)</h3></b></label>
	
	<textarea name="fcomment"></textarea>	

</body>
</html>