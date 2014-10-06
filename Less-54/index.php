<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-54:Challenge-1</title>
</head>

<body bgcolor="#000000">
<div style ="text-align:right">
<form action="" method="post">
<input  type="submit" name="reset" value="Reset the Challenge!" />
</form>
</div>
</right>
<div style=" margin-top:20px;color:#FFF; font-size:23px; text-align:center">Welcome&nbsp;&nbsp;&nbsp;<font color="#FF0000"> Dhakkan </font><br>
<font size="3" color="#FFFF00">



<?php
//including the Mysql connect parameters.
include '../sql-connections/sql-connect-1.php';
include '../sql-connections/functions.php';
error_reporting(0);
$pag = $_SERVER['PHP_SELF']; //generating page address to piggy back after redirects...
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; //characterset for generating random data
$times= 10;
$table = table_name();
$col = column_name(1);     // session id column name
$col1 = column_name(2);   //secret key column name


// Submitting the final answer
if(!isset($_POST['answer_key']))
{
	// resetting the challenge and repopulating the table .
	if(isset($_POST['reset']))
	{
		setcookie('challenge', ' ', time() - 3600000);
		echo "<font size=4>You have reset the Challenge</font><br>\n";
		echo "Redirecting you to main challenge page..........\n";
		header( "refresh:4;url=../sql-connections/setup-db-challenge.php?id=$pag" );
		//echo "cookie expired";
			
	}
	else
	{
		// Checking the cookie on the page and populate the table with random value.
		if(isset($_COOKIE['challenge']))
		{
			$sessid=$_COOKIE['challenge'];
			//echo "Cookie value: ".$sessid;
		}
		else
		{
			$expire = time()+60*60*24*30;
			$hash = data($table,$col);
			setcookie("challenge", $hash, $expire);
			
		}
	
		echo "<br>\n";
	
		// take the variables
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
	
			//logging the connection parameters to a file for analysis.
			$fp=fopen('result.txt','a');
			fwrite($fp,'ID:'.$id."\n");
			fclose($fp);
	
			
			//update the counter in database
			next_tryy();
			
			//Display attempts on screen.
			$tryyy = view_attempts();
			echo "You have made : ". $tryyy ." of $times attempts";
			echo "<br><br><br>\n";
		
			
			//Reset the Database if you exceed allowed attempts.
			if($tryyy >= ($times+1))
			{
				setcookie('challenge', ' ', time() - 3600000);
				echo "<font size=4>You have exceeded maximum allowed attempts, Hence Challenge Has Been Reset </font><br>\n";
				echo "Redirecting you to challenge page..........\n";
				header( "refresh:3;url=../sql-connections/setup-db-challenge.php?id=$pag" );
				echo "<br>\n";
			}	
		
		
		
			// Querry DB to get the correct output
			$sql="SELECT * FROM security.users WHERE id='$id' LIMIT 0,1";
			$result=mysql_query($sql);
			$row = mysql_fetch_array($result);

			if($row)
			{
				echo '<font color= "#00FFFF">';	
				echo 'Your Login name:'. $row['username'];
				echo "<br>";
				echo 'Your Password:' .$row['password'];
				echo "</font>";
			}
			else 
			{
				echo '<font color= "#FFFF00">';
//				print_r(mysql_error());
				echo "</font>";  
			}
		}
		else
		{
			echo "Please input the ID as parameter with numeric value as done in  Lab excercises\n<br><br>\n</font>";
			echo "<font color='#00FFFF': size=3>The objective of this challenge is to dump the <b>(secret key)</b> from only random table from Database <b><i>('CHALLENGES')</i></b> in Less than $times attempts<br>";
			echo "For fun, with every reset, the challenge spawns random table name, column name, table data. Keeping it fresh at all times.<br>" ;
		}
	
	}
	

?>
</font> </div></br></br></br><center>
<img src="../images/Less-54.jpg" />
</center>
<br><br><br>
<div  style=" color:#00FFFF; font-size:18px; text-align:center">
<form name="input" action="" method="post">
Submit Secret Key: <input type="text" name="key">
<input type="submit" name = "answer_key" value="Submit">
</form> 
</div>


<?php

}

else
{
	echo '<div  style=" color:#00FFFF; font-size:18px; text-align:center">';
	$key = addslashes($_POST['key']);
	$key = mysql_real_escape_string($key);
	//echo $key;
	//Query table to verify your result
	$sql="SELECT 1 FROM $table WHERE $col1= '$key'";
	//echo "$sql";
	$result=mysql_query($sql)or die("error in submittion of Key Solution".mysql_error());
	 
	$row = mysql_fetch_array($result);
	
	if($row)
	{
		echo '<font color= "#FFFF00">';
		echo "\n<br><br><br>";
		echo '<img src="../images/Less-54-1.jpg" />';
		echo "</font>"; 
		header( "refresh:4;url=../sql-connections/setup-db-challenge.php?id=$pag" );	
	}
	else 
	{
		echo '<font color= "#FFFF00">';
		echo "\n<br><br><br>";
		echo '<img src="../images/slap1.jpg" />';
		header( "refresh:3;url=index.php" );
		//print_r(mysql_error());
		echo "</font>";  
			}	


}

?>

</body>
</html>





 
