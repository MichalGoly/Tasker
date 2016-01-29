<?php
session_start();
//session_save_path("/users/tho4/public_html/CS25010/sessions"); 
error_reporting (E_ALL ^ E_NOTICE);	
$username=$_SESSION['name'];	

if(!isset($username))
{
header("Location: login.php");
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        
        <!-- navbar CSS -->
          <button aria-controls="navbar" aria-expanded="false" class=
          "navbar-toggle collapsed" data-target="#navbar" data-toggle=
          "collapse" type="button"><span class="sr-only">
          	
          Toggle navigation</span> <span class="icon-bar"></span> <span class=
          "icon-bar"></span> <span class="icon-bar"></span></button> <a class=
          "navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
            <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php">
               	<!-- font awesome button -->
               	<i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- centres the jumbotron --> 
    <div class="containerCentre">
    <div class="container">
      <br>
      <br>
      <br>
      
      <!-- CSS div classes --> 
	  <h1 class="page-header"></h1>
      <div class="jumbotron">
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
          </ol>
          
          <!-- Inserts data from add task webpage into DB -->
          <?php
		$eviltitle = $_POST['title'];
		$evilemail = $_POST['mEmail'];
		
		if (strpos($eviltitle, '*') !== false || strpos($evilemail, '*') !== false  ){
			
			session_destroy();
			header('Location: login.php');	
		}
		
		
		
		?>
		<?php
		$sDate = strip_tags($_POST['sDate']); //strips html tags from input
		$eDate = strip_tags($_POST['eDate']);
		$title = strip_tags($_POST['title']);
		$email = strip_tags($_POST['mEmail']);
		
		if (strpos($title, '*') !== false || strpos($email, '*') !== false  ){
			
			session_destroy();
			header('Location: login.php');	
		}else{
					//function to stop users entering an end-date 
					//that is beore the start date
					$intlast1 = substr($sDate,8,2);
					$intlast2 = substr($eDate,8,2);

					$mid1 = substr($sDate,5,2);
					$mid2 = substr($eDate,5,2);

					$first4one = substr($sDate,0,4);
					$first4sec = substr($eDate,0,4);

		if(($first4sec <= $first4one) && ($mid2 <= $mid1) &&($intlast2 < $intlast1)){
			
			
					echo "<div class='alert alert-danger' align='center'>.";
					echo $first4sec."-".$mid2."-".$intlast2;
		    
		    //Error message that should be thrown when the user tries
		    //to enter an end date before the start date
                    echo "<strong> <BR><BR>DATE ERROR - COMPLETION DATE CANNOT BE BEFORE START DATE";
                    echo "<BR><BR><BR><a href='AddTaskBoot.php'><font color = 'red'>TRY AGAIN</color></a>";
                    echo "</strong>";
                    echo "</div>";
		}else{
		include 'connector.php'; //connects to the DB
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
                    $setStatusTo2 = 1; //allocated
                  //echo $setStatusTo1 ;
                }   
                //inserts all the fields into the Task table
                $task = "INSERT INTO Task (title, startDate, endDate, taskStatus,TeamMember_email)
                        VALUES ('$title','$sDate','$eDate','$setStatusTo2','$email'
                        )";

                if($connection->query($task)===TRUE){
                    
                        $array = $_POST['tDescription'];
                            foreach($array as $value){
                                    $element = "INSERT INTO TaskElement (description, Task_taskId)
                                                VALUES ('$value',(SELECT taskId FROM Task WHERE title = '$title'))";
                                    
                            
                                if($connection->query($element)===TRUE){
                                    // confiration message
                                    echo "<div class='alert alert-success'>.";
                                    echo "<strong><img src='img/AddTask.png'> <BR><BR>SUCCESSFULLY ADDED ";
                                    echo "<BR><BR><BR><a href='AddTaskBoot.php'>ADD ANOTHER TASK</a>";
                                    echo "</strong>";
                                    echo "</div>";
                                }
                            }
                }else{
                	//error message
                        echo "<div class='alert alert-danger'>.";
                        echo " <strong><img src='img/warninguser.png'> <BR><BR>ERROR - Incorrect Syntax in Add Task field"; //for actual error message use this--> $connection->error.";
                        echo "<BR><BR><BR><a href='AddTaskBoot.php'>TRY AGAIN</a>";
                        echo "</strong>";
                        echo "</div>";
                }
		    }
		}         
               // $connection->close();                       
                ?>
      </div>
    </div>
  </div>
</body>
</html>
