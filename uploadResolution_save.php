<?php
	ob_start();
	include('database.php');
	$meetingID=$_POST['meetingid'];
	$uploadResolution=$_FILES['uploadResolution']['tmp_name'];//temp name for moving file to location
	$applicationOn=date('Y-m-d');//todays Date i.e. when application for leave is uploaded
	
	//get meetingTime from database so that we can make a folder of leave in the folder of meeting file with date eg meeting_files/15042016/LeaveApplications
	
	$q=mysql_query("select meeting_scheduled_to,code from user_tab_meeting where user_meeting_id='$meetingID'");
	$r=mysql_fetch_array($q);
	$meetingTime1=$r['meeting_scheduled_to'];
	$meetingTime= date('dmY',strtotime($meetingTime1));//folder will be created for date on which meeting will be held
	$meetingCode=$r['code'];
	
	
	//uploading the pdf file
	$filenameWithDate=$meetingCode."_".$meetingTime."_TH";
	$ResolutionPathUrl="meeting_files/$meetingTime/Resolution";
	$filenameResolution="meeting_files/".$meetingTime."/Resolution/".$filenameWithDate.".pdf";//by default pdf will be uploaded so .pdf ext is set
	
	if (is_dir($ResolutionPathUrl))
	{
		move_uploaded_file($uploadResolution, $filenameResolution);
	}
	else
	{
		if(mkdir($ResolutionPathUrl,0777,true))
		{
			move_uploaded_file($uploadResolution, $filenameResolution);
		}
	
	}
	
	//inserting leave application in table
	mysql_query("UPDATE `user_tab_meeting` SET `resolution`='$filenameWithDate' where user_meeting_id='$meetingID'");
	
	header('Location: addNewMeeting.php');
?>