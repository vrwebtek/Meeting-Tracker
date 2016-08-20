<?php
include 'database.php';

//ob_start();
session_start();
//echo $_SESSION["upload_msg"];
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['submit']) && !empty($_POST))
{
	$meeting_id   = $_POST['meeting_id'];
	$meeting_type = $_POST['meetingType'];
	$meeting_name = $_POST['meetingname'];
	$meeting_time = $_POST['meetingTime'];
	$subject      = $_POST['subject'];
	$department   = $_POST['department'];
	
	 $_meeting_time = date('dmY',strtotime($meeting_time));
	
	 $todaysDate = date('Y-m-d h:i:s a', time());
	
	 $random_numb = str_pad(mt_rand(1,99999999), 8,'0',STR_PAD_LEFT); //Generating random number with 8 digits and padding it left with '0' if number is generated less than 8 digit
	 $fileNameWithRandomNumber = $_meeting_time."".$random_numb; //generating filename using meeting time and random number generated above.
	
	
	
	if(is_uploaded_file($_FILES['uploadMinInMeeting']['tmp_name']))// code to upload MInutes in meeting file
	{
		$file_uploadMinInMeeting = $_FILES['uploadMinInMeeting']['tmp_name'];
		$filenameMinInMeeting = "meeting_files/".$_meeting_time."/MinInMeeting/".$fileNameWithRandomNumber.".pdf";
		$MinInMeetingPathUrl = "meeting_files/$_meeting_time/MinInMeeting";
		if (is_dir($MinInMeetingPathUrl))//code to check if directory is present
		{
			move_uploaded_file($file_uploadMinInMeeting, $filenameMinInMeeting);

		}
		else {
		
			if(mkdir($MinInMeetingPathUrl,0777,true))//if no directory is present create it.
			{
				move_uploaded_file($file_uploadMinInMeeting, $filenameMinInMeeting);
				
			}
		}
		
		$query = ("UPDATE user_tab_meeting SET mins_in_meeting='$fileNameWithRandomNumber' WHERE user_meeting_id='$meeting_id' ");
		mysql_query($query);
	}
	
	if (is_uploaded_file($_FILES['uploadSynopsis']['tmp_name']))// code to upload synopsis file
	{
		$file_uploadSynopsis     = $_FILES['uploadSynopsis']['tmp_name'];
		$filenameSynopsis = "meeting_files/".$_meeting_time."/Synopsis/".$fileNameWithRandomNumber.".pdf";
		$SynopsisPathUrl = "meeting_files/$_meeting_time/Synopsis";
		
		if (is_dir($SynopsisPathUrl))
		{
			move_uploaded_file($file_uploadSynopsis, $filenameSynopsis);
			
		}
		else {
	
			if(mkdir($SynopsisPathUrl,0777,true))
			{
				move_uploaded_file($file_uploadSynopsis, $filenameSynopsis);
				
			}
		}
		
		$query = ("UPDATE user_tab_meeting SET synopsis='$fileNameWithRandomNumber' WHERE user_meeting_id='$meeting_id'");
		mysql_query($query);
	}
	
	if (is_uploaded_file($_FILES['uploadResolution']['tmp_name']))// code to update resolution file
	{
	
		$file_uploadResolution   = $_FILES['uploadResolution']['tmp_name'];
		$filenameResolution = "meeting_files/".$_meeting_time."/Resolution/".$fileNameWithRandomNumber.".pdf";
		$ResolutionUrl = "meeting_files/$_meeting_time/Resolution";
		if (is_dir($ResolutionUrl))
		{
			move_uploaded_file($file_uploadResolution, $filenameResolution);
			
		}
		else {
	
			if(mkdir($ResolutionUrl,0777,true))
			{
				move_uploaded_file($file_uploadResolution, $filenameResolution);
				
			}
		}
		
		$query = ("UPDATE user_tab_meeting SET resolution='$fileNameWithRandomNumber' WHERE user_meeting_id='$meeting_id' ");
		mysql_query($query);
	}
	
	$_SESSION["upload_msg"] = 'All files were uploaded successfully';
	header('Location:addNewMeeting.php');
} //echo "Success<br><a href=addNewMeeting.php>Back</a>";