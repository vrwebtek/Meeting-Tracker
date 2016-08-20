<?php
ob_start();
 include 'database.php';
//var_dump($_POST); exit;
session_start();
if (isset($_POST["submit"]) && !empty($_POST))
{

	$username = validate_input($_POST["username"]);
	$password = validate_input($_POST["password"]);
	$password = hash("SHA256", $password);
	$query = "SELECT * FROM master_tab_user where username='$username' and password='$password' and status='active'";
	$result = mysql_query($query);
	$count=mysql_num_rows($result);

	if ($count > 0)
	{
		$_result = mysql_fetch_assoc($result);
			
		echo mysql_error();
		//session_start();
		$_SESSION['logusrid'] = $_result['id'];
		$_SESSION['logusrname'] = $_result['username'];
		$_SESSION['logusrstatus'] = $_result['status'];
		$_SESSION['message'] = '';
		$_SESSION['upload_msg'] = '';
		$_SESSION['download_msg'] = '';
		echo '<script>window.location.href="dashboard.php"</script>';	
		//header('Location:dashboard.php');
		exit;
	}
	else
	{
		header('Location:login.php');
	}


}

function validate_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if(!ctype_alnum($data))
	{
		header('Location:login.php');
	}
	return $data;
}