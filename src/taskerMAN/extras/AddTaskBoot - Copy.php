
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

    <title>Jumbotron Template for Bootstrap</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<script src="form.js"></script>
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
      <h3 class = "panel-title">Add Task</h3>
	
   </div>
	 <BR>
   <BR>
   
	      <form class="form-horizontal" role="form" action="processTasks.php"  method="POST">
  
	
	
    <div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
        <input type="type" class="form-control" id="title" name="title" placeholder="Task Title">
      </div>
    </div>
	
	 
	
	
	
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="email"> </label>
      <div class="col-sm-5">
	  <div class="input-group input-group-option col-xs-12">
	  
	 <div class="input_fields_wrap">  
       <input type="text" class="form-control" name="tDescription[+x+]" id="d_new" placeholder="Enter Element"> 
		
		 <button class="add_field_button">Add More Elements</button>  
			
	  		
      </div>
    </div>
	</div>
	</div>
	
	
        
  
  
	
	
	
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
      
		<select class="form-control" id="mEmail" name="mEmail"">
		<?php
		
			include 'connector.php';
		
			$sql = "SELECT email FROM teammember";
			$result = $connection->query($sql);
			if($result->num_rows > 0){

			while($row = $result->fetch_assoc()){
        
               echo "<option name='member'>" . $row['email'] . "</option>";
                            
							  }

			}else{
			echo "0 results";   
			}	

	  ?>
    
  </select>
      </div>
    </div>
	
	


	
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="sDate" name="sDate" placeholder="Start Date">
      </div>
    </div>
	
 
<div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="eDate" name="eDate" placeholder="End Date">
      </div>
    </div>

	
<div class="form-group">        
      <div class="col-sm-offset-3 col-sm-5">
        <div class="checkbox">
          <label><input type="checkbox" name="tStatus"> Abandoned</label>
        </div>
      </div>
    </div>
	
	
	<div class="form-group">
	  
	<div class="col-xs-offset-3 col-xs-10">
            <button type="submit" class="btn btn-primary">ADD TASK</button>
        </div>
    </div>
</div>
	</form>

      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
	
	
  </body>
</html>
