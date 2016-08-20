<?php
	include('database.php');
	$id=$_GET['id'];
	
	$query=mysql_query("select * from user_tab_meeting where user_meeting_id='$id'");
	if(mysql_num_rows($query)<=0)
	{
		//do nothing
	}
	else{
		$r=mysql_fetch_array($query);
		$pdf=$r['PDF_agenda'];
		$filename=$pdf.'.pdf';
		$meetingTime1=$r['meeting_scheduled_to'];
		$meetingTime= date('dmY',strtotime($meetingTime1));//folder is created for date on which meeting will be held
		//echo $meetingTime;
		$err = 'Sorry, the file you are requesting is unavailable.';
		// define the path to your download folder plus assign the file name
		$path = 'meeting_files/'.$meetingTime.'/Agenda/'.$filename;
		echo $path;
		// check that file exists and is readable
		if (file_exists($path) && is_readable($path)) {
		// get the file size and send the http headers
		$size = filesize($path);
		echo $size;
		header("Cache-Control: public");
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.$size);
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
    	header('Expires: 0');
  	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
		// open the file in binary read-only mode
		// display the error messages if the file can´t be opened
		$file = @ fopen($path, 'rb');
		echo $file;
		if ($file) {
		// stream the file and exit the script when complete
		fpassthru($file);
		exit;
		} else {
		echo $err;
		}
		} else {
		echo $err;
		}
		
	}
?>