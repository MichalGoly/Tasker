

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
      <h3 class = "panel-title">Add User</h3>
	
   </div>
   <BR>
   <BR>
	      <form class="form-horizontal" role="form"  action="processUsers.php"  method="POST">
  
    <div class="form-group">
	   <label class="control-label col-sm-3" for="fname"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="fname" name="fname"  placeholder="First Name">
	
      </div>
    </div>
	
	 
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="lname"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="lname" placeholder="Last Name">
	
      </div>
    </div>
	
	
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="email"> </label>
      <div class="col-sm-5">
	  
        <input type="email" class="form-control" name="email" placeholder="Member Email">
		
      </div>
    </div>
	
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="password"> </label>
      <div class="col-sm-5">
	  
        <input type="pwd" class="form-control" name="password" placeholder="Member Password">
	
      </div>
    </div>
	
	
	
	<div class="form-group">
	<label class="control-label col-sm-3" for="password"> </label>
        <div class="col-sm-10 col-sm-offset-3">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>