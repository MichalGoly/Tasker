<?php
session_start();
//session_save_path("/users/tho4/public_html/CS25010/sessions"); 
error_reporting (E_ALL ^ E_NOTICE); 
$username=$_SESSION['name'];    

if(!isset($username))
{
header("Location: login.php");
}else{
    
echo "Your session is running " . $username;    
//reorts all errors, starts the session and rints a message if the user is logged in.   
}
    

?><?php


$id = $_GET['taskId'];
include 'connector.php'; // connects to the remote DB




$sql= "SELECT * FROM Task WHERE
taskId = '$id'";
$result = $connection->query($sql); //selects everything from task where the id is the same as the task id.

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    $title = $row['title'];
    $email = $row['TeamMember_email'];   //gets all the data from the DB of that task
    $sDate = $row['startDate'];
    $eDate = $row['endDate'];
    $status = $row['taskStatus'];
    
}
}else{
    echo "0 results";    
}
//get the email from the teammember
$sql= "SELECT * FROM TeamMember WHERE
email = '$email'";
$result = $connection->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    $firstname = $row['firstName'];
    $lastname = $row['lastName'];
    //gets the first and last name and prints it
    
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
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="../../favicon.ico" rel="icon">
    <title>TaskerMAN</title>
    <script src=
    "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
    </script>
    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <script src=
    "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div> <input type="text"  class="form-control" name="tDescription[]" id="d_new" placeholder="Enter Another Element"> <a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="img/1minus.png"/><\/a><\/div>'; //New input field html 
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


    </script><!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <!-- Font awesome Style sheet -->
    <link href=
    "http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
    rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js">
    </script>
    <title>TaskerMAN</title>
</head>
<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="containerCentre">
                <div class="container">
                    <div class="navbar-header">
                        <!-- css for navbar -->
                        <button aria-controls="navbar"
                        aria-expanded="false" class="navbar-toggle collapsed"
                        data-target="#navbar" data-toggle="collapse" type=
                        "button"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class=
                        "icon-bar"></span> <span class=
                        "icon-bar"></span></button> <a class="navbar-brand"
                        href=
                        "http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href=
                                "http://users.aber.ac.uk/tig/taskerMAN/logout.php">
                                <!-- font awesome button--> <i class=
                                "fa fa-sign-out" style=
                                "font-size:24px;"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav><!-- centres tHe container -->
        <div class="containerCentre">
            <div class="container">
                <div class="row">
                    <ul class="nav nav-sidebar"></ul>
                    <!-- css for line under navbar -->
                    <ul class="nav nav-sidebar">
                        <!-- put a space before the line -->
                        <li>
                            <a href="#{{x}}">{{x}}</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-header"></h1>
                <div class="jumbotron">
                    <ol class="breadcrumb">
                        <li>
                            <a href="viewtasks.php">
                            <!-- font awesome button for the breadcrumb--><i class="fa fa-chevron-circle-left"
                            style="font-size:24px;"></i></a>
                        </li>
                    </ol>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <?php echo $firstname. " ".$lastname."'s "; ?> Task
                            Profile</h3>
                        </div>
                        <div class="form-group">
                            <table class='table table-hover'>
                                <tbody>
                                    <!-- Prints out the name -->
                                    <tr>
                                        <td>
                                        <?php echo "<strong>". 'Task Title - '."</strong>" .$title; ?></td>
                                    </tr>
                                 
                                    <tr>
                                    	   <!-- Pints out the email -->
                                        <td>
                                        <?php echo  "<strong>". 'Email Address   -  '.  "</strong>".$email; ?></td>
                                    </tr>
                                    <!-- Gets task ID, description and comments from the correct task (referenced by taskID).
            Puts task data in an array and then prints it out into a table. -->
            
            				<?php
                                        include 'connector.php';
                                        $sql= "SELECT taskElementId, description, comments FROM TaskElement WHERE
                                                Task_taskId = '$id'";
                                        $result = $connection->query($sql);
                                        $tDescription = array();
                                         $count = 0;
                                        if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    array_push($tDescription,$row["description"]);
                                                    $eid = $row["taskElementId"];
                                                    
                                                    $descr = $row["description"];
                                                  //echo $descr;
                                                     $comm = $row["comments"];
                                                
                                                
                                                    
                                                  
                                                    echo "<tr>";

                                                        $count = $count + 1;
                                                        echo "<td> <strong> Task Element $count - </strong> $descr     <BR>   Comments - $comm     </td>";
                                                    
                                                    echo "</tr>"; 
                                                
                                                }
                                        }else{
                                            echo "0 results";
                                        }
                                        
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <footer>
                    <p>&copy; 2015 TaskerMan, Inc.</p>
                </footer>
            </div><!-- /container -->
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
</body>
</html>
