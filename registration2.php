<?php 
session_start(); 
include 'includes/login/connect.inc.php';
/* variables from previous page */
/* for storing data of registration.php */

$referrer = $_SERVER['HTTP_REFERER']; 
if(preg_match("/registration2.php/",$referrer))
	session_destroy();

  $highschoolname=@$_SESSION['High_School_Name'];
  $yearofpassing10=@$_SESSION['Year_Of_Passing10'] ;
  $highersecandryschoolname=@$_SESSION['Higher_Secondary_School_Name'];
  $yearofpassing12=@$_SESSION['Year_Of_Passing12'] ;
  
  //$enrollmentnumber=@$_SESSION['Enrollment_Number'];
  $enroll_id=@$_SESSION['enroll_id'];
  $enroll_year=@$_SESSION['enroll_year'];
  $enroll_no=@$_SESSION['enroll_no'];

  //$rollno=@$_SESSION['Roll_Number'];
  
  $course_id=@$_SESSION['course_id'];
  $year_id=@$_SESSION['year_id'];
  $roll_id=@$_SESSION['roll_id'];

  $course=@$_SESSION['Current_Course'];
  $sem=@$_SESSION['Current_Sem'];
  $section=@$_SESSION['Current_section'];
  $enrollmentnumber=@$_SESSION['Enrollment_Year'];
  $altemail=@$_SESSION['Alternate_Email'];


 
  $_SESSION['First_Name']=$_POST['firstname'];
  $_SESSION['Mid_name']=$_POST['midname'];
  $_SESSION['Last_Name']=$_POST['lastname'];
  $_SESSION['Father_Name']=$_POST['fathername'];
  $_SESSION['Mother_Name']=$_POST['mothername'];
  $_SESSION['Bmonth']=$_POST['month'];
  $_SESSION['Bdate']=$_POST['date'];
  $_SESSION['Byear']=$_POST['year'];
  $_SESSION['Gender']=$_POST['gender'];
  $_SESSION['Category']=$_POST['category'];
  $_SESSION['Mobile_Number']=$_POST['studentnumber'];
  $_SESSION['Telephone_Number']=$_POST['guardiannumber'];
//  $_SESSION['Telephone_Number'] .='-' . $_POST['guardiannumber1'];
  $_SESSION['Email']=$_POST['email'];
  $_SESSION['Current_Address']=$_POST['currentaddress'];
  $_SESSION['Permanent_Address']=$_POST['permanentaddress'];

/* End of session variables */

?>

<!DOCTYPE html>
<html>
<head>
<title>IIPS Registration</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="assests/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="assests/js/jquery.min.js"></script>


<script>
// This below scripting code for validation 
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
	if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8 || charCode == 9 ||charCode == 32 || charCode == 37 || charCode == 39)
		return true;
	else 
		return false;
}

function onlyCharsn(event)
{
	var e =event;
	var charCode = e.which || e.keyCode;
	if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8 || charCode == 9 
	||charCode == 32 || charCode == 37 || charCode == 39)
		return true;
	else 
		return false;
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




