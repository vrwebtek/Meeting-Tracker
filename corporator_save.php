<?php
	ob_start();
	include('database.php');
	
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$dep_string="";//selected departments id will be converted to string eg. 1,2,5 etc
	$department=$_POST['department'];
	$party=$_POST['party'];
	if(empty($party))
	{
		$party="No party selected";
	}
	$count=count($department);
	for($i=0;$i<$count;$i++)
	{
		if($i!=($count-1))
		{
			$dep_string=$dep_string.$department[$i].",";
		}
		else
		{
			$dep_string=$dep_string.$department[$i];
		}
	}
	
	
	$in=mysql_query("INSERT INTO `master_tab_corp`(`name`, `dept`, `phone`, `mobile`, `email`, `party`) VALUES ('$name','$dep_string','$phone','$mobile','$email','$party')");
	
	header("Location: corporator.php");
?>