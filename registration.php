<?php 
session_start(); 
include 'includes/login/connect.inc.php';
$referrer = @$_SERVER['HTTP_REFERER']; 
if(preg_match("/registration.php/",$referrer))
  
	session_destroy();
  echo $referrer;
  
  $firstname=@$_SESSION['First_Name'];
  $midname=@$_SESSION['Mid_name'];
  $lastname=@$_SESSION['Last_Name'];
  $fathername=@$_SESSION['Father_Name'];
  $mothername=@$_SESSION['Mother_Name'];
  $month=@$_SESSION['Bmonth'];
  $date=@ $_SESSION['Bdate'];
  $year=@$_SESSION['Byear'];
  $gender=@$_SESSION['Gender'];
  $category=@$_SESSION['Category'];
  $studentnumber=@$_SESSION['Mobile_Number'];
  $guardiannumber=@$_SESSION['Telephone_Number'];
  $email=@$_SESSION['Email'];
  $currentaddress=@$_SESSION['Current_Address'];
  $permanentaddress=@$_SESSION['Permanent_Address'];


  $_SESSION['High_School_Name']=@$_POST['highschoolname'];
  $_SESSION['Year_Of_Passing10']=@ $_POST['yearofpassing10'];
  $_SESSION['Higher_Secondary_School_Name']=@ $_POST['highersecandryschoolname'];
  $_SESSION['Year_Of_Passing12']=@ $_POST['yearofpassing12'];
  
  //$_SESSION['Enrollment_Number']=@$_POST['enrollmentnumber'];
  /*$_SESSION['enroll_id']=@$_POST['enroll_id'];
  $_SESSION['enroll_year']=@$_POST['enroll_year'];
  $_SESSION['enroll_no']=@$_POST['enroll_no'];
*/
  $_SESSION['eno']=@$_POST['eno'];
  
  //$_SESSION['Roll_Number']=@$_POST['rollno'];
  $_SESSION['course_id']=@$_POST['course_id'];
  $_SESSION['year_id']=@$_POST['year_id'];
  $_SESSION['roll_id']=@$_POST['roll_id'];

  $_SESSION['Current_Course']=@$_POST['course'];
  $_SESSION['Current_Sem']=@$_POST['sem'];
  $_SESSION['Current_section']=@$_POST['section'];
  $_SESSION['Enrollment_Year']=@$_POST['enrollmentnumber'];
  $_SESSION['Alternate_Email']=@$_POST['altemail']; 

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="assests/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="assests/js/jquery.min.js"></script>
<link rel="stylesheet" href="FormValidation.css">
<script type="text/javascript" src="MyFormValidation.js" ></script>
<script>
//Function for allowing only numbers in postal code and phone numbers... 
//Here 8 is for backspace key, 37 for left arrow key and 39 for right arrow key and 9 is for Tab.
//Here is a problem that ascii key conflicts occur at 37 and 39 % and ' also work.
function onlyNumbers(event)				
{
    	var e =event; 
   	var charCode = e.which || e.keyCode;

    		if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 37 || charCode == 39 || charCode == 9) 
       			 return true;
			else
				 return false;

}
function onlyChars(event)
{
	var e =event;
	var charCode = e.which || e.keyCode;
	if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
		return true;
	else 
		return false;
}


function onlyCharsn(event)
{
	var e =event;
	var charCode = e.which || e.keyCode;
	if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8 || charCode == 9 
	||charCode == 32 || charCode == 46 || charCode == 37 || charCode == 39)
		return true;
	else 
		return false;
}



/*Function used to copy the current address to permanent address*/
function Copy(add)
{
	if(add.checkme.checked==true)
	{
		add.permanentaddress.value=add.currentaddress.value;
	}
}
function digitsonly(e)
{
	var data=document.getElementById('cnumber').value;
	if(data.Length!=10)
       {
       alert("Please enter 10 digits");
       return false;
       }
    else
    	return true;   
}
</script>

<script>
$(document).ready(function() {
	$ ( "#firstname").focus();
});



</script>


