<?php
	include('database.php');
	//Get the file id form $_GET['file'];
	$meetingID=$_GET['meetingid'];
	$fileFor=$_GET['fileFor'];//i.e this downloaded file is for Resolution or Agenda or Notification....Leave letter will be done explicitely because it is multiple entry for single meeting
	
	if($fileFor=="Resolution") //if file is for resolution
	{
	//Get the row from db
	  $q=mysql_query("select meeting_scheduled_to,resolution from user_tab_meeting where user_meeting_id='$meetingID'");
	  $r=mysql_fetch_array($q);
	  $meetingTime1=$r['meeting_scheduled_to'];
	  $meetingTime= date('dmY',strtotime($meetingTime1));//folder is created for date on which meeting was held
	  $file=$r['resolution'];
	  //Build the path 
	  $filePathUrl="meeting_files/$meetingTime/$fileFor/$file".".pdf";
	}
	
	else if($fileFor=="Agenda") //if file is for Agenda
	{
	//Get the row from db
	  $q=mysql_query("select meeting_scheduled_to,PDF_agenda from user_tab_meeting where user_meeting_id='$meetingID'");
	  $r=mysql_fetch_array($q);
	  $meetingTime1=$r['meeting_scheduled_to'];
	  $meetingTime= date('dmY',strtotime($meetingTime1));//folder is created for date on which meeting was held
	  $file=$r['PDF_agenda'];
	  //Build the path 
	  $filePathUrl="meeting_files/$meetingTime/$fileFor/$file".".pdf";
	}
	
	else if($fileFor=="Notification") //if file is for Notification
	{
	//Get the row from db
	  $q=mysql_query("select meeting_scheduled_to,PDF_Notification from user_tab_meeting where user_meeting_id='$meetingID'");
	  $r=mysql_fetch_array($q);
	  $meetingTime1=$r['meeting_scheduled_to'];
	  $meetingTime= date('dmY',strtotime($meetingTime1));//folder is created for date on which meeting was held
	  $file=$r['PDF_Notification'];
	  //Build the path 
	  $filePathUrl="meeting_files/$meetingTime/$fileFor/$file".".pdf";
	}
	
	
	
	
	header("Content-type:application/pdf");
	// It will be called downloaded.pdf
	header("Content-Disposition:attachment;filename='downloaded.pdf'");
	// The PDF source
	readfile($filePathUrl);
	echo $filePathUrl;
?>