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
   <script src=
  "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
  </script>
  <script src=
  "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
  </script>

<!-- Function for add/remove buttons. If add button clicked new input field is added with a limit of 10 input fields. 
Else , if the remove button selected one input field is removed-->
  <script type="text/javascript">
       $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper'); //Input field wrapper
	   
       var fieldHTML = ' <div><input type="text"  class="form-control" name="tDescription[]" id="d_new" placeholder="Enter Another Element"> <a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="img/1minus.png"/><\/a><\/div>'; //New input field html 
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
  
 


  </script>
  <script src="form.js">
  </script>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="css/datepicker.css">

  <script src="../../assets/js/ie-emulation-modes-warning.js">
  </script>
  
  <title>TaskerMAN</title>
  
  <!-- Font awesome Style sheet -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

				
</head>

<body>
  <div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
		
		<!-- Code for top navbar --> 
          <button aria-controls="navbar" aria-expanded="false" class=
          "navbar-toggle collapsed" data-target="#navbar" data-toggle=
          "collapse" type="button"><span class="sr-only">Toggle
          navigation</span> <span class="icon-bar"></span> <span class=
          "icon-bar"></span> <span class="icon-bar"></span></button> <a class=
          "navbar-brand" href=
          "http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
        </div>
		
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="#" ><?php echo "Logged in as ". $username;?></a></li>
            <li>
               <a href="http://users.aber.ac.uk/tig/taskerMAN/logout.php">  <!-- Font awesome button--> <i class="fa fa-sign-out" style="font-size:24px;"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	  <!-- class to centre jumbotron --> 
	  <div class="containerCentre">
    <div class="container">
      <div class="row">
       
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
			  <!-- navigation bar --> 
                <a href="index.php"><i class="fa fa-chevron-circle-left" style="font-size:24px;"></i></a>
              </li>
            </ol>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Add Task</h3>
				
              </div><br>
              <br>
		
		<!-- Divs to centre form --> 	  
              <form action="processTasks.php" class="form-horizontal" id=
              "form1" method="post" name="form1" role="form">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email"></label>
                  <div class="col-sm-5">
				  
				  <!-- field for task name input --> 
                    <input class="form-control"  id="title" name="title"
                    placeholder="Task Title" required="" type="text">
                  </div>
				  
				  <!-- field input for email --> 
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email"></label>
                  <div class="col-sm-5">
                    <select class="form-control" id="mEmail" name="mEmail">
					
					<!-- Connects to db and then provides a list of names in a drop down box for the user to select --> 
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
                <div class="form-group">
                	<!-- Divs for centreing input fields in the form --> 
                  <label class="control-label col-sm-3" for="email"></label>
                  <div class="col-sm-5">
                    <div class="input-group input-group-option col-xs-12">
                      <div class="field_wrapper">
                        <div>
						<!-- input field for entering an element/comment of a task --> 
                          <input class="form-control" id="d_new" name=
                          "tDescription[]" placeholder="Task Element"
                          required="" type="text"> <a class="add_button" href=
                          "javascript:void(0);" title="Add field">
							
								<img src="img/1add.png" class = "addbutton"></a> 
							
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
				
				<!-- input fields for start(sDate) and end date(eDate) --> 
                <div class="form-group">
	   <label class="control-label col-sm-3" for="date"></label>
      
	   <div class="col-sm-5">
             <div class="hero-unit">
                <input  type="text" class="form-control"  name="sDate" required placeholder="Start Date" id="sDate">
            
        </div>
		</div>
		</div>
		
		<div class="form-group">
	   <label class="control-label col-sm-3" for="date"></label>
      
	   <div class="col-sm-5">
            
                <input  type="text" class="form-control" name="eDate" required placeholder="End Date"   id="eDate">
            </div>
        </div>
				
				<!-- submit button --> 
                <div class="form-group">
                  <div class="col-xs-offset-3 col-xs-10">
                    <button class="btn btn-primary" type="submit">ADD
                    TASK</button>
                  </div>
                </div>
				</div>

              </form>
            </div>
            <footer>
              <p>&copy; 2015 TaskerMan, Inc.</p>
            </footer>
          </div>
          
        </div>
      </div>
    </div>
  </div>

<!-- JS Date-picker function --> 
<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#sDate').datepicker({ //sets start date
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
		 <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#eDate').datepicker({ //sets end date
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
</body>
</html>