</head>
<body>
	<div>  <!-- This div for outermost panel where panel property is removed-->
		<div> <h3 class="panel-title"> <br><center><img class="img-responsive" src="assests/img/2.png"></center></h3></div>
			<div class="panel panel-default">
				<body style="background-color:white;">
					<div class="container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8" style="">
								<div class="col-md-2"></div>
								
								<!-- starting inside panel -->
								
									<div class="panel panel-primary">
										<div class="panel-heading"><h4>Personal Information</h4></div>
										<div class="panel-body">
												
				
											<form role="form" action="registration2.php" method="POST" id="theForm" action="r.php"> 
					
					
												<div class="form-group">
					
													<table border="0" class="table">
														<tr>
															<td>
																<label>Name<span style="color:#ff0000"> *</span></label>
																
																
																
														
																
																
																
															</td>
															<td>
																<div class="row">
																<div class="col-md-4">
																	<input required="required"  id="firstname" type="text" class="form-control" placeholder="FirstName" onkeypress="return onlyCharsn(event)" name="firstname" value ="<?php echo $firstname;?>"> 
																</div>
																
							
																<div class="col-md-4">
																	<input type="text" class="form-control" placeholder="MiddleName" onkeypress="return onlyCharsn(event)" name="midname" value ="<?php echo $midname ;?>">
																</div>
																<div class="col-md-4">
																	<input required="required"  type="text" class="form-control" placeholder="LastName" onkeypress="return onlyCharsn(event)" name="lastname" value ="<?php echo $lastname ;?>"> 
																</div>
																</div>
															</td>
														</tr>
						
      
														<tr>
															<td>
																<label>Father's Name<span style="color:#ff0000"> *</span></label>
															</td>
															<td>
																<input required="required"  type="text" class="form-control" placeholder="Father Name" onkeypress="return onlyCharsn(event)" name="fathername" value ="<?php echo $fathername ;?>" >
															</td>
														</tr> 
	
														<tr>
															<td>
																<label>Mother's Name<span style="color:#ff0000"> *</span></label>
															</td>
															<td>
																<input required="required"  type="text" class="form-control" placeholder="Mother Name" onkeypress="return onlyCharsn(event)" name="mothername" value ="<?php echo $mothername ;?>">
															</td>
														</tr>
    	
														<tr>
															<td>
																<label>BirthDay<span style="color:#ff0000"> *</span></label>
															</td>
															<td>
																<div class="row">
																	<div class="col-md-4">
																		<select class="form-control" name="month" value ="<?php echo $month ;?>">
																			<option>January</option>
																			<option>February</option>
																			<option>March</option>
																			<option>April</option>
																			<option>May</option>
																			<option>June</option>
																			<option>July</option>
																			<option>August</option>
																			<option>September</option>
																			<option>October</option>
																			<option>November</option>
																			<option>December</option>
																		</select>
																	</div>
																	<div class="col-md-4">
																		<select class="form-control" name="date" value ="<?php echo $date ;?>">
																			<script>var i;for(i=1;i<=31;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>
																	</div>
																	<div class="col-md-4">
																		<select class="form-control" name="year" value ="<?php echo $year ;?>">
																			<script>var i;for(i=1950; i<=2014; i++) {document.write("<option>"+i + "</option>");}</script>
																		</select>
																	</div>
																</div>
															</td>
	
														</tr>

														<tr>
															<td>
																<label>Gender<span style="color:#ff0000"> *</span></label>
															</td>
                                                        	<td>
																<div class="row">
																	<div class="col-md-4">
																		<select class="form-control" name="gender" value ="<?php echo $gender ;?>">
																			<option>Male</option>
																			<option>Female</option>
																			<option>other</option>
																		</select>
																	</div>
																</div>	
	                                                        </td>
														</tr>	
														<tr>
															<td>
																<label>Category<span style="color:#ff0000"> *</span></label>
															</td>
															<td><div class="row">
																<div class="col-md-4">
																	<select class="form-control" name="category" value ="<?php echo $category ;?>">
																		<option>General</option>
																		<option>OBC</option>
																		<option>ST</option>
																		<option>SC</option>
																		
																		
																	</select>
																</div>	
																</div>
															</td>	
   
														<tr>
															<td>
																<label>Mobile_Number<span style="color:#ff0000"> *</span></label>
															</td>
															<td>
																<div class="row">
																<div class="col-md-1" style="padding:0px">
																	<input required="required"  style="border-right:#ffffff;" type="text" class="form-control" value="+91" disabled>
																</div>
																	<div class="col-md-4" style="padding:0px">
																		<input required="required"  style="width:150px;border-top-left-radius:0px;border-bottom-left-radius:0px;border-left:#ffffff;top:94px;left:460px" type="text" class="form-control" placeholder="9876543210" name="studentnumber"onkeypress="return onlyNumbers(event)" maxlength="10" value ="<?php echo $studentnumber ;?>">
																	</div>
																</div>
															</td>
														</tr>	
														<tr>
															<td>
																<label>Telephone_Number</label>
															</td>
															<td>
																<div class="row">
																	<div class="col-md-4">
																		<input   type="text" class="form-control" placeholder="0731-222222" name="guardiannumber" value ="<?php echo $guardiannumber ;?>" onkeypress="return onlyNumbers(event)">
																	</div>
																	
																</div>
															</td>
														</tr>					

														<tr>
															<td>
																<label>Email<span style="color:#ff0000"> *</span></label>
															</td>
															<td>
																<input required="required"  type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email"value ="<?php echo $email ;?>"> 	
															</td>
														</tr>
														
														<tr>
															<td>
																<label>Current Address<span style="color:#ff0000"> *</span></label>
															</td>
															<td>
																<textarea class="form-control" rows="3" id="add" name="currentaddress"><?php echo $currentaddress ;?></textarea>
															</td>
														</tr>	

														<tr>
															<td colspan="2">
																<label>
																	<input  type="checkbox" style="display:inline;" name="checkme" onclick="Copy(this.form)"><span style="display:inline;">Copy to Permanent Address</span>
																</label>
															</td>
														</tr> 
														

														<tr>
															<td>
																<label>Permanent Address<span style="color:#ff0000">*</span></label>
															</td>
															
 	                                                        <td>
																<textarea class="form-control" rows="3" name="permanentaddress" ><?php echo $permanentaddress ;?></textarea>
															</td>
														</tr>	
													</table>
												</div>
		
			
			
												<!--<a class="btn btn-success" href="registration2.html" role="button">Next Step</a>-->
												<center>
												
													<input type="submit" class="btn btn-success" value="Next Step" role="button">
													<!--	<input required="required"  class="btn btn-success" type="submit" value="Submit" id="submit"> -->
													<input class="btn btn-danger" type="reset" value="Reset">	
												</center>
												<br><br>
		
											</form>

										</div>
									</div>
                                    <!-- ending inside panel -->
								
							</div>			
						</div>
					</div><!---container's div-->
				</body>
			</div>
	</div>	

	<div class="panel-footer"><br>Panel footer<br></div> 
</body>


</html>

