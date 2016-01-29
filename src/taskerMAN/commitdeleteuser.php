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
    <title>TaskerMAN</title><!-- Bootstrap core CSS -->
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
    <!-- font awesome stylesheet --> <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
    rel="stylesheet">
</head>
<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                	<!-- Navbar code --> 
                    <button aria-controls="navbar" aria-expanded="false" class=
                    "navbar-toggle collapsed" data-target="#navbar"
                    data-toggle="collapse" type="button">
                        
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button><a class="navbar-brand" 
                    href="http://users.aber.ac.uk/tig/taskerMAN">TaskerMAN</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        	<!-- log in message on navbar -->
                            <a href=
                            "#"><?php echo "Logged in as ". $username;?></a>
                        </li>
                        <li>
                            <a href=
                            "http://users.aber.ac.uk/tig/taskerMAN/logout.php"><i class="fa fa-sign-out"
                            style="font-size:24px;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- divs to centre navbar --> 
        <div class="containerCentre">
            <div class="container">
                <div class="row">
                	<!-- code to put line in under navbar and space it out -->
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
                            <a href="editusers.php">
                            	<!-- font awesome icon--><i class=
                            "fa fa-chevron-circle-left" style=
                            "font-size:24px;"></i></a>
                        </li>
                    </ol><br>
                    <div class="form-group1">
                        <label class="control-label col-sm-3" for=
                        "password"></label>
                        <div class="col-sm-5">
                            <div align='center' class="alert alert-danger">
                                <?php
                                //delete confirmation method
                                                            $id = $_GET['email'];
                                                                if($id != NULL){
                                                                        echo "<strong>Are you sure you want to delete   $id ?</strong>";

                                                                }
                                                        ?><br>
                                <br>
                                <footer>
                                    <br>
                                    <br>
                                    <p>&copy; 2015 TaskerMan, Inc.</p>
                                </footer>
                                <!-- to make the css load quikly -->
                                <script src=
                                "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
                                </script>
                                <script>
                                window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
                                </script>
                                <script src="../../dist/js/bootstrap.min.js">
                                </script>
                                
                                <table>
                                    <tr>
                                        <td>
                                        	<!-- displaying the radio buttons for the delete confirmation method -->
                                            <form action="" method="post" role=
                                            "form">
                                                <label class=
                                                "radio-inline"></label>
                                                <div class="radio-toolbarY">
                                                    <label class=
                                                    "radio-inline"><input name=
                                                    "answer" onclick=
                                                    "javascript: submit()"
                                                    type="radio" value=
                                                    "yes">YES</label>
                                                    
                                                    <div class=
                                                    "radio-toolbarN">
                                                        <label class=
                                                        "radio-inline"><input name="answer"
                                                        onclick=
                                                        "javascript: submit()"
                                                        type="radio" value=
                                                        "no">NO</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </td><?php
                                        // if the answer is no go back to editusers.php otherwise delete the userid
                                        //and re-direct to another webpage.
                                                    if(isset($_POST['answer'])){
                                                        if($_POST['answer']== "no"){
                                                            
                                                            header("Location: editusers.php");
                                                        }else{
                                                            
                                                            session_start();
                                                            $_SESSION['deleteme'] = $id;
                                                            header("Location: userdelete.php");
                                                            
                                                            
                                                        
                                                    }   
                                                    }
                                                    
                                                    ?><!--closes container -->
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
