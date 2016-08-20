<?php
	ob_start();
	include('database.php');
	$name=$_POST['name'];
	mysql_query("INSERT INTO `master_tab_party`(`party`) VALUES ('$name')");
	
	header("Location: party.php");
?>