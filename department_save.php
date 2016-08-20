<?php
	ob_start();
	include('database.php');
	$name=$_POST['name'];
	mysql_query("INSERT INTO `master_tab_dept`(`dept_name`) VALUES ('$name')");
	
	header("Location: department.php");
?>