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
    <title>Task Updated</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    
    <!-- Font awesome Style sheet -->
    <link href= "http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js">
    </script>
    
    <title>TaskerMAN</title>
</head>
<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
            	<!-- navbar code -->
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" class=
                    "navbar-toggle collapsed" data-target="#navbar"
                    data-toggle="collapse" type="button">
                   
                    <span class="sr-only">Toggle navigation</span> <span class=
                    "icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                 
                            <a href="#"><?php echo "Logged in as ". $username;?></a>
                        </li>
                        <li>
                            <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php"> 
                            <!-- font awesome button--><i class="fa fa-sign-out"style="font-size:24px;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Divs to centre everything -->
        <div class="containerCentre">
            <div class="container">
                <h1 class="page-header"></h1><br>
                <br>
                <br>
                <div class="jumbotron">
                    <ol class="breadcrumb">
                        <li>
                            <a href="edittasks.php">
                            	<!-- Font awesome button --><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a>
                        </li>
                    </ol>
                    <?php
                      include 'connector.php';  //connect to the DB

                    //print_r($_POST['eid']);

                    $required = array('title','sDate','eDate','mEmail');  //fields needed to update task
                    $error = false;
                    foreach($required as $field) {
                      if (empty($_POST[$field])) {
                        $error = true;
                      }
                    }

                    if ($error) {
                      echo "All fields are required.";
                    } 
                     
                    if (isset($_POST['tStatus'])&& $_POST['tStatus']=='0'){ //changes task status to eithe allocated or abandoned
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
                            
                                
			//SQL query to update all fields
                    $task = "UPDATE Task SET 
                    title = '$_POST[title]',
                    startDate = '$_POST[sDate]',
                    endDate = '$_POST[eDate]',
                    taskStatus = '$setStatusTo1',
                    TeamMember_email = '$_POST[mEmail]'
                    WHERE taskId = '$_POST[id]'";       


                    if($connection->query($task)===TRUE){
                        
                            
                            
                            
                            //combines arrays
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
                                
                                //confirmation message
                                    if($connection->query($element)===TRUE){
                                        echo "<div class='alert alert-success'>.";
                                        echo "<strong><img src='img/AddTaskd.png'> <BR><BR>SUCCESSFULLY UPATED ";
                                        echo "<BR><BR><BR><a href='edittasks.php'>UPDATE ANOTHER TASK</a>";
                                        echo "</strong>";
                                        echo "</div>";
                                    }
                             }  
                             
                             

                    }else{
                    	//warning message
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
                                	//inserts new elements into DB 
                                        $element = "INSERT INTO TaskElement (description, Task_taskId)
                                                    VALUES ('$value',(SELECT taskId FROM Task WHERE title = '$_POST[title]'))";
                                        
                                
                                    if($connection->query($element)===TRUE){
                                        echo "<div class='alert alert-success'>."; //confirmation message
                                        echo "<strong><img src='img/AddTaskd.png'> <BR><BR>SUCCESSFULLY ADDED new element ";
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
<<<<<<< HEAD
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
    
		$sDate = strip_tags($_POST['sDate']);
		$eDate = strip_tags($_POST['eDate']);
	
		$intlast1 = substr($sDate,8,2);
		$intlast2 = substr($eDate,8,2);

		$mid1 = substr($sDate,5,2);
		$mid2 = substr($eDate,5,2);

		$first4one = substr($sDate,0,4);
		$first4sec = substr($eDate,0,4);

		if(($first4sec <= $first4one) && ($mid2 <= $mid1) &&($intlast2 < $intlast1)){
			
					echo "<div class='alert alert-danger' align='center'>.";
					echo $first4sec."-".$mid2."-".$intlast2;
                    echo "<strong> <BR><BR>DATE ERROR - COMPLETION DATE CANNOT BE BEFORE START DATE";
                    echo "<BR><BR><BR><a href='edittasks.php'><font color = 'red'>TRY AGAIN</color></a>";
                    echo "</strong>";
                    echo "</div>";
		}else{
	
	
				include 'connector.php';

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

				$title = strip_tags($_POST['title']);			

				$task = "UPDATE Task SET 
				title = '$title',
				startDate = '$_POST[sDate]',
				endDate = '$_POST[eDate]',
				taskStatus = '$setStatusTo1',
				TeamMember_email = '$_POST[mEmail]'
				WHERE taskId = '$_POST[id]'";       

				if($connection->query($task)===TRUE){
					$earray =$_POST['eid'];
					$array =  $_POST['tDescription'];
					$combine = array_combine($earray, $array);
		

				foreach($combine as $key => $value){
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
	}

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
=======
    </div>
>>>>>>> ba7b42dd3d26aeb6b0ff41bbf5b358bc0860f9a4
</body>
</html>
