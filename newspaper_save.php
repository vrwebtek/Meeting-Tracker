<?php
	ob_start();
	include('database.php');
	$name=$_POST['name'];
	$type=$_POST['type'];
	$level=$_POST['level'];
	$asso_name=$_POST['asso_name'];//associate name
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	
	mysql_query("INSERT INTO `master_tab_newspaper`(`name`, `type`, `associate_name`, `email`, `mobile`, `address`, `level`) VALUES ('$name','$type','$asso_name','$email','$mobile','$address','$level')");
	
	header("Location: newspaper.php");
?>