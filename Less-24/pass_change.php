<html>
<head>
</head>
<body bgcolor="#000000">
<?PHP
session_start();
if (!isset($_COOKIE["Auth"]))
{
	if (!isset($_SESSION["username"])) 
	{
   		header('Location: index.php');
	}
	header('Location: index.php');
}
?>
<div align="right">
<a style="font-size:.8em;color:#FFFF00" href='index.php'><img src="../images/Home.png" height='45'; width='45'></br>HOME</a>
</div>
<?php

//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");



if (isset($_POST['submit']))
{
	
	
	# Validating the user input........
	$username= $_SESSION["username"];
	$curr_pass= mysql_real_escape_string($_POST['current_password']);
	$pass= mysql_real_escape_string($_POST['password']);
	$re_pass= mysql_real_escape_string($_POST['re_password']);
	
	if($pass==$re_pass)
	{	
		$sql = "UPDATE users SET PASSWORD='$pass' where username='$username' and password='$curr_pass' ";
		$res = mysql_query($sql) or die('You tried to be smart, Try harder!!!! :( ');
		$row = mysql_affected_rows();
		echo '<font size="3" color="#FFFF00">';
		echo '<center>';
		if($row==1)
		{
			echo "Password successfully updated";
	
		}
		else
		{
			header('Location: failed.php');
			//echo 'You tried to be smart, Try harder!!!! :( ';
		}
	}
	else
	{
		echo '<font size="5" color="#FFFF00"><center>';
		echo "Make sure New Password and Retype Password fields have same value";
		header('refresh:2, url=index.php');
	}
}
?>
<?php
if(isset($_POST['submit1']))
{
	session_destroy();
	setcookie('Auth', 1 , time()-3600);
	header ('Location: index.php');
}
?>
</center>  
</body>
</html>
