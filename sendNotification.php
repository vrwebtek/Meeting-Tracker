<?php
	include('database.php');
	include('classes/class.SendEmail.php');//including class for sending mails.
	$meetingid=$_POST['MeetingID'];
	$Newspaper=$_POST['Newspaper'];
	$count=count($Newspaper);//get the count of newspaper selected
	$new_string="";//selected newpaper id will be converted to string eg. 1,2,5 etc
	for($i=0;$i<$count;$i++)
	{
		if($i!=($count-1))
		{
			$new_string=$new_string.$Newspaper[$i].",";
		}
		else
		{
			$new_string=$new_string.$Newspaper[$i];
		}
		
		//email to particular news paper will go here inside for loop
			/*$mailToNP=new SendEmail();//instantiating the class with object $mailToNP
			$mailToNP->sendMailToNewspaper($meetingid,$Newspaper[$i]);*/
		//email ends
	}
	
	//email to particular news paper will go here
			$mailToNP=new SendEmail();//instantiating the class with object $mailToNP
			$mailToNP->sendMailToNewspaper($meetingid,$new_string);
	//email ends
		
	//mysql_query("UPDATE `user_tab_meeting` SET `newspaper`='$new_string', `if_notified`='1' where user_meeting_id='$meetingid'");
	
	
	return('true');
?>