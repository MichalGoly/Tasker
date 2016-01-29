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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Task Updated</title>

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
          <a class="navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" ng-model="bar">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
		    <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php"><i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

   
	<div class ="containerCentre">
    <div class="container">
	<h1 class="page-header"></h1>
	
	 <BR><BR><BR>
		  
	<div class="jumbotron">
   
			<ol class="breadcrumb">
				<li><a href="edittasks.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
			</ol>
         
  <?php
  
  include 'connector.php';





//print_r($_POST['eid']);




$required = array('title','sDate','eDate','mEmail');
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} 
 
if (isset($_POST['tStatus'])&& $_POST['tStatus']=='0'){
	$setStatusTo1 = 2;		
}	else{
	$setStatusTo1 = 1;	
}
$table = "teammember";

//$query = "SELECT task.taskId, taskelement.description, taskelement.taskElementId
 //FROM task INNER JOIN taskelement 
	//ON task.taskId = taskelement.Task_taskId";
	
//$result = $connection->query($query);
		

			//while($row = $result->fetch_assoc()){
				//echo $row['taskId']. " - ". $row['description']. $row['taskElementId'];
				
				//echo "<br />";
			//}
		
			

$task = "UPDATE Task SET 
title = '$_POST[title]',
startDate = '$_POST[sDate]',
endDate = '$_POST[eDate]',
taskStatus = '$setStatusTo1',
TeamMember_email = '$_POST[mEmail]'
WHERE taskId = '$_POST[id]'";       


if($connection->query($task)===TRUE){
	
		
		
		
		
		$earray =$_POST['eid'];
		$array =  $_POST['tDescription'];
		$combine = array_combine($earray, $array);
		//print_r($combine);

         foreach($combine as $key => $value){
			  //echo " " . $key . "  " . $value;
			 // echo "<br>";
		
		
			$element = "UPDATE TaskElement SET
								description = '$value'
								WHERE taskElementId = '$key'";
			
		 		if($connection->query($element)===TRUE){
					echo "<div class='alert alert-success'>.";
					echo "<strong><img src='img/AddTaskd.png'> <BR><BR>SUCCESSFULLY UPATED ";
					echo "<BR><BR><BR><a href='edittasks.php'>UPDATE ANOTHER TASK</a>";
					echo "</strong>";
					echo "</div>";
				}
		 }	
		 
		 

}else{
		echo "<div class='alert alert-danger'>.";
		echo " <strong><img src='img/warninguser.png'> <BR><BR>ERROR - $connection->error.";
		echo "<BR><BR><BR><a href='adduser.php'>TRY AGAIN</a>";
		echo "</strong>";
		echo "</div>";
}


$connection->close();
?>

<?php

include 'connector.php';

	$arraynull = $_POST['tDescription1'];
    $newelement= array_filter($arraynull);
			foreach($newelement as $value){
					$element = "INSERT INTO TaskElement (description, Task_taskId)
								VALUES ('$value',(SELECT taskId FROM Task WHERE title = '$_POST[title]'))";
					
			
				if($connection->query($element)===TRUE){
					echo "<div class='alert alert-success'>.";
					echo "<strong><img src='img/AddTaskd.png'> <BR><BR>SUCCESSFULLY ADDED new element ";
					echo "<BR><BR><BR><a href='AddTaskBoot.php'>ADD ANOTHER TASK</a>";
					echo "</strong>";
					echo "</div>";
				}
			}
	
$connection->close();	
?>

</div>
</body>


