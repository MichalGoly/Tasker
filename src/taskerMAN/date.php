<!--file to create dates/set dates to variables then compares them. To help with datepicker validation -->
<?php
$date1=date_create("2013-03-15");
$date2=date_create("2013-12-12");
$diff=date_diff($date1,$date2);
?>
