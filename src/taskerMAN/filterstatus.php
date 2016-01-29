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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        
        <!-- Navbar Css code --> 
          <button aria-controls="navbar" aria-expanded="false" class=
          "navbar-toggle collapsed" data-target="#navbar" data-toggle=
          "collapse" type="button">
          	
          <span class="sr-only">Toggle navigation</span> 
          <span class="icon-bar"></span>
         
          <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class=
          "navbar-brand" href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
        
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
            <li>
                <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php">
                	<!-- font awesome button -->
                	<i class="fa fa-sign-out" style="font-size:24px;"></i></a> 
            </a> 
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
     <!-- centre's jumbotron -->
    <div class = "containerCentre"> 
    <div class="container">
      <div class="row">
       
       <!-- ads line under navbar and spacing --> 
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
            <!-- second nav bar (breadcrumb) --> 
	
	<li><a href="index.php">
		<!-- font awesome button-->
		<i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
            </ol>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">View Tasks</h3>
              </div><br>
              <div align="center">
                <form action="" method="post">
                
                <!-- Script to get filter working --> 
                  Filter Results : <select id="menu1" name="menu1">
                    <option selected value="filterstatus.php">
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
                  
                  </script> <a href="viewtasks.php"><img src=
                  "img/reset3.gif"></a>
                </form>
              </div>
              <div class="table-responsive">
              
              <!-- Selects everything in table, orders it then prints it -
              all done via SQL commands. A more button is placed on the
              end of every row. --> 
                <?php
                        
                        
                        require 'connector.php';
                        
                        //$table = teammember;
                        $sql = "SELECT endDate, title,TeamMember_email,taskStatus FROM Task ORDER BY taskStatus";
                        $result = $connection->query($sql);
                        if($result->num_rows > 0){
                            
                            echo "<table class='table table-hover'>";
                            
                            echo "<thead>";

                                    echo "<tr>";

                                    echo "<th><button type='button' class='btn btn-primary btn-xs btn btn-success'>Task Status</button></th>";
                            
                            
                            echo "<th>Title</th>";

                            
                            echo "<th>Member Assigned</th>";


                            echo "<th>Expected Completion Date</th>";
                            
                            
                                    echo "</tr>";

                            echo "</thead>";

                       
                        //output data of each rows 
                    
                    while($row = $result->fetch_assoc()){
                        
                            echo "<tbody>";
                    
                            echo "<tr>";

                                if ($row["taskStatus"] == 1){
									echo  "<td>". "Allocated". "</td>" ;
								}elseif($row["taskStatus"] == 3){
									echo  "<td>". "Completed". "</td>" ;	
								}else{
									echo  "<td>". "Abandoned". "</td>" ;	
								}
                     
                            
                     
                            
                            
                            echo  "<td>".$row["title"]. "</td>" ;
                            
                            echo  "<td>".$row["TeamMember_email"]. "</td>" ;
                            
                            echo  "<td>".$row["endDate"]. "</td>" ;
                     
              echo  "<td>"."<a href='comments.php?taskId=". $row['taskId']."'>"."<img src='img/more.gif'>". "</a>" ."</td>" ;
                     
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
