<?php
session_start();
//session_save_path("/users/tho4/public_html/CS25010/sessions"); 
error_reporting (E_ALL ^ E_NOTICE);	
$username=$_SESSION['name'];	

if(!isset($username))
{
header("Location: login.php");
}else{
	
echo "Your session is running " . $username;	

//initializes session, reports all errors, echos a message of the person is logged in.	
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
  
  <!-- Font awesome Style sheet -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  
  <title>TaskerMAN</title>
 
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">


  <script src="../../assets/js/ie-emulation-modes-warning.js">
  </script>
  
  
  <title>TaskerMAN</title>
</head>
<body>
  <div>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class = "containerCentre" >
      <div class="container">
        <div class="navbar-header">
        	
        	<!-- css for top nav bar and buttons --> 
          <button aria-controls="navbar" aria-expanded="false" class=
          "navbar-toggle collapsed" data-target="#navbar" data-toggle=
          "collapse" type="button"><span class="sr-only">Toggle
          navigation</span> <span class="icon-bar"></span> <span class=
          "icon-bar"></span> <span class="icon-bar"></span></button> <a class=
          "navbar-brand" href=
          "http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
            <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php"> <!-- font awesome button--><i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
      
	  <!-- code for line under navbar --> 
          <ul class="nav nav-sidebar"></ul>
          <ul class="nav nav-sidebar">
          	<!-- puts a space before the line --> 
            <li>
              <a href="#{{x}}">{{x}}</a>
            </li>
          </ul>
        </div>
      
          <h1 class="page-header"></h1>
          <div class="jumbotron">
            <ol class="breadcrumb">
			
			<!-- Second nav bar -->
              <li><a href="index.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
            </ol>
			
			<!-- Table heading --> 
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Add User</h3>
              </div><br>
              <br>
			  
			  <!-- file that processes the PHP --> 
		 <form action="processUsers.php" class="form-horizontal" method=
              "post" role="form">
                <div class="form-group">
				
				<!-- First name input field --> 
                  <label class="control-label col-sm-3" for="fname"></label>
                  <div class="col-sm-5">
                    <input class="form-control" id="fname" name="fname"
                    placeholder="First Name" required="" type="text">
                  </div>
                </div>
				
                <div class="form-group">
				
				<!-- Last name input field --> 
                  <label class="control-label col-sm-3" for="lname"></label>
                  <div class="col-sm-5">
                    <input class="form-control" name="lname" placeholder=
                    "Last Name" required="" type="text">
                  </div>
                </div>
                <div class="form-group">
				
				<!-- Email input field --> 
                  <label class="control-label col-sm-3" for="email"></label>
                  <div class="col-sm-5">
                    <input class="form-control" name="email" placeholder=
                    "Member Email" required="" type="email">
                  </div>
                </div>
                <div class="form-group">
				
				<!-- Password input field --> 
                  <label class="control-label col-sm-3" for="password"></label>
                  <div class="col-sm-5">
                    <input type=password input class="form-control" name="password" placeholder=
                    "Member Password" required="" type="pwd">
                  </div>
                </div>
				
                <div class="form-group">
		
				<!-- submit button --> 		
                  <label class="control-label col-sm-3" for="password"></label>
                  <div class="col-sm-10 col-sm-offset-3">
		    <input class="btn btn-primary"  id="submit" name="submit"
                    type="submit" value="Add User">
                  </div>
                </div>
              </form>
            </div>
			</div>
			
            <footer>
              <p>&copy; 2015 TaskerMan, Inc.</p>
            </footer>
          </div><!--  closes the container -->
      
          <!-- Placed at the end of the document so the pages load faster -->
          <script src=
          "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
          </script> 
          <script>
          window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
          </script> 
          <script src="../../dist/js/bootstrap.min.js">
          </script> 

          
        </div>
      </div>
    </div>
  </div>
</body>
</html>
