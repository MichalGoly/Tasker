	<!-- A file to handle log in of users --> 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

// fill these with actual credentials
define('DB_SERVER', 'db.mysql.co.uk:3306');
define('DB_USERNAME', 'username');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'database_name');

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
        
		$error = "Incorrect login details, please try again.";
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

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
     <div class="container">
	 <div class="row">
	 	<!-- formats the line under the nav bar -->
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
      <h3 class = "panel-title" align="center">TaskerMAN Login</h3>
	
   </div>
   <BR>
   <BR>
	      <form class="form-horizontal" role="form"  action=""  method="POST">
  
   
   
   
   <div class="form-group">
      <div class="col-sm-8">
	  <img src="img/login.png">
        
	
      </div>
    </div>

    			<div class="form-group">
     				 <div class="col-sm-5">
     				 	<!-- input field for username --> 
        				<input type="text" class="form-control"  name="username"  placeholder="Username" required>
	
     				 </div>
    			</div>
	
	 
			<div class="form-group">
      				<div class="col-sm-5">
      					<!-- input field for password -->
        				<input type="password" class="form-control" name="password" placeholder="Password" required>
	
      				</div>
    			</div>
	
	
	 		<div class="form-group">
	 			<!-- submit button --> 
      				<div class="col-sm-4">
	          			<input  type="submit" value="Authenticate" class="btn btn-primary">
					</div>
    			</div>
	
	 </form>
</div>

	

      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>



   
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body> 
</html>
