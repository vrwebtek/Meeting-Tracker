<?php
include('database.php');
include('classes/class.SendEmail.php');
$myClass=new SendEmail();
echo $myClass->sendMailToNewspaper(1,1);
?>