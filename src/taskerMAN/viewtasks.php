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
    <link href="css/tooltip.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    
    <!-- Font awesome Style sheet -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
    rel="stylesheet">
    <title>TaskerMAN</title>
</head>
<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                	<!-- navbar css --> 
                    <button aria-controls="navbar" aria-expanded="false" class=
                    "navbar-toggle collapsed" data-target="#navbar"
                    data-toggle="collapse" type="button">
                    	
                    <span class="sr-only">Toggle navigation</span> <span class=
                    "icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button> <a class=
                    "navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href=
                            "#"><?php echo "Logged in as ". $username;?></a>
                        </li>
                        <li>
                            <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php">
                            	<!-- font awesome button -->
                            	<i class="fa fa-sign-out"style="font-size:24px;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- centres jumbotron -->
        <div class="containerCentre">
            <div class="container">
                <div class="row">
                	
                	<!-- code for line under navbar --> 
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
                        <li>
                            <a href="index.php">
                            	<!-- font awesome button --> 
                            	<i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a>
                        </li>
                    </ol>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">View Tasks</h3>
                        </div><br>
                        
                        <!-- code for filter -->
                        <div align="center">
                            <form action="" method="post">
                                Filter Results : <select id="menu1" name=
                                "menu1">
                                    <option selected value="status">
                                        SELECT
                                    </option>
                                    
                                    <option value="filterstatus.php">
                                        STATUS
                                    </option>
                                    
                                    <option value="filtermember.php">
                                        MEMBER
                                    </option>
                                    </select> 
                                    
                                <script type="text/javascript">
                                var urlmenu = document.getElementById( 'menu1' );
                                urlmenu.onchange = function() {
                                window.open( this.options[ this.selectedIndex ].value,"_self" );
                                };
                                </script> <a href="viewtasks.php"><img src="img/reset3.gif"></a>
                            </form>
                        </div>
                        
                        <div class="table-responsive">
                            <!-- Selects and prints out task data such as title, member assigned to it, ID etc. Puts this into a 
                            table and prints it out. -->
                            <?php
                                    
                                    
                                    require 'connector.php';
                                    
                                    //$table = teammember;
                                    $sql = "SELECT endDate, title,TeamMember_email,taskStatus,taskId FROM Task ORDER BY endDate";
                                    $result = $connection->query($sql);
                                    if($result->num_rows > 0){
                                        
                                        echo "<table class='table table-hover'>";
                                        
                                        echo "<thead>";

                                                echo "<tr>";

                                                echo "<th><button type='button' class='btn btn-primary btn-xs btn btn-success'>Expected Completion Date</button></th>";
                                             //echo "<th>Expected Completion Date</th>";
                                        
                                        echo "<th>Title</th>";

                                                echo "<th>Member Assigned</th>";
                                            
                                        echo "<th>Task Status</th>";

                                                echo "</tr>";

                                        echo "</thead>";

                                    //output data of each rows 
                                           
                                while($row = $result->fetch_assoc()){
                                    
                                echo "<tbody>"; 
                                        
                                        echo "<tr>"; 
                                 
                                            echo  "<td>".$row["title"]. "</td>" ;
                                        
                                            echo  "<td>".$row["TeamMember_email"]. "</td>" ;
                                        
                                            if ($row["taskStatus"] == 1){
                                                echo  "<td>". "Allocated". "</td>" ;
                                            }elseif($row["taskStatus"] == 3){
                                                echo  "<td>". "Completed". "</td>" ;    
                                            }else{
                                                echo  "<td>". "Abandoned". "</td>" ;    
                                            }
                                            echo  "<td>"."<a href='comments.php?taskId=". $row['taskId']."'>"."<img src='img/more.gif'>". "</a>" ."</td>" ;
                                                
                                        echo "</tr>";
                                        
                                echo "</tbody>";
                                
                                }
                                echo "</table>";
                                }else {
                                
                                        echo " 0 results";
                                }
                                
                                
                                      
                            $connection->close();
                                ?> <span></span>
                        </div>
                    </div>
                </div>
                <footer>
                    <span></span>
                    <p><span>&copy; 2015 TaskerMan, Inc.</span></p>
                </footer>
            </div><!--  end div container -->
            <!-- Placed at the end of the document so the pages load faster -->
            <span>
            <script src=
            "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
            </script> 
            <script>
            window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
            </script></span> 
        </div>
    </div>
</body>
</html>
