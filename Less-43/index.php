<?PHP
session_start();
if (isset($_SESSION['username']) && isset($_COOKIE['Auth'])) {
   header('Location: logged-in.php');
}
?>
<?php
//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Less-42 - Stacked Query </title>
</head>
<body bgcolor="#000000">

<div style="text-align:center">
<form name="login" method="POST" action="login.php">

<h2 style="text-align:center;background-image:url('../images/Less-43.jpg');background-repeat:no-repeat;background-position:center center">
<div style="padding-top:300px;text-align:center;color:#FFFF00;"><?php echo $form_title_in; ?></div>
</h2>

<div align="center">
<table style="margin-top:50px;">
<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
<strong>Username:</strong>
</td>
<td style="text-align:left">
<input name="login_user" id="login_user" type="text" value="" />
</td>
</tr>
<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
<strong>Password:</strong>
</td>
<td style="text-align:left">
<input name="login_password" id="login_password" type="password" value="" />
</td>
</tr>
<tr>
<td colspan="2" style="text-align:right">
<input name="mysubmit" id="mysubmit" type="submit" value="Login" /><br/><br/>

<a style="font-size:.8em;color:#FFFF00" href="forgot_password.php">Forgot your password?</a><font size="3" color="#FFFF00">
||</font>
<a style="font-size:.8em;color:#FFFF00" href="acc-create.php">New User click here?</a>
</td>
</tr>

</table>
</div>
</form>
</div>
</body>
</html>
