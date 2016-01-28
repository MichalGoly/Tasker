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
            <li>
              <a href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <br>
      <br>
      <br>
      <div class="jumbotron">
        <ol class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
          </li>
        </ol><?php
          
          include 'connector.php';


         

 //$test = $_POST['tDescription1'];

      //  print_r($test);
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
        } elseif(isset($_POST['tStatus'])&& $_POST['tStatus']=='0'){
            $setStatusTo1 = 2;      
        }   else{
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
                            echo "<strong><img src='img/AddTask.png'> <BR><BR>SUCCESSFULLY UPDATED ";
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

       
	   $finalarray = $_POST['tDescription2'];
	   $new = array_filter($finalarray);
	  // echo count($new);

      if(count($new)== 0)	{
	
			echo "empy";
	
	
	
		}  else{
	
			echo count($new);
		} 
                                
        ?>

<?php

include 'connector.php';

	$arrayone = $_POST['tDescription1'];
 print_r($arrayone);
			foreach($arrayone as $value){
					$element = "INSERT INTO TaskElement (description, Task_taskId)
								VALUES ('$value',(SELECT taskId FROM Task WHERE title = '$_POST[title]'))";
					
			
				if($connection->query($element)===TRUE){
					echo "<div class='alert alert-success'>.";
					echo "<strong><img src='img/acceptuser.png'> <BR><BR>SUCCESSFULLY ADDED new elements ";
					echo "<BR><BR><BR><a href='AddTaskBoot.php'>ADD ANOTHER TASK</a>";
					echo "</strong>";
					echo "</div>";
				}
			}
	
$connection->close();	
?>



      </div>
    </div>
  </div>
</body>
</html>
