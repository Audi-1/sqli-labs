<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-59:Challenge-6</title>
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
include("../sql-connections/sql-connect.php");




//Creating dynamic string for challenge password
function passwd_gen()
{
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$string_length = 24;
	$string = '';
 	for ($i = 0; $i < $string_length; $i++) 
	{
      		$string .= $characters[rand(0, strlen($characters) - 1)];
 	}
	//echo $string;
	return $string;
}


//Updating the counter for Attempts at solving problem.
function next_tryy()
{
	//including the Mysql connect parameters.
	include("../sql-connections/sql-connect.php");
	$sql = "UPDATE challenge1 SET tryy=tryy+1 WHERE id=1";
	mysql_query($sql);
}

function view_attempts()
{
	include("../sql-connections/sql-connect.php");
	$sql="SELECT tryy FROM challenge1 WHERE id=1";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	return $row[0];
	
}



// Submitting the final answer
if(!isset($_POST['answer_key']))
{


	// resetting the challenge and repopulating the table Challenge1.
	if(isset($_POST['reset']))
	{
		setcookie('challenge1', ' ', time() - 3600000);
		echo "<font size=4>You have reset the Challenge</font><br>\n";
		echo "Redirecting you to main challenge page..........\n";
		header( "refresh:4;url=index.php" );
		//echo "cookie expired";
			
	}
	else
	{
	

		// Checking the cookie on the page and populate the table with random value.
		if(isset($_COOKIE['challenge1']))
		{
			$sessid=$_COOKIE['challenge1'];
			//echo "Cookie value: ".$sessid;
		}
		else
		{
			$expire = time()+60*60*24*30;
			$hash = md5(rand(0,100000));
			setcookie("challenge1", $hash, $expire);
			//echo "New Cookie : " . $hash . "<br>";
			$passwd = passwd_gen();
			//echo "Password : ".$passwd;
			$sql = "UPDATE challenge1 set sessid = '$hash', secret_key = '$passwd', tryy= 0 WHERE id=1";
			mysql_query($sql);
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
			echo "You have made : ". $tryyy ." of 5 attempts";
			echo "<br><br><br>\n";
		
			
			//Reset the Database if you exceed allowed attempts.
			if($tryyy == 6)
			{
				setcookie('challenge1', ' ', time() - 3600000);
				echo "<font size=4>You have exceeded maximum allowed attempts, Hence Challenge Has Been Reset </font><br>\n";
				echo "Redirecting you to challenge page..........\n";
				header( "refresh:4;url=index.php" );
				echo "<br>";
			}	
		
		
		
			// Querry DB to get the correct output
			$sql="SELECT * FROM users WHERE id= $id LIMIT 0,1";
			$result=mysql_query($sql);
			$row = mysql_fetch_array($result);

			if($row)
			{
				echo '<font color= "#00FFFF">';	
				$unames=array("Dumb","Angelina","Dummy","secure","stupid","superman","batman","admin","admin1","admin2","admin3","dhakkan","admin4");
				$pass = array_reverse($unames);
				echo 'Your Login name : '. $unames[$row['id']];
				echo "<br>";
				echo 'Your Password : ' .$pass[$row['id']];
				echo "</font>";
			}
			else 
			{
				echo '<font color= "#FFFF00">';
				print_r(mysql_error());
				echo "</font>";  
			}
		}
		else
		{
			echo "Please input the ID as parameter with numeric value as done in  Lab excercises\n<br><br>\n</font>";
			echo "<font color='#00FFFF': size=3>The objective of this challenge is to dump the secret key from table <b><i>Challenge1</i></b> in Less than 5 attempts";
		}
	
	}
	

?>
</font> </div></br></br></br><center>
<img src="../images/Less-59.jpg" />
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
	$sql="SELECT 1 FROM challenge1 WHERE secret_key= '$key'";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	if($row)
	{
		echo '<font color= "#FFFF00">';
		echo "\n<br><br><br>";
		echo '<img src="../images/Less-54-1.jpg" />';
		echo "</font>"; 	
	}
	else 
	{
		echo '<font color= "#FFFF00">';
		echo "\n<br><br><br>";
		echo '<img src="../images/slap1.jpg" />';
		//print_r(mysql_error());
		echo "</font>";  
			}	


}

?>

</body>
</html>





 
