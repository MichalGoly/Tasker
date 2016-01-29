<!-- File to validate forms which is loaded in  to other files -->
<?php
    if (isset($_POST["submit"])) {
        $fname = $_POST['fname'];
		$lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        
        
 
        // Check if first name has been entered
        if (!$_POST['fname']) {
            $errFname = 'Please enter your first name';
        }
        
		// Check if last name has been entered
        if (!$_POST['lname']) {
            $errLname = 'Please enter your last name';
        }
		
		
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if password has been entered
        if (!$_POST['password']) {
            $errPassword = 'Please enter your password';
        }
        
 
// If there are no errors, send to database
if (!$errFname && !$errLname && !$errEmail && !$errPassword) {
    
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
		echo  $result;
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
		echo  $result;
		
    }
	}
?>


