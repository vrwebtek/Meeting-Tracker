<?php
	ob_start();
	include('database.php');
	$name=$_POST['name'];
	$id=$_POST['id'];
	mysql_query("UPDATE `master_tab_dept` SET `dept_name`='$name' WHERE dept_id='$id'");
	
	header("Location: department.php");
?>