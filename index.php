
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
    <link rel="stylesheet" href="assests/css/bootstrap/bootstrap.min.css">
    
</head>
<body>

<div class="panel panel-primary"> <!--Outermost panel-->
    <div class="panel-title">   <!--class=panelheading-->
        <div class="container">    <!--class=container-->
            <div class="row">   <!--class=row-->
               <div><img src="assests/img/2.png"></div>
            </div> <!--closing of class=row-->
        </div>     <!--closing of class=container-->
    </div> <!--closing of class=panelheading--> 
</div>  <!--closing of outermost panel-->

<div class="row alert alert-info">
    <div class="col-sm-1" style="margin-left:-10px;">
     
    </div>
    <div class="col-sm-5" style="margin-left:-10px;">
       <div class="panel panel-primary" >
            <div class="panel-heading">
                <h2 class="panel-title text-center">New User </h2>
            </div>
            <h2 align="center"><a href="feedback_registration.php"> For Registration </a> </h2> 
       </div> 
     </div>  
    <div class="col-sm-1" style="margin-left:-10px;">
     
    </div>
    <div class="col-sm-5" style="margin-left:-10px;">
       <div class="panel panel-primary" >
            <div class="panel-heading">
                <h2 class="panel-title text-center">Existing User</h2>
            </div>
            <!-- Button trigger modal -->
			<a  href="#" class="" data-toggle="modal" data-target="#myModal">
			  <h2 align="center">For Resume</h2>
			</a>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				  </div>
				  <div class="modal-body">
					...
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				  </div>
				</div><!-- ./modal-content -->
			  </div>
			</div><!-- ./modal-dialog -->
        </div> <!-- ./modal -->
    </div>
</div> 




<script src="assests/js/jquery.min.js"></script>
<script src="assests/js/bootstrap.min.js"></script>

</body>
</html>
