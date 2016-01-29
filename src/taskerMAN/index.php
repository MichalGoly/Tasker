<?php
session_start();
//session_save_path("/users/tho4/public_html/CS25010/sessions"); 
error_reporting (E_ALL ^ E_NOTICE);	
$username=$_SESSION['name'];	

if(!isset($username))
{
header("Location: login.php");
}
	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
	<meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>TaskerMAN</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Centre Page CSS -->
    <link href="css/centre.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Font awesome Stylesheet -->
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  
  </head>

  <body>

   <div ng-app="">
      <title>TaskerMAN</title ng-bind="title"> 
      
      <!-- navbar CSS --> 
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
	   <a class="navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
             </div>
		
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" ng-model="bar">
<li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
			<li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php">
               	<!-- font awesome button --> 
               	<i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>


          </ul>
          
        </div>
      </div>
    </nav>

    <!-- centre the jumbotron-->
    <div class = "containerCentre">
    <div class="container">
		<div class="row">
       
       <!-- line under navbar CSS --> 
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
            <li ng-repeat="x in list"><a href="#{{x}}">{{x}}</a></li>
          </ul> 
        </div> 
        
          <h1 class="page-header"></h1>

		<div class="jumbotron" class="container-fluid">
			<ol class="breadcrumb">
				<li class="active"></li>
			          </ol>
      
	      <!-- Code to display icons/links to other pages -->
	 <div class="row" align="right" style="margin-left: -40px;">
        <div class="col-md-4">
        	<!-- Add Task link -->
          <a href="AddTaskBoot.php"></a>
          <p><a class="btn btn-default" href="AddTaskBoot.php" role="button"><img src="img/AddTask.png"><BR>Add Tasks &raquo;</a></p>
        </div>
	 
		<div class="col-md-4">
			<!-- Edit Task Link -->
          <p><a class="btn btn-default" href="edittasks.php" role="button"><img src="img/EditTask.png" ><BR>Edit Tasks &raquo;</a></p>
        </div>
	   
        <div class="col-md-4">
        	<!-- View Tasks Link -->
          <a href="#"></a>
          <p><a class="btn btn-default" href="viewtasks.php" role="button"><img src="img/ViewTask.png"><BR>View Tasks &raquo;</a></p>
        </div>
	      </div>

      <hr>
	 <div class="row" align="right" style="margin-left: -40px;">
        <div class="col-md-4">
        	<!--Add User Link -->
           <a href="AddUser.php"></a>
          <p><a class="btn btn-default" href="adduser.php" role="button"><img src="img/AddUser.png"><BR>Add Users &raquo;</a></p>
        </div>
        <div class="col-md-4">
          
            <a href="#"></a>
            <!-- Edit User Link -->
          <p><a class="btn btn-default" href="editusers.php" role="button"><img src="img/EditUser.png"><BR>Edit Users &raquo;</a></p>
       </div>
          
          <div class="col-md-4">
          <!-- View Users Link -->
            <a href="#"></a>
          <p><a class="btn btn-default" href="viewusers.php" role="button"><img src="img/group.png"><BR>View Users &raquo;</a></p>
        </div>
      </div>
	  
</div>
      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>
    </div> 

    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    
  </body>
</html>
