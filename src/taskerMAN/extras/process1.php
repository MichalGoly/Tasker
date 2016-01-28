<?php

echo $_POST["member_name"];

echo $_POST["email"];

include(connector.php);

$sql1 = "INSERT INTO members (Email, Member_name)
VALUES ('$_POST[email]','$_POST[member_name]')";

if($connection->query($sql1)===TRUE){
echo "New Record Created successfully in MEMBERS";
}else {
echo "ERROR :" . $sql1. "<br>" . $connection->error;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CONFIRM ADDED MEMBER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <!-- Begin Header -->
  
  <!-- End Header -->
  <!-- Begin Naviagtion -->
  <div id="navigation"> <h3>ADD TEAM MEMBERS </h3>
       <div id="logout"><a href="">LOG OUT</a></div>
	         
  
  </div>
  <!-- End Naviagtion -->
  <!-- Begin Content -->
  <div id="content"> 
  <a href="index.html"><img src="back2.png"></a>
  <table id="customers">
  
  
    
    <th>
	
	
		<fieldset>
		<br>
		<img src="add.png">
	  	  <br><br>
	          <?php echo "$_POST[member_name]";?>   -  added to the team database. 
	         <br>
	         
	         <br>
	         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="add_users.html">ADD ANOTHER MEMBER<a/>
			 <br><br><br>
			 
	    </fieldset>  
	</form>
	</th>
  
  </tr>
  
  
  </table>


  </div>
  
 </div>
<!-- End Wrapper -->
</body>
</html>
