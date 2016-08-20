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
	$subject_id   = $_POST['subject_id'];
	$department   = $_POST['department'];
	
	 $_meeting_time = date('dmY',strtotime($meeting_time));
	
	 $todaysDate = date('Y-m-d h:i:s a', time());
	
	 $random_numb = str_pad(mt_rand(1,99999999), 8,'0',STR_PAD_LEFT); //Generating random number with 8 digits and padding it left with '0' if number is generated less than 8 digit
	 $fileNameWithRandomNumber = $_meeting_time."".$random_numb; //generating filename using meeting time and random number generated above.
	
		 
	 //notification pdf file upload
	 $uploadNotification=$_FILES['uploadNotification']['tmp_name'];//temp name for moving file to location
	 
	 if (is_uploaded_file($uploadNotification))
	 {
	 	$filenameNotification="meeting_files/".$meetingTime."/Notification/".$filenameWithRandomNumber."_news_notify.pdf";//by default pdf will be uploaded so .pdf ext is set
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
	 
	 	$notify_query = "UPDATE user_tab_meeting SET PDF_Notification='$filenameNotification' WHERE user_meeting_id=$meeting_id";
	 	mysql_query($notify_query);
	 }
	
	 //code to upload Agenda files
	 $uploadAgenda = $_FILES['uploadAgenda']['tmp_name'];
	 $agenda_count = count( $uploadAgenda);
	 
	 if ($agenda_count > 0)
	 {
	 	for ($i = 0; $i < $agenda_count ; $i++)
	 	{
	 		$agenda_to_upload = $uploadAgenda[$i];
	 		if (is_uploaded_file($agenda_to_upload))
	 		{
	 			$filenameAgenda="meeting_files/".$meetingTime."/".$subject[$i]."/Agenda/".$filenameWithRandomNumber."_agenda.pdf";//by default pdf will be uploaded so .pdf ext is set
	 			$AgendaPathUrl="meeting_files/$meetingTime/$subject[$i]/Agenda";
	 				
	 			if (is_dir($AgendaPathUrl))
	 			{
	 				move_uploaded_file($agenda_to_upload, $filenameAgenda);
	 			}
	 			else
	 			{
	 				if(mkdir($AgendaPathUrl,0777,true))
	 				{
	 					move_uploaded_file($agenda_to_upload, $filenameAgenda);
	 				}
	 					
	 			}
	 			echo "success Agenda Up<br>";
	 			$filenameAg = $filenameWithRandomNumber."_agenda.pdf";
	 			$agenda_query = "UPDATE user_tab_meeting_subject SET agenda='$filenameAg' WHERE id='$subject_id[$i]'";
	 			mysql_query($agenda_query);
	 		}
	 			
	 			
	 	}
	 }
	
	 
	 //upload Synopsis pdf file
	 $uploadSynopsis = $_FILES['uploadSynopsis']['tmp_name'];
	 $synop_count = count($uploadSynopsis);
	 
	 if ($synop_count > 0)
	 {
	 	for ($i = 0; $i < $synop_count ; $i++)
	 	{
	 		$synopsis_to_upload = $uploadSynopsis[$i];
	 
	 		if (is_uploaded_file($synopsis_to_upload))
	 		{
	 			$filenameSynopsis="meeting_files/".$meetingTime."/".$subject[$i]."/Synopsis/".$filenameWithRandomNumber."_synopsis.pdf";//by default pdf will be uploaded so .pdf ext is set
	 			$SynopsisPathUrl="meeting_files/$meetingTime/$subject[$i]/Synopsis";
	 
	 			if (is_dir($SynopsisPathUrl))
	 			{
	 				move_uploaded_file($synopsis_to_upload, $filenameSynopsis);
	 			}
	 			else
	 			{
	 				if(mkdir($SynopsisPathUrl,0777,true))
	 				{
	 					move_uploaded_file($synopsis_to_upload, $filenameSynopsis);
	 				}
	 					
	 			}
	 			//echo "<br>success Synopsis";
	 		}
	 			
	 		$filenameSy = $filenameWithRandomNumber."_synopsis.pdf";
	 		$synopsis_query = "UPDATE user_tab_meeting_subject SET synopsis='$filenameSy' WHERE id='$subject_id[$i]'";
	 		mysql_query($synopsis_query);
	 	}
	 
	 }
	 
	 //upload Resolution pdf file
	 $uploadResolution = $_FILES['uploadResolution']['tmp_name'];
	 $reso_count = count($uploadResolution);
	 
	 if ($reso_count > 0)
	 {
	 	for ($i = 0; $i < $reso_count; $i++)
	 	{
	 		$resolution_to_upload = $uploadResolution[$i];
	 			
	 		if (is_uploaded_file($resolution_to_upload))
	 		{
	 			$filenameResolution ="meeting_files/".$meetingTime."/".$subject[$i]."/Resolution/".$filenameWithRandomNumber."_resolution.pdf";
	 			$ResolutionPathUrl = "meeting_files/$meetingTime/$subject[$i]/Resolution";
	 
	 			if (is_dir($ResolutionPathUrl))
	 			{
	 				move_uploaded_file($resolution_to_upload, $filenameResolution);
	 			}
	 			else
	 			{
	 				if (mkdir($ResolutionPathUrl,0777,true))
	 				{
	 					move_uploaded_file($resolution_to_upload, $filenameResolution);
	 				}
	 			}
	 			//echo "<br>Success Resolution";
	 		}
	 			
	 		$filenameRe = $filenameWithRandomNumber."_resolution.pdf";
	 		$resolution_query = "UPDATE user_tab_meeting_subject SET resolution='$filenameRe' WHERE id='$subject_id[$i]'";
	 		mysql_query($resolution_query);
	 	}
	 }
	 
	 //upload minutes in meeting
	 $uploadMIM = $_FILES['uploadMIM']['tmp_name'];
	 $mim_count = count($uploadMIM);
	 
	 if ($mim_count > 0)
	 {
	 	for ($i = 0; $i < $mim_count; $i++)
	 	{
	 		$mim_to_upload = $uploadMIM[$i];
	 			
	 		if (is_uploaded_file($mim_to_upload))
	 		{
	 			$filenameMIM = "meeting_files/".$meetingTime."/".$subject[$i]."/MinsInMeeting/".$filenameWithRandomNumber."_mim.pdf";
	 			$MimUrl = "meeting_files/$meetingTime/$subject[$i]/MinsInMeeting";
	 
	 			if (is_dir($MimUrl))
	 			{
	 				move_uploaded_file($mim_to_upload,$filenameMIM);
	 			}
	 			else
	 			{
	 				if (mkdir($MimUrl,0777,true))
	 				{
	 					move_uploaded_file($mim_to_upload,$filenameMIM);
	 				}
	 			}
	 			//echo '<br>success mim';
	 
	 			$filenameMin = $filenameWithRandomNumber."_mim.pdf";
	 			$MIM_Query = "UPDATE user_tab_meeting_subject SET mins_in_meeting='$filenameMin' WHERE id='$subject_id[$i]'";
	 			mysql_query($MIM_Query);
	 		}
	 			
	 	}
	 }
	 
	 //upload other document
	 $uploadOtherDoc = $_FILES['uploadOtherDoc']['tmp_name'];
	 $Othdoc_count = count($uploadOtherDoc);
	 
	 if ($mim_count > 0)
	 {
	 	for ($i = 0; $i < $Othdoc_count; $i++)
	 	{
	 		$OtherDoc_to_upload = $uploadOtherDoc[$i];
	 
	 		if (is_uploaded_file($OtherDoc_to_upload))
	 		{
	 			$filenameOthDoc = "meeting_files/".$meetingTime."/".$subject[$i]."/OtherDocument/".$filenameWithRandomNumber."_othdoc.pdf";
	 			$OthrDocUrl = "meeting_files/$meetingTime/$subject[$i]/OtherDocument";
	 
	 			if (is_dir($OthrDocUrl))
	 			{
	 				move_uploaded_file($OtherDoc_to_upload,$filenameOthDoc);
	 			}
	 			else
	 			{
	 				if (mkdir($OthrDocUrl,0777,true))
	 				{
	 					move_uploaded_file($OtherDoc_to_upload,$filenameOthDoc);
	 				}
	 			}
	 			//echo '<br>success oth';
	 		}
	 			
	 		$filenameoth = $filenameWithRandomNumber."_othdoc.pdf";
	 		$MIM_Query = "UPDATE user_tab_meeting_subject SET other_docs='$filenameoth' WHERE id='$subject[$i]'";
	 		mysql_query($MIM_Query);
	 	}
	 }
	 
	$_SESSION["upload_msg"] = 'Files were uploaded successfully';
	header('Location:meetings.php');
} //echo "Success<br><a href=addNewMeeting.php>Back</a>";