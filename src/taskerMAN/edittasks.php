<?
php
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js">
    </script>
    <title>TaskerMAN</title>
</head>
<body>
    <div>
      
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                	  <!-- top nav bar css -->
                    <button aria-controls="navbar" aria-expanded="false" class=
                    "navbar-toggle collapsed" data-target="#navbar"
                    data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href=
                            "#"><?php echo "Logged in as ". $username;?></a>
                        </li>
                        <li>
                            <a href=
                            "http://users.aber.ac.uk/tig/taskerMAN/logout.php">
                            	<!- font awesome button-->
                            	<i class="fa fa-sign-out"style="font-size:24px;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- to centre jumbotron -->
        <div class="containerCentre">
            <div class="container">
                <div class="row">
                	<!-- to add line under top nav bar -->
                    <ul class="nav nav-sidebar"></ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="#{{x}}">{{x}}</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-header"></h1>
                <div class="jumbotron">
                    <ol class="breadcrumb">
                        <!-- second nav bar -->
                        <li>
                            <a href="index.php"> 
                            <!--font awesome button-->
                            <i class="fa fa-chevron-circle-left" style=
                            "font-size:24px;"></i></a>
                        </li>
                    </ol>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Tasks</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <!-- Connects to DB, selects taskID, start/end date from task table,
              orders by title, then prints this info out into a table. -->
              
                                                    
                                                    <?php
                                                    include 'connector.php';

                                                    
                                                    //$table = teammember;
                                                    $sql = "SELECT taskId, title, startDate, endDate FROM Task ORDER BY title";
                                                    $result = $connection->query($sql);
                                                    if($result->num_rows > 0){
                                                        
                                                        echo "<table class='table table-hover'>";
                                                        
                                                        echo "<thead>";

                                                                echo "<tr>";

                                                                echo "<th>Title</th>";
                                                        
                                                        echo "<th>Start Date</th>";

                                                                echo "<th>End Date</th>";
                                                            
                                                        echo "<th>Update</th>";

                                                                //echo "<th>Delete</th>";

                                                        echo "</tr>";

                                                        echo "</thead>";

                                                   
                                                    //output data of each rows 
                                                
                                                while($row = $result->fetch_assoc()){
                                                    
                                                        echo "<tbody>";
                                                
                                                        echo "<tr>";
                                                 
                                                        echo "<td>".$row["title"]."</td>"  ;
                                                 
                                                        echo  "<td>".$row["startDate"]. "</td>" ;
                                                        
                                                        echo  "<td>".$row["endDate"]. "</td>" ;
                                                 
                                                        echo  "<td>"."<a href='updatetasks.php?taskId=". $row['taskId']."'>"."<img src='img/edittask1.png'>". "</a>" ."</td>" ;
                                                 
                                                        //echo  "<td>"."<a href='connectdb.php?taskId=". $row['taskId']. "'>"."<img src='img/deletetask.png'>"." </a>"."</td>" ;
                                                 
                                                        echo "</tr>";
                                                 
                                                        echo "</tbody>";
                                                }
                                                echo "</table>";
                                                }else {
                                                
                                                        echo " 0 results";
                                                }
                                                
                                                
                                                      
                                            $connection->close();
                                                ?>
                        </div>
                    </div>
                </div>
                <footer>
                    <p>&copy; 2015 TaskerMan, Inc.</p>
                </footer>
            </div><!-- end of container -->
           
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
            </script> 
            
            <script>
            window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
            </script> 
            <script src="../../dist/js/bootstrap.min.js">
            </script>
        </div>
    </div>
</body>
</html>
