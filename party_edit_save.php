<?php
	ob_start();
	include('database.php');
	$name=$_POST['name'];
	$id=$_POST['id'];
	mysql_query("UPDATE `master_tab_party` SET `party`='$name' WHERE id='$id'");
	
	header("Location: party.php");
?>