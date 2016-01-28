	
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){




 define('DB_SERVER', 'db.dcs.aber.ac.uk:3306');
define('DB_USERNAME', 'csgpadm_12');
define('DB_PASSWORD', 'RCORoND6');
define('DB_DATABASE', 'csgp_12_15_16');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);




   
  
if(empty($_POST["username"]) || empty($_POST["password"])){

		$error = "Both fields are required.";
}else
	
{

// variables to capture form Details
$username=$_POST['username'];
$password=$_POST['password'];


       //MySQL injection defense
      $username =  stripslashes($username);
      $password =  stripslashes($password);

      $username = mysqli_real_escape_string($db,$username);
      $password = mysqli_real_escape_string($db,$password); 

	 

      $sql = "SELECT * FROM Admin WHERE username = '$username'";
      

      $result = mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 
      
      $count = mysqli_num_rows($result);
	  
	  $hash = $row['password'];
      
      //If result matched $username and $password, table row must be 1 row
		 if($count == 1 && password_verify($password,$hash)) {
		  

			  
		    session_start();
			$_SESSION['name'] = $username;
            header("location: index.php");
		 
      }else {
        
		$error = "hahahaaaa you aint got no password";
      }
     
   }
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

   
   

   
	
     <div class="container">
	
	 <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
           
          </ul>
        </div>
	
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       
		  <BR>
		  <BR>
		  <BR>
		  <BR>	
		<label class="control-label col-sm-9" for="fname"></label>
      <div class="col-sm-9">  
	<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title" align="center">WARNING - AUTHORISED ACCESS ONLY</h3>
	
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
	   			<label class="control-label col-sm-3" for="username"></label>
     				 <div class="col-sm-5">
        				<input type="text" class="form-control"  name="username"  placeholder="Username" required>
	
     				 </div>
    			</div>
	
	 
			<div class="form-group">
	   			<label class="control-label col-sm-3" for="password"></label>
      				<div class="col-sm-5">
        				<input type="password" class="form-control" name="password" placeholder="Password" required>
	
      				</div>
    			</div>
	
	
	 		<div class="form-group">
	   			<label class="control-label col-sm-4" for="submit"></label>
      				<div class="col-sm-4">
	          			&nbsp;&nbsp;<input  type="submit" value="Authenticate" class="btn btn-primary">
	
     				 </div>
    			</div>
	
	 </form>
</div>

	

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
