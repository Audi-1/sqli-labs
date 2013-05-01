
<?php
include '../sql-connections/sql-connect.php' ;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title><?php echo $feedback_title_ns; ?> </title>
</head>

<body bgcolor="#000000">
<div align="right">
<a style="font-size:.8em;color:#FFFF00" href='index.php'><img src="../images/Home.png" height='45'; width='45'></br>HOME</a>
</div>
<font size="3" color="#FFFF00">
<div style="text-align:center">

<form name="mylogin" method="POST" action="login_create.php">

<h2 style="text-align:center;background-image:url('../images/Less-24-new-user.jpg');background-repeat:no-repeat;background-position:center center">
<div style="padding-top:300px;text-align:center;color:#FFFF00;"><?php echo $form_title_ns; ?></div>
</h2>

<div align="center">
<table style="margin-top:50px;">
<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
<strong>Desired Username:</strong></font>
</td>
	<td style="text-align:left">
		<input name="username" id="username" type="text" value="" /> 
	</td>
</tr>
<tr>
<td style="text-align:right">
<font size="3" color="#FFFF00">
	<strong>Password:</strong>
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
<input name="submit" id="submit" type="submit" value="Register" /><br/><br/>
</td>
</tr>

</table>
</div>
</form>
</div>
</body>
</html>
