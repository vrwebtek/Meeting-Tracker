<?php
session_start();

unset ($_SESSION['logusrid']);
unset ($_SESSION['logusrname']);
unset ($_SESSION['logusrstatus']);

session_unset();
session_destroy();
header('Location:login.php');