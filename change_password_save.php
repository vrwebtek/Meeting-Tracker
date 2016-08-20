<?php
include 'database.php';
session_start();
if($_POST['submit'] != NULL && $_POST['submit'] != '')
{
	$oldpassword = hash('SHA256',$_POST['oldpassword']);
	$newpassword = hash('SHA256',$_POST['newpassword']);
	$repeatnewpass = hash('SHA256',$_POST['newpassword2']);
	
	$user_id = $_SESSION['logusrid'];
	
	echo $query = ("SELECT password FROM master_tab_user WHERE id='$user_id' and status= 'active'"); 
	$result = mysql_query($query);
	$numrows = mysql_num_rows($result);
 	if ($numrows)	
	 {
	
		$_result = mysql_fetch_assoc($result);
	
		if ($_result['password'] = $oldpassword)
		{
			if ($newpassword == $repeatnewpass)
			{
			echo	$query = ("UPDATE master_tab_user SET password='$newpassword' WHERE id='$user_id' and status= 'active'");
				if (mysql_query($query) == TRUE)
				{
					$_SESSION['message'] = "Your Password was updated successfully";
					header('Location:change_password.php');
					return;
				}
				else 
				{
					$_SESSION['message'] = "Error!! Password updation failed";
					header('Location:change_password.php');
					return ;
				}
			
			}
			else 
			{
				$_SESSION['message'] = "New password and repeat New Password didnot matched!";
				header('Location:change_password.php');
				return;
			
			}
		}
		else 
		{
			$_SESSION['message'] = "Incorrect Old Password";
			header('Location:change_password.php');
			return;
		}
 	}
 	else 
 	{
 		$_SESSION['message'] = "No user with such password";
 		header('Location:change_password.php');
 		return;
 	}
}