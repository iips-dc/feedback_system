<!-- Including files for DB connection and Session Control -->
<?php
    //require 'includes/login/core.inc.php';
   require 'includes/login/connect.inc.php';
?>
<!-- /End of includes -->
<html>
<head>
    <meta charset="utf-8">
    <title>Feedback | Login</title>
    
    <!-- Configuration for the absoulte path -->
     <?php //include "config_global.php";   ?>
    <!-- Core Css -->
    <?php //include "includes/cssLinks.inc.php";   ?>

   
</head>
<body>

    <label><center><b><h1>IIPS - DAVV</b></h1></center></label>
	<label><center><b><h3>STUDENT'S FEEDBACK FORM</b></h3></center></label>
	
	<label>Instuctions:</label>
	<ol>
		<li></li>
	</ol> 

	<label>Name Of Programme</label>
	<select name="programme" required="required">
		<option>MCA</option>
		<option>M.Tech</option>
		<option>MBA</option>
	</select>

	<br/>

	<label>Semester</label>
	<select name="semester" required="required">
		<option>1</option>
		<option>2</option>
		<option>3</option>
	</select>

	<br/>

	<label>ID (provided to you)</label>
	<input type="text" name="id" required="required">	
   
        
  
   

</body>
</html>
