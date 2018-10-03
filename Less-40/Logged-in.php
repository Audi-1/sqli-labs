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
<html>
<head>
<title>
</title>
</head>
<body bgcolor="#000000">
<div align="right">
<a style="font-size:.8em;color:#FFFF00" href='index.php'><img src="../images/Home.png" height='45'; width='45'></br>HOME</a></br></br></br>
</div>
<center>
<img src="../images/Logged-in.jpg"></br><font size="4" color="#FFFF00"></br></br>
YOU ARE LOGGED IN AS </br> 
<font size="7" color="#FFFF00"><strong>
<?php
echo $_SESSION["username"];
?>
</strong>
</br>
</br>
<font size="5" color="#FFFF00">
You can Change your password here.


<form name="mylogin" method="POST" action="pass_change.php">
<table style="margin-top:50px;">
<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
<strong>Current Password:</strong></font>
</td>
	<td style="text-align:left">
		<input name="current_password" id="current_password" type="text" value="" /> 
	</td>
</tr>
<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
	<strong>New Password:</strong>
</font>
</td>
<td style="text-align:left">
	<input name="password" id="password" type="password" value="" />
</td>
</tr>

<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
<strong>Retype Password:</strong>
</font>
</td>
<td style="text-align:left">
<input name="re_password" id="re_password" type="password" value="" />
</td>
</tr>




<tr>
<td colspan="2" style="text-align:right">
<input name="submit" id="submit" type="submit" value="update password" />

</td>
</tr>

<tr>
<td colspan="2" style="text-align:right">
<input name="submit1" id="submit1" type="submit" value="Logout" /><br/><br/>
</td>
</tr>

</table>



</center>
</body>
</html>

