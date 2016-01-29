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
  <title>TaskerMAN</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">
  
  <!-- Font awesome Style sheet -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  
  <script src="../../assets/js/ie-emulation-modes-warning.js">
  </script>
  
  <title>TaskerMAN</title>
</head>
<body>
  <div>
  <!-- Navbar CSS --> 
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
    <div class="containerCentre"> <!-- Centres Jumbotron --> 
    <div class="container">
      <br>
      <br>
      <br>
      <div class="jumbotron">
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
          
          <!-- Inserts info from submitted user form into DB, if
          data entered correctly will give the user a message,
          if problem occurs putting data ins DB warning message
          will be thrown up. --> 
        </ol><?php




        include 'connector.php';
         
		 //prepare encrypting member password 
		 $password = $_POST['password'];
		 $hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO TeamMember (firstName, lastName, email, password)
                VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]',
                '$hash')";

        if($connection->query($sql)===TRUE){
                
                echo "<div class='alert alert-success'>.";
                echo "<strong><img src='img/acceptuser.png'> <BR><BR>SUCCESSFULLY ADDED ".$_POST['fname'];
                echo "<BR><BR><BR><a href='adduser.php'>ADD ANOTHER MEMBER</a>";
                echo "</strong>";
                echo "</div>";
                
        }else{
                echo "<div class='alert alert-danger'>.";
                echo " <strong><img src='img/warninguser.png'> <BR><BR>ERROR - $connection->error.";
                echo "<BR><BR><BR><a href='adduser.php'>TRY AGAIN</a>";
                echo "</strong>";
                echo "</div>";
        }
        $connection->close();
        ?>
      </div>
    </div>
  </div>
</body>
</html>
