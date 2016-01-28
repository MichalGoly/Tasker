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

<?php


$id = $_GET['taskId'];
include 'connector.php';




$sql= "SELECT * FROM Task WHERE
taskId = '$id'";
$result = $connection->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	$title = $row['title'];
	$email = $row['TeamMember_email'];
	$sDate = $row['startDate'];
	$eDate = $row['endDate'];
	$status = $row['taskStatus'];
	
}
}else{
	echo "0 results";
}



$connection->close();
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

    <title>TaskerMAN</title>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
	
    <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div> <input type="text"  class="form-control" name="tDescription1[]" id="d_new" placeholder="Enter Another Element"> <a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="img/1minus.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});


</script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
	
	<!-- Font awesome Style sheet -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/datepicker.css">
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
            <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php"><i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

   
    <div class="containerCentre">
    <div class="container">
	
	 <div class="row">
        
          <ul class="nav nav-sidebar" ng-bind="bar">
          </ul>
          <ul class="nav nav-sidebar" ng-init="list=['Home','Users','Tasks','Logout']" ng-model="current">
            <li ng-repeat="x in list"><a href="#{{x}}">{{x}}</a></li>
          </ul>
        </div>
	
        
          <h1 class="page-header"></h1>
		   <div class="jumbotron">
		  	<ol class="breadcrumb">
				<li><a href="edittasks.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a></li>
  				
 
			</ol>
		  
	<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">Update Task</h3>
	
   </div>
   <BR>
   <BR>
	     <form class="form-horizontal"  role="form" action="committaskupdate.php"  name="form1" method="POST">
  
	
	
    <div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
        <input type="type" class="form-control" id="title" name="title" value="<?php echo "$title"; ?>" required>
      </div>
    </div>
	
	 
	
	
	 <div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
      
		<select class="form-control" id="mEmail" name="mEmail""><option name='member'><?php echo "$email"; ?> </option>
		
		<?php
		
			include 'connector.php';
		
			$sql = "SELECT email FROM TeamMember";
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
    
    <!--brings up the task the user selected and prints 
    it on screen.--> 
	<?php
	$sql= "SELECT taskElementId, description FROM TaskElement WHERE
			Task_taskId = '$id'";
	$result = $connection->query($sql);
	$tDescription = array();

	if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				array_push($tDescription,$row["description"]);
	            $eid = $row["taskElementId"];
				
			    $descr = $row["description"];
			  //echo $descr;
			
			
			
				echo "<div class='form-group'>";
			    echo "<label class='control-label col-sm-3' for='email'></label>";
				echo "<div class='col-sm-5'>";
			  
				echo "<input type='text'   class='form-control' name='tDescription[]' id='d_new' value='$descr' required >";
				echo "<input type='hidden'   class='form-control' name='eid[]' id='d_new' value='$eid' >";
				echo "</div>";
				echo "</div>"; 
				
			
			}
	}else{
		echo "0 results";
	}
	
	?>

	
	
	
	<!-- input field for email --> 
 <div class="form-group">
	   <label class="control-label col-sm-3"  for="email"> </label>
      <div class="col-sm-5">
	  
	<div class="input-group input-group-option col-xs-12">
	 <div class="field_wrapper">
		<div>
	
       <input type="text"   class="form-control" name="tDescription1[]" id="d_new" placeholder="Enter Element" > 
		<a href="javascript:void(0);" class="add_button"  title="Add field"><img src="img/1add.png"/></a>
		</div>
		</div>
	
	  		
     
    </div>
	</div>
	</div>
	
	<!-- Start date input field --> 
 <div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="sDate" value="<?php echo "$sDate"; ?>" id="sDate1">
      </div>
    </div>      

	
	
<div class="form-group">
	   <label class="control-label col-sm-3" for="email"></label>
      <div class="col-sm-5">
        <input type="text" class="form-control"  name="eDate" value="<?php echo "$eDate"; ?>" id="eDate1">
      </div>
    </div>


	
	 

	<!-- input field for abandoning a task --> 
<div class="form-group">        
      <div class="col-sm-offset-3 col-sm-5">
        <div class="checkbox">
          <label><input type="checkbox" name="tStatus" value="0"> Abandoned</label>
        </div>
      </div>
    </div>
	
	<p><input type="hidden" name="id"  value="<?php echo "$id"; ?>" /> </p>
	<div class="form-group">
	  
	<div class="col-xs-offset-3 col-xs-10">
            <button type="submit" class="btn btn-primary">UPDATE TASK</button>
        </div>
    </div>
</div>
</div>
	</form>
      <footer>
        <p>&copy; 2015 TaskerMan, Inc.</p>
      </footer>
    </div> <!-- /container -->


  
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>

   <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#sDate1').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
		 <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#eDate1').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
    
  </body>
</html>
