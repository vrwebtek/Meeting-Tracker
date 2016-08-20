<?php
	include('database.php');
	$type=$_POST['type'];
	$code=$_POST['code'];
	mysql_query("INSERT INTO `master_tab_meeting_type`(`meeting_name`, `code`) VALUES ('$type','$code')");
	header('Location: meetingType.php');
?>