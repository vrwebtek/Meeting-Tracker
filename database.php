<?php
    // Connecting to the database server
   $servername="localhost";
	$username="root";
	$password="";
	$connect = mysql_connect($servername,$username,$password) or die("<br/>Check your server connection...");
	$dbname = "vvmc_meeting_tracker";
	$selectedDB = mysql_select_db($dbname) or die(mysql_error());
	//include('date.php');
	

	
function tep_redirect($url, $enable_SSL=false) {
    if ( ($enable_SSL== true) && (getenv('HTTPS') == 'on') ) 
	{ 
      if (substr($url, 0, strlen(HTTP_SERVER)) == HTTP_SERVER) 
	  {
        $url = HTTPS_SERVER . substr($url, strlen(HTTP_SERVER)); 
      }
    }
    header("Location: " . $url);
  }   
	?>
	
    