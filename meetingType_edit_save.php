<?php
	include('database.php');
	$type=$_POST['type'];
	$code=$_POST['code'];
	$id=$_POST['id'];
	mysql_query("UPDATE `master_tab_meeting_type` SET `meeting_name`='$type', `code`='$code' where meeting_id='$id'");
	header('Location: meetingType.php');
?>