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
//including the mysqli connect parameters.
include("../sql-connections/db-creds.inc");






function sqllogin($host,$dbuser,$dbpass, $dbname){
   // connectivity
//mysqli connections for stacked query examples.
$con1 = mysqlii_connect($host,$dbuser,$dbpass, $dbname);
   
   $username = mysqlii_real_escape_string($con1, $_POST["login_user"]);
   $password = $_POST["login_password"];

   // Check connection
   if (mysqlii_connect_errno($con1))
   {
       echo "Failed to connect to mysqli: " . mysqlii_connect_error();
   }
   else
   {
       @mysqlii_select_db($con1, $dbname) or die ( "Unable to connect to the database ######: ");
   }


   /* execute multi query */

   
   $sql = "SELECT * FROM users WHERE username=('$username') and password=('$password')";
   if (@mysqlii_multi_query($con1, $sql))
   {
        /* store first result set */
      if($result = @mysqlii_store_result($con1))
      {
	 if($row = @mysqlii_fetch_row($result))
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
