

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

    <title>PROCESS TASKS</title>

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
          <a class="navbar-brand" href="#">TaskerMAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" ng-model="bar">
		    
            <li><a href="#">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

   

    <div class="container">
	
	 <BR><BR><BR>
		  
 <div class="jumbotron">
   
     <ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
  
  
          </ol>
         
  <?php
  
  include 'connector.php';


  require_once("classes/tc_calendar.php");




$required = array('title','sDate','eDate','mEmail');
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
	$setStatusTo1 = 1; //allocated
  echo $setStatusTo1 ;

			
}	



$task = "INSERT INTO task (title, startDate, endDate, taskStatus,TeamMember_email)
        VALUES ('$_POST[title]','$_POST[sDate]','$_POST[eDate]','$setStatusTo1','$_POST[mEmail]'
		)";


if($connection->query($task)===TRUE){
	
		
		
		$array = $_POST['tDescription'];

			foreach($array as $value){
					$element = "INSERT INTO taskelement (description, Task_taskId)
								VALUES ('$value',(SELECT taskId FROM task WHERE title = '$_POST[title]'))";
					
			
				if($connection->query($element)===TRUE){
					echo "<div class='alert alert-success'>.";
					echo "<strong><img src='img/acceptuser.png'> <BR><BR>SUCCESSFULLY ADDED ";
					echo "<BR><BR><BR><a href='AddTaskBoot.php'>ADD ANOTHER TASK</a>";
					echo "</strong>";
					echo "</div>";
				}
			}
}else{
		echo "<div class='alert alert-danger'>.";
		echo " <strong><img src='img/warninguser.png'> <BR><BR>ERROR - $connection->error.";
		echo "<BR><BR><BR><a href='AddTaskBoot.php'>TRY AGAIN</a>";
		echo "</strong>";
		echo "</div>";
}

	
						
?>
</div>
</body>


