
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

    <title>EDIT TASKS</title>

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
	
	 <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
            <li ng-repeat="x in list"><a href="#{{x}}">{{x}}</a></li>
          </ul>
        </div>
	
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"></h1>
		  <div class="jumbotron">
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
  
  
          </ol>
		  
	<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">EDIT TASKS</h3>
	
   </div>
   <div class="table-responsive">

   

        
		<?php
		
		
		require 'connector.php';
		
		//$table = teammember;
	    $sql = "SELECT taskId, title, startDate, endDate FROM task ORDER BY title";
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

      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
