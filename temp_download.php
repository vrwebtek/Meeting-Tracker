<?php
	ob_start();
	session_start();
	include('database.php');
	$id=$_GET['id'];
	$subject = $_GET['sub_id'];
	$dfile=$_GET['File'];
	
	
	
	//$query=mysql_query("select * from user_tab_meeting where user_meeting_id='$id'");
	$query =mysql_query( "SELECT utm.user_meeting_id,utm.code,utm.meeting_scheduled_to, utms.* FROM user_tab_meeting utm INNER JOIN  `user_tab_meeting_subject` utms WHERE (utm.user_meeting_id=utms.meeting_id) AND utms.id=$subject"); 
	//echo $query;
	if(mysql_num_rows($query)<=0)
	{
		//do nothing
	}
	else{
		$r=mysql_fetch_array($query);
		if ($dfile == 'A')
		{
			$pdf=$r['agenda'];
			$folder ='Agenda';
		}
		else if ($dfile == 'R')
		{
			$pdf=$r['resolution'];
			$folder='Resolution';
		}
		else if ($dfile == 'S')
		{
			$pdf=$r['synopsis'];
			$folder='Synopsis';
		}
		else if ($dfile == 'M')
		{
			$pdf=$r['mins_in_meeting'];
			$folder = 'MinInMeeting';
		}
		//$filename=$pdf.'.pdf';
		$filename=$pdf;
		$meetingTime1=$r['meeting_scheduled_to'];
		$meetingTime= date('dmY',strtotime($meetingTime1));//folder is created for date on which meeting will be held
		//echo $meetingTime;
		$err = '<br>Sorry, the file you are requesting is unavailable.';
		// define the path to your download folder plus assign the file name
		$path = 'meeting_files/'.$meetingTime.'/'.$r['subject'].'/'.$folder.'/'.$filename;
		echo $path;
		// check that file exists and is readable
		if (file_exists($path) && is_readable($path)) {
		// get the file size and send the http headers
		$size = filesize($path);
		echo $size;
		ob_clean();
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
		echo $file.'<br>';
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
		ob_flush();
	}
?>