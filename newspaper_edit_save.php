<?php
	ob_start();
	include('database.php');
	$name=$_POST['name'];
	$id=$_POST['id'];
	$type=$_POST['type'];
	$level=$_POST['level'];
	$asso_name=$_POST['asso_name'];//associate name
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	
	mysql_query("UPDATE `master_tab_newspaper` SET `name`='$name',`type`='$type',`associate_name`='$asso_name',`email`='$email',`mobile`='$mobile',`address`='$address',`level`='$level' WHERE news_id='$id'");
	
	header("Location: newspaper.php");
?>