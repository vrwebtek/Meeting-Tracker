<?php
	ob_start();
	include('database.php');
	$meetingID=$_POST['meetingid'];
	$corporatorID=$_POST['corporator'];
	$leaveApplication=$_FILES['uploadLeaveLetter']['tmp_name'];//temp name for moving file to location
	$applicationOn=date('Y-m-d');//todays Date i.e. when application for leave is uploaded
	
	//get meetingTime from database so that we can make a folder of leave in the folder of meeting file with date eg meeting_files/15042016/LeaveApplications
	
	$q=mysql_query("select meeting_scheduled_to from user_tab_meeting where user_meeting_id='$meetingID'");
	$r=mysql_fetch_array($q);
	$meetingTime1=$r['meeting_scheduled_to'];
	$meetingTime= date('dmY',strtotime($meetingTime1));//folder will be created for date on which meeting will be held
	
	//get corporator name for the leave letter uploaded, it will be used as name of file eg Dinesh_05052016.php
	$CorpName=mysql_query("select name from master_tab_corp where corp_id='$corporatorID'");
	$cr=mysql_fetch_array($CorpName);
	$cname=$cr['name'];
	
	//uploading the pdf file
	$filenameWithDate=$cname."_".$meetingTime;
	$LeavePathUrl="meeting_files/$meetingTime/LeaveApplications";
	$filenameLeave="meeting_files/".$meetingTime."/LeaveApplications/".$filenameWithDate.".pdf";//by default pdf will be uploaded so .pdf ext is set
	
	if (is_dir($LeavePathUrl))
	{
		move_uploaded_file($leaveApplication, $filenameLeave);
	}
	else
	{
		if(mkdir($LeavePathUrl,0777,true))
		{
			move_uploaded_file($leaveApplication, $filenameLeave);
		}
	
	}
	
	//inserting leave application in table
	mysql_query("INSERT INTO `user_tab_leave_application`(`id`, `meeting_id`, `corp_id`, `leaveApplication`, `applicationOn`) VALUES ('','$meetingID','$corporatorID','$filenameWithDate','$applicationOn')");
	
	header('Location: addNewMeeting.php');
?>