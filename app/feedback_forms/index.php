<?php
	
?>

<html>
<head>
	
</head>
</html>


<!DOCTYPE html>
<html>
  <head>
    <title>
     Student Feedback Form
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- Bootstrap -->
     <!--link rel="stylesheet" type="text/css" href="bootstrap/Flat-UI-master/css/flat-ui.css"-->
    <link rel="stylesheet" href="../../assests/css/bootstrap/bootstrap.min.css">
</head>
<body>
   <div class="page-header">
          <h1 class="text-center"><u>Student's Feedback Form</u></h1>
   </div>

 <div class="panel-body">
          <h3><strong>Instructions:</strong></h3>
          <p><small>1.)You are requested to give your frank and objective opinion about various aspects of the subject taught to you for improving and maintaining quality of teaching.</br>
          2.) Your response will be kept confidential.</br>
          3.) Specify the BatchId correctly you have provided e.g:IC-2k10</small>
          </p>
  </div>


<div class="jumbotron container-custom">
    <div class="form-group">
         <div class="row">  
              <label class="control-label col-sm-offset-2 col-sm-2" for="company">Name of programmes</label>
            <div class="col-sm-6 col-sm-4">
               <select id="company" class="form-control">
                  <option>M.C.A-6yrs</option>
                  <option>M.Tech-5 1/2yrs</option>
                  <option>M.B.A(MS)-5yrs</option>
                  <option>B.COM(Hons)-4yrs</option>
                  <option>M.B.A(MS)-2yrs</option>
                  <option>M.B.A(TA)-2yrs</option>
                  <option>M.B.A(APR)-2yrs</option>
               </select> 
            </div>
        </div>
     </div>

   <div class="form-group">
        <div class="row">
                   <label class="control-label col-md-offset-2 col-md-2" for="company">Semester</label>
            <div class="col-md-4 col-md-4">
                     <select id="company" class="form-control">
                            <option>Semester1</option>
                            <option>Semester2</option>
                            <option>Semester4</option>
                            <option>Semester5</option>
                            <option>Semester6</option>
                            <option>Semester7</option>
                            <option>Semester8</option>
                            <option>Semester9</option>
                            <option>Semester10</option>
                            <option>Semester11</option>
                            <option>Semester12</option>
                    </select> 
            </div>
        </div>
    </div>

<div class="form-group">
        <div class="row">
                         <label class="control-label col-sm-offset-2 col-md-2" for="company">Id(Provided to you):</label>
            <div class="col-sm-2 col-md-4">
                 <input type="text" class="form-control" id="inputLabel4" placeholder="Id">
            </div>
        </div>
</div>

<div class="form-group">
    <div class="row">
                      <label class="control-label col-sm-offset-2 col-md-2" for="company">BatchId</label>
           <div class="col-sm-2 col-md-4">
               <input type="text" class="form-control" id="inputLabel4" placeholder="BatchId"></br>
               <button type="button" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-danger">Exit</button>     
           </div>
    <div>
</div>

    

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--script src="bootstrap/js/jquery.js"></script-->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>