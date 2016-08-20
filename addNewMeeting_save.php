<?php
	ob_start();
	date_default_timezone_set('Asia/Kolkata');
	include('database.php');
	$meetingType=$_POST['meetingType'];
	$meetingName=$_POST['meetingName'];
	$meetingTime1=$_POST['meetingTime'];
	$meetingTime= date('dmY',strtotime($meetingTime1));//folder will be created for date on which meeting will be held
	
	$subject=$_POST['subject'];//dynamic-array
	$department=$_POST['department'];//dynamic-array
	$uploadAgenda=$_FILES['uploadAgenda']['tmp_name'];//temp name for moving file to location
	
	$uploadNotification=$_FILES['uploadNotification']['tmp_name'];//temp name for moving file to location
	
	//$uploadAgenda = preg_replace("/[^0-9a-zA-Z.]+/", "_", $uploadAgenda);
	//$todaysDate=date('d-m-Y');//returns 02-04-2016, date at which meeting was pre scheduled.
	if (is_uploaded_file($uploadAgenda) || is_uploaded_file($uploadNotification))
	{
		$todaysDate = date('Y-m-d h:i:s a', time());
		$randomNumber=str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);// an 8 character string of numbers, zero-padded to the left if the number is less than 10000000
		$filenameWithRandomNumber=$meetingTime."".$randomNumber;
	}
	
	//$uploadNotification = preg_replace("/[^0-9a-zA-Z.]+/", "_", $uploadNotification);
	
	$count=count($subject);//count total dynamically added subject fields
	
	//agenda pdf file upload
	if (is_uploaded_file($uploadAgenda))
	{
		$filenameAgenda="meeting_files/".$meetingTime."/Agenda/".$filenameWithRandomNumber.".pdf";//by default pdf will be uploaded so .pdf ext is set
		$AgendaPathUrl="meeting_files/$meetingTime/Agenda";
		
		if (is_dir($AgendaPathUrl))
		{
			move_uploaded_file($uploadAgenda, $filenameAgenda);
		}
		else
		{
			if(mkdir($AgendaPathUrl,0777,true))
			{
				move_uploaded_file($uploadAgenda, $filenameAgenda);
			}
	
		}
	
	}
	//notification pdf file upload
	
	if (is_uploaded_file($uploadNotification))
	{
		$filenameNotification="meeting_files/".$meetingTime."/Notification/".$filenameWithRandomNumber.".pdf";//by default pdf will be uploaded so .pdf ext is set
		$NotificationPathUrl="meeting_files/$meetingTime/Notification";

		if (is_dir($NotificationPathUrl))
		{
			move_uploaded_file($uploadNotification, $filenameNotification);
		}
		else
		{
			if(mkdir($NotificationPathUrl,0777,true))
			{
				move_uploaded_file($uploadNotification, $filenameNotification);
			}
	
		}
	}
	//inserting the data in corresponding tables
	mysql_query("INSERT INTO `user_tab_meeting`(`code`, `name`, `meeting_scheduled_on`, `meeting_scheduled_to`, `PDF_agenda`, `PDF_Notification`, `newspaper`, `if_notified`, `user`, `remark`, `active`) VALUES ('$meetingType','$meetingName','$todaysDate','$meetingTime1','$filenameWithRandomNumber','$filenameWithRandomNumber','0','0','','','1')") or die ('something is wrong with query: '.mysql_error());//newspaper, if_notified, user and remark are set to blank currently, bydefault every meeting is active
	$meetingID=mysql_insert_id();
	//inserting meeting subjects
	
	for($i=0; $i<$count; $i++)
	{
		if($subject[$i]!='' && $department[$i]!='') //if subject and depart both are filled then insert the data
		{
			mysql_query("INSERT INTO `user_tab_meeting_subject`(`meeting_id`, `subject`, `department`, `resolution`) VALUES ('$meetingID','$subject[$i]','$department[$i]','')"); //resolution is blank while punching the meeting for first time
			
		}
	}
	
	header('Location: addNewMeeting.php');
?>