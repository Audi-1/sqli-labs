<html>
<head>
</head>
<body bgcolor="#000000">
<?PHP
session_start();
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

	//$username=  $_POST['username'] ;
	$username=  mysql_escape_string($_POST['username']) ;
	$pass= mysql_escape_string($_POST['password']);
	$re_pass= mysql_escape_string($_POST['re_password']);
	
	echo "<font size='3' color='#FFFF00'>";
	$sql = "select count(*) from users where username='$username'";
	$res = mysql_query($sql) or die('You tried to be smart, Try harder!!!! :( ');
  	$row = mysql_fetch_row($res);
	
	//print_r($row);
	if (!$row[0]== 0) 
		{
		?>
		<script>alert("The username Already exists, Please choose a different username ")</script>;
		<?php
		header('refresh:1, url=new_user.php');
   		} 
		else 
		{
       		if ($pass==$re_pass)
			{
				# Building up the query........
   				
   				$sql = "insert into users ( username, password) values(\"$username\", \"$pass\")";
   				mysql_query($sql) or die('Error Creating your user account,  : '.mysql_error());
					echo "</br>";
					echo "<center><img src=../images/Less-24-user-created.jpg><font size='3' color='#FFFF00'>";   				
					//echo "<h1>User Created Successfully</h1>";
					echo "</br>";
					echo "</br>";
					echo "</br>";					
					echo "</br>Redirecting you to login page in 5 sec................";
					echo "<font size='2'>";
					echo "</br>If it does not redirect, click the home button on top right</center>";
					header('refresh:5, url=index.php');
			}
			else
			{
			?>
			<script>alert('Please make sure that password field and retype password match correctly')</script>
			<?php
			header('refresh:1, url=new_user.php');
			}
		}
}



?>

</body>
</html>