</head>
<body>  
   
   <div>  <!-- 1st panel-->
		<div> <h3 class="panel-title"> <br><center><img class="img-responsive" src="assests/img/2.png"></center></h3></div>
   
   
		<!--<div class="panel-body"> Panel content -->
			<div class="panel panel-default">
  
				<body style="background-color:white;">
					<div class="container"> 
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-xs-8"style="">
								<div class="col-md-2"></div>
					
					
									<!-- starting inside panel -->
								
									<div class="panel panel-primary">
										<div class="panel-heading"><center><h4>Previous Academic Qualification </center></h4></div>
										<div class="panel-body">
										
											<form role="form"  name="myForm" method="post" action="r2.php" id = 'form1'>
												<div class="form-group">
													<table border="0" class="table">
														<tr>
															<td style="width:200px"><label>High school Name(10th)<span style="color:#ff0000"> *</span></label></td>
															<td>
																<input required="required"  type="text" class="form-control" placeholder="Name of School" onkeypress="return onlyChars(event)" name="highschoolname" value ="<?php echo $highschoolname ;?>">
															</td>
														</tr>			
														<tr>
															<td><label>Year of passing<span style="color:#ff0000"> *</span></label></td>
															<td><div class="row">
																	<div class="col-xs-4">
																		
																		<select required="required" class="form-control" name="yearofpassing10" value ="<?php echo $yearofpassing10 ;?>">
																			<script>var i;for(i=2005;i<=2050;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>

																	</div>
																</div>
															</td>
														</tr> 		
														<tr>
															<td>
																<label>Higher Secondary school Name(12th)
																	<span style="color:#ff0000"> *</span>
																</label>
															</td>
															<td>
																<input required="required"  type="text" class="form-control" placeholder="Name of School" onkeypress="return onlyCharsn(event)" name="highersecandryschoolname" value="<?php echo $highersecandryschoolname ;?>">
															</td>
														</tr>  							
														<tr>
															<td><label>Year of passing <span style="color:#ff0000"> *</span></label></td>
															<td><div class="row">
																	<div class="col-xs-4">
																		
																		<select required="required" class="form-control" name="yearofpassing12" value ="<?php echo $yearofpassing12 ;?>">
																			<script>var i;for(i=2005;i<=2050;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>

																	</div>
																
															</td>
														</tr> 
													</table>
												</div>
										
														
													<center><h2>Academic Information</h2></center>
												

													<table border="0" class="table">
														
														<tr>
															<td  style="width:200px"><label>Enrollment Number<span style="color:#ff0000"> *</span></label></td>
															<td>
																<div class="row">
																	<div class="col-xs-2">
																		<input required="required" type="text"	class="form-control" name="enroll_id" value ="<?php echo $enroll_id ?>" maxlength="2">																	
																	</div>

																	<div class="col-xs-1" value="/" >
																		<input required="required"  style="border-right:#ffffff;" type="text" class="form-control" value="/" disabled>
																	</div>

																	<div class="col-xs-3" style="width:16%">
																		<select class="form-control" name="enroll_year">
																			<script>var i;for(i=09;i<=31;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>
																	</div>	

																	<div class="col-xs-1" value="/" >
																		<input required="required"  style="border-right:#ffffff;" type="text" class="form-control" value="/" disabled>
																	</div>

																	<div class="col-xs-2">
																		<input required="required" type="text"	class="form-control" name="enroll_no" value ="<?php echo $enroll_no ?>" maxlength="4">
																	</div>	

																</div>
															</td>
														</tr>
														
														
														
														
														<tr>
															<td><label>Roll Number<span style="color:#ff0000"> *</span></label></td>
															<td>
																<div class="row">
																	<!--<div class="col-md-4"><input required="required"  type="text" class="form-control" placeholder="IT-2K11-10" name="rollno" value ="<?php echo $rollno ;?>"></div>-->
																	<div class="col-xs-3" style="width:16%">
																		<select class="form-control" name="course_id" value ="<?php echo $course_id ;?>">
																			<option>IC</option>
																			<option>IT</option>
																		</select>
																	</div>

																	<div class="col-xs-2" value="-2K">
																		<input required="required"  style="border-right:#ffffff;" type="text" class="form-control" value="-2K" disabled>
																	</div>

																	<div class="col-xs-3" style="width:16%">
																		<select class="form-control" name="year_id" value ="<?php echo $year_id ;?>">
																			<script>var i;for(i=09;i<=31;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>
																	</div>

																	<div class="col-xs-1" value="-" >
																		<input required="required"  style="border-right:#ffffff;" type="text" class="form-control" value="-" disabled>
																	</div>

																	<div class="col-xs-3" style="width:16%">
																		<select class="form-control" name="roll_id" value ="<?php echo $roll_id ;?>">
																			<script>var i;for(i=01;i<=120;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>
																	</div>																	

																</div>
															</td>
														</tr>
											
														
											
														<tr><td><label>Course,Sem and Section<span style="color:#ff0000"> *</span></label></td>
															<td><div class="row">
																	<div class="col-xs-4">
																		<select onchange ="generate(this.value)" class="form-control" name="course" value ="<?php echo $course ;?>">
																		<option >Select Course</option>
																		<option >MTECH</option>
																		<option >MCA</option>
																		
																		</select>
																	</div>	

																	<div id="selectsem" class="col-xs-4"></div>
												
																	<div  id="section" style ='visibility:hidden' class="col-xs-3">
																			<select class="form-control" name="section" value ="<?php echo $section ;?>">
																					<option>A</option>
																					<option>B</option>
																			</select> 
																	</div>  
																		<label style="color:black;">
																		<br>
																</div>
															</td>
														</tr> 
											 
														<tr><td><label>Enrollment year<span style="color:#ff0000"> *</span></label></td>
															<td><div class="row">
																	<div class="col-md-4">
																		 
																		<select required="required" class="form-control" name="enrollmentnumber" value ="<?php echo $enrollmentnumber ;?>">
																			<script>var i;for(i=2005;i<=2050;i++){document.write("<option>"+i+"</option>");}</script>
																		</select>
																	</div>
																</div>
															</td>
														</tr>
											
														<tr><td><label>Alternate Email</label></td>
															<td><input  type="email" class="form-control" id="inputEmail3" placeholder="Email" name="altemail" value ="<?php echo $altemail ;?>">
															</td>
														</tr>
													</table>
											
												</div>
											
												
													
													<center>
														<input class="btn btn-success" onclick="backb()" value="Previous" role="button" type="submit">
														<input class="btn btn-primary" type="submit" value="Submit">
														<input class="btn btn-danger" type="reset" value="Reset">			
													</center>

													<br>
													<br>
											  		
											</form>	
							
									    </div> 
									</div>
							</div>	
						</div>
					</div>
				</body>
				
				                                        
														<script> <!--The below script is for selection of course -->
														
														function backb(){
														document.getElementById('form1').action='registration.php';
														document.getElementById('form1').submit();

														
														
														}
														
														
														function generate(x)
														{
															
															var i;
																					
															msg = '';
															
															msg ='<select class="form-control" name="sem">';
																											
																																											
															count = 0;
															if (x=='MTECH')
																count  = 11;
															else if(x =='MCA')
																count = 12;
															else 
																count = 6 ;
															//document.write('');
															for(i=1;i<=count;i++)
															{
																msg += "<option>"+i+" SEM </option>";
															}
															
														
															
															msg += '</select>' ;
															
														//	$('#selectsem').html(msg);
															document.getElementById('selectsem').innerHTML = msg;
															
															if(x =='MCA')
																$('#section').css('visibility','visible');
															else
																$('#section').css('visibility','hidden');
																													
													}
														</script>  <!--closing of script-->
			</div>											
	</div>
</body>	
<div class="panel-footer"><br>Panel footer<br></div>

</html>
