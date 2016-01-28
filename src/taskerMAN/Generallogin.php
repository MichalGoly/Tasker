<?php


   if ($_SERVER["REQUEST_METHOD"] == "POST"){
         $username = $_POST["username"];
		 session_start(); 
		 
		if ($username){
			 
			 $_SESSION['name']= $username;
			header('Location: index.php');
			}
		else{
			$error="Your Login Name or Password is invalid";
			echo $error;
		}
   }		
		
		
		
    ?>

	
//<?php

   //session_start();
   
  // if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
     // $myusername = mysqli_real_escape_string($db,$_POST['username']);
     // $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
     // $sql = "SELECT adminId FROM Admin WHERE username = '$myusername' and passcode = '$mypassword'";
     // $result = mysqli_query($db,$sql);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      //$count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      //if($count == 1) {
        // session_register("name");
        // $_SESSION['name'] = $myusername;
         
        // header("location: index.php");
     // }else {
       //  $error = "Your Login Name or Password is invalid";
     // }
  // }
//?>

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

    <title>TaskerMAN Authentication</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

   
   

   
	<div class="containerCentre"> 
    <div class="container">
	
	 <div class="row">
        
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
           
          </ul>
        </div>
	
        
       
		  <BR>
		  <BR>
		  <BR>
		  <BR>	
		<label class="control-label col-sm-9" for="fname"></label>
      <div class="col-sm-9">  
	<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WARNING - AUTHORISED ACCESS ONLY</h3>
	
   </div>
   <BR>
   <BR>
	      <form class="form-horizontal" role="form"  action=""  method="POST">
  
   
   
   
   <div class="form-group">
	   <label class="control-label col-sm-4" for="fname"></label>
      <div class="col-sm-8">
	  <img src="img/login.png">
        
	
      </div>
    </div>
	
	
	
    <div class="form-group">
	   <label class="control-label col-sm-3" for="fname"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="fname" name="username"  placeholder="Username" required>
	
      </div>
    </div>
	
	 
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="lname"></label>
      <div class="col-sm-5">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
	
      </div>
    </div>
	
	
	 <div class="form-group">
	   <label class="control-label col-sm-4" for="fname"></label>
      <div class="col-sm-8">
	  
        <input id="submit" name="submit" type="submit" value="Authenticate" class="btn btn-primary">
	
      </div>
    </div>
	
	
	
	
	
	
	
</div>

	</form>

      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
