<?php
	//$_SESSION
	if($_SESSION['uname']=="")
{
	echo "<script> location.href='index.php';</script>";
}
	echo "Logout Page";
	session_start();
	unset($_SESSION['uname']);
    session_destroy();
	//$_SESSION['id'] = null;
	Header('Location:index.php');
?>

