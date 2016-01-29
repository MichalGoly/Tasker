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


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="../../favicon.ico" rel="icon">
  <title>TaskerMAN</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel=
  "stylesheet"><!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">
  
  <!-- Font awesome Style sheet -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <script src="../../assets/js/ie-emulation-modes-warning.js">
  </script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <title>TaskerMAN</title>
</head>
<body>
  <div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" class=
          "navbar-toggle collapsed" data-target="#navbar" data-toggle=
          "collapse" type="button"><span class="sr-only">Toggle
          navigation</span> <span class="icon-bar"></span> <span class=
          "icon-bar"></span> <span class="icon-bar"></span></button> <a class=
          "navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
            <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php"><i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<div class = "containerCentre">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar"></ul>
          <ul class="nav nav-sidebar">
            <li>
              <a href="#{{x}}">{{x}}</a>
            </li>
          </ul>
        </div>
        <!-- <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> -->
          <h1 class="page-header"></h1>
          <div class="jumbotron">
            <ol class="breadcrumb">
                <li><a href="editusers.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
            </ol><br>
		


            <br>
            <?php

            include 'connector.php';
            
			//prepare encrypting member password 
		   $password = $_POST['password'];
		   if(!empty($password)){
			   
		    
				$hash = password_hash($password, PASSWORD_BCRYPT);

				$sql = "UPDATE TeamMember SET
				firstName = '$_POST[fname]',
				lastName = '$_POST[lname]',
				password = '$hash'
				WHERE email = '$_POST[id]'";

				if ($connection->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>.";
                    echo "<strong><img src='img/edittask1.png'> <BR><BR>Successfully Updated details for ".$_POST['fname'];
                    echo "<BR><BR><BR><a href='editusers.php'>UPDATE ANOTHER MEMBER</a>";
                    echo "</strong>";
                    echo "</div>";
				} else {
					echo "Error updating record: " . $connection->error;
				}
		   }else{
			   
			    $sql = "UPDATE TeamMember SET
				firstName = '$_POST[fname]',
				lastName = '$_POST[lname]'
				
				WHERE email = '$_POST[id]'";

				if ($connection->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>.";
                    echo "<strong><img src='img/edittask1.png'> <BR><BR>Successfully Updated details for ".$_POST['fname'];
                    echo "<BR><BR><BR><a href='editusers.php'>UPDATE ANOTHER MEMBER</a>";
                    echo "</strong>";
                    echo "</div>";
				} else {
					echo "Error updating record: " . $connection->error;
				}
		   }
				$connection->close();
            ?>
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
		<footer>
              <p>&copy; 2015 TaskerMan, Inc.</p>
            </footer>
      </div>
	  </div>
    </div>
  </div>
</body>
</html>
