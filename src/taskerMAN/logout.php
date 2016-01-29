<!-- a PHP file to log users out, it just destroys the session and then re-directs the user to the login page --> 
<?php
session_start();
session_destroy();
header("Location: login.php");
?>
