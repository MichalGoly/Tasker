<?php
session_start();
//session_save_path("/users/tho4/public_html/CS25010/sessions"); 
error_reporting (E_ALL ^ E_NOTICE);	
$username=$_SESSION['name'];	
$deleteuser = $_SESSION['deleteme'];
if(!isset($username))
{
header("Location: login.php");
}else{
	
echo "Your session is running " . $username;	
	
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

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
	
	<!-- Font awesome Style sheet -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  
  </head>

  <body>

   <div ng-app="">
      <title>TaskerMAN</title ng-bind="title">
	  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
		
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"  href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" ng-model="bar">
		    <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php"><i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<div class "containerCentre" >    <!-- centres jumbotron --> 
    <div class="container">
	
	 <div class="row">
       
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
            <li ng-repeat="x in list"><a href="#{{x}}">{{x}}</a></li>
          </ul>
        </div>
	
       
          <h1 class="page-header"></h1>
		  <div class="jumbotron">
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
          </ol>
		  
	
   <div class="table-responsive">  

<div class="form-group">
	   			<label class="control-label col-sm-3" for="password"></label>
      				<div class="col-sm-5">
            <br>
            <?php

            include 'connector.php';
            $table = "TeamMember";

            $sql = "DELETE FROM $table WHERE email='$deleteuser'";

             

            if ($connection->query($sql) === TRUE) {
                   
					echo "<div class='alert alert-success' align='center'>.";
                    echo "<strong><img src='img/deleteuser.png'> <BR><BR>Successfully Deleted Record";
                    echo "<BR><BR><BR><a href='editusers.php'><font color = 'green'>DELETE ANOTHER MEMBER</color></a>";
                    echo "</strong>";
                    echo "</div>";
					
            } else {
                echo "Error updating record: " . $connection->error;
            }

            $connection->close();
            ?>
		</div>
      </div>
</div>
</div>
            <footer>
              <p>&copy; 2015 TaskerMan, Inc.</p>
            </footer>
          </div><!-- /container -->
          <!-- Bootstrap core JavaScript
    ================================================== -->
          <!-- Placed at the end of the document so the pages load faster -->
          <script src=
          "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
          </script> 
          <script>
          window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
          </script> 
          <script src="../../dist/js/bootstrap.min.js">
          </script> 
          <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
           
          <script src="../../assets/js/ie10-viewport-bug-workaround.js">
          </script> 
        </div>
      </div>
    </div>
  </div>
</body>
</html>