<?php
	  $myCalendar = new tc_calendar("date2", true);
	  $myCalendar->setAutoHide(false);
	  $myCalendar->setDate(date("d"), date("m"), date("Y"));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1960, date("Y"));
	  $myCalendar->dateAllow("1960-01-01", date("Y-m-d"));
	  $myCalendar->setAlignment("left", "bottom");
	  $myCalendar->disabledDay("sun");
	  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-14", "2010-12-25"), 0, "year");
	  $myCalendar->setOnChange("myChanged('Test message')");
	  $myCalendar->setTimezone("Europe/Bucharest");
	  $myCalendar->writeScript();
?>