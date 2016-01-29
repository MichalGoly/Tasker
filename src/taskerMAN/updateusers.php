<?php
session_start();
//session_save_path("/users/tho4/public_html/CS25010/sessions"); 
error_reporting (E_ALL ^ E_NOTICE);	
$username=$_SESSION['name'];	

if(!isset($username))
{
header("Location: login.php");
}else{
	
echo "Welcome to the TaskerMAN " . $username;	
}
	

?>

<!-- Selects user data and displays it for the user that was 
clicked on.  -->
<?php
$id = $_GET['email'];
include 'connector.php';

$sql= "SELECT * FROM TeamMember WHERE
email = '$_GET[email]'";
$result = $connection->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	$fname = $row['firstName'];
	$lname = $row['lastName'];
	//$email = $row['email'];
	//$pass = $row['password'];
	
	
}
}else{
	echo "0 results";
}

$connection->close();
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

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
	
	<!-- Font awesome Style sheet -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    
  </head>

  <body>

   <div ng-app="">
      <title>TaskerMAN</title ng-bind="title"> 
      
      
      <!-- Top nav bar CSS --> 
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" ng-model="bar">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
		    <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php">
               	<!-- font awesome button-->
               	<i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

   <!-- centres jumbotron --> 
    <div class ="containerCentre">     
    <div class="container">
	
	 <div class="row">
        
        <!-- adds a line under the navbar and spaces it --> 
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
            <li ng-repeat="x in list"><a href="#{{x}}">{{x}}</a></li>
          </ul>
        </div>
	
      
          <h1 class="page-header"></h1>
		   <div class="jumbotron">
		  	<ol class="breadcrumb">
				<li><a href="editusers.php">
				<!-- font awesome button-->
				<i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
			</ol>
		  
	<div class = "panel panel-primary">
   <div class = "panel-heading">
   <!-- title for table -->
      <h3 class = "panel-title">Edit User</h3>
	
   </div>
   <BR>
   <BR>
	      <form class="form-horizontal" role="form"  action="commituserupdate.php"  method="POST">
  
	      <!-- First name input field --> 
	       <div class="form-group">
	   <label class="control-label col-sm-3" for="fname"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value ="<?php echo "$fname"; ?>" required >
	
      </div>
    </div>
	
	 <!-- Last name input field --> 
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="lname"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="lname"  placeholder="Last name" value ="<?php echo "$lname"; ?>" required>
	
      </div>
    </div>
	
	<!-- Password input field --> 
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="password"> </label>
      <div class="col-sm-5">
	  
        <input type="password" class="form-control" name="password" placeholder="Password">
	
      </div>
    </div>
	<!-- hidden id field -->
	<p><input type="hidden" name="id"  value="<?php echo "$id"; ?>" /> </p>
	
	<!-- submit button --> 
	<div class="form-group">
	<label class="control-label col-sm-3" for="password"> </label>
        <div class="col-sm-10 col-sm-offset-3">
            <input id="submit" name="submit" type="submit" value="Update User" class="btn btn-primary">
        </div>
         </div>
          </div>
           </div>
  	</form>

      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>
    </div> <!-- /container -->


   
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    
</html>
