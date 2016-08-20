<?php
	
	class SendEmail{
	/*
		this is a generic class for sending mail using function
		function sendMailToNewspaper()
		$mid: meeting ID
		$nid: newspaper id
		
		function sendMailToCorporator()
	*/
	
		
		function sendMailToNewspaper($meetingID, $newsID)
		{
			$mid=$meetingID;
			$nid=$newsID;
			$NEWS=explode(',',$nid);
			include('class.phpmailer.php');//getting php mailer file included
			$count=count($NEWS);
			for($i=0;$i<$count;$i++)
			{
			
			$from="dinesh@vrwebtek.com";
			//fetch email id and agenda and notification file name for attachment from database
			$get=mysql_query("select * from user_tab_meeting where user_meeting_id='$mid'");
			$get_r=mysql_fetch_array($get);
			$meetingName=$get_r['name'];//meeting name
			$notification=$get_r['PDF_Notification'];
			$meetingDate=$get_r['meeting_scheduled_to'];
			$meetingDate=date('d-m-Y H:i:s',strtotime($meetingDate));
			
			$meetingDateFolder=date('dmY',strtotime($meetingDate));
			
			//get newspaper details
			$getN=mysql_query("select * from master_tab_newspaper where news_id='$NEWS[$i]'");
			$getN_r=mysql_fetch_array($getN);
			$asso_name=$getN_r['associate_name'];
			$asso_email=$getN_r['email'];
			
			$email=new PHPMailer();

			$email->From=$from;
			$email->FromName=VVMC_Meeting_Tracker;
			$email->Subject="VVMC Meeting Notification on: $meetingDate";
			
			$body="Dear $asso_name, VVMC meeting is scheduled to $meetingDate.\n";
			$body.="Kindly Publish the attached Notification in your newspaper\n";
			$body.="Thank You !";
			
			$email->Body=$body;
			$email->addAddress($asso_email);//if any one reply to the mail...mail will be replied to this mail id
			
			
			$file_to_attach="meeting_files/$meetingDateFolder/Notification/$notification".".pdf";
			$email->addAttachment($file_to_attach);
			$email->send();
			}//for loop ends
			
			//update the table
			mysql_query("UPDATE `user_tab_meeting` SET `newspaper`='$nid', `if_notified`='1' where user_meeting_id='$mid'");
		}
	}
?>