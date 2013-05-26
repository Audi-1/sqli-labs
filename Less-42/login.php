<html>
<head>
</head>
<body bgcolor="#000000">
<font size="3" color="#FFFF00">
<div align="right">
<a style="font-size:.8em;color:#FFFF00" href='index.php'><img src="../images/Home.png" height='45'; width='45'></br>HOME</a>
</div>
<?PHP

session_start();
//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");






function sqllogin($host,$dbuser,$dbpass, $dbname){
   // connectivity
//mysql connections for stacked query examples.
$con1 = mysqli_connect($host,$dbuser,$dbpass, $dbname);
   
   $username = mysqli_real_escape_string($con1, $_POST["login_user"]);
   $password = $_POST["login_password"];

   // Check connection
   if (mysqli_connect_errno($con1))
   {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   else
   {
       @mysqli_select_db($con1, $dbname) or die ( "Unable to connect to the database ######: ");
   }


   /* execute multi query */

   
   $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
   if (@mysqli_multi_query($con1, $sql))
   {
        /* store first result set */
      if($result = @mysqli_store_result($con1))
      {
	 if($row = @mysqli_fetch_row($result))
	 {
	    if ($row[1])
	    {
	       return $row[1];
	    }
	    else
	    {
	       return 0;
	    }
	 }
      }
      
      else 
      {
	echo '<font size="5" color= "#FFFF00">';
	print_r(mysqli_error($con1));
	echo "</font>";  
      }
   }
   else 
   {
	echo '<font size="5" color= "#FFFF00">';
	print_r(mysqli_error($con1));
	echo "</font>";  
    }
}





$login = sqllogin($host,$dbuser,$dbpass, $dbname);
if (!$login== 0) 
{
	$_SESSION["username"] = $login;
	setcookie("Auth", 1, time()+3600);  /* expire in 15 Minutes */
	header('Location: logged-in.php');
} 
else
{
?>
<tr><td colspan="2" style="text-align:center;"><br/><p style="color:#FF0000;">
<center>
<img src="../images/slap1.jpg">
</center>
</p></td></tr>
<?php
} 
?>






</body>
</html>
