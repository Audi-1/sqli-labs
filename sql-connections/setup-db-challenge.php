<html>
<head>
</head>
<body bgcolor="#000000">
<?php
//including the mysqli connect parameters
include '../sql-connections/db-creds.inc';

@error_reporting(0);
if(isset($_GET['id']))
$id = $_GET['id'];
//echo $id;

// Check connection
@$con = mysqli_connect($host,$dbuser,$dbpass);
if (!$con)
{
    echo "Failed to connect to mysqli: " . mysqli_error();
}


//purging Old Database for challenges	
	$sql="DROP DATABASE IF EXISTS $dbname1";
	if (mysqli_query($con,$sql))
		{echo "[*]...................Old database purged if exists"; echo "<br><br>\n";}
	else 
		{echo "[*]...................Error purging database: " . mysqli_error(); echo "<br><br>\n";}




//Creating new database for challenges
	$sql="CREATE database $dbname1 CHARACTER SET `gbk` ";
	if (mysqli_query($con,$sql))
		{echo "[*]...................Creating New database successfully";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating database: " . mysqli_error();echo "<br><br>\n";}

include '../sql-connections/functions.php';



// Creating table 
$sql="CREATE TABLE IF NOT EXISTS $dbname1.$table
		(
                id INT(2) UNSIGNED NOT NULL DEFAULT 1,
		sessid CHAR(32) PRIMARY KEY NOT NULL,
		$secret_key CHAR(32) NOT NULL,
		tryy INT(11) UNSIGNED NOT NULL DEFAULT 0 
		)";
	if (mysqli_query($con,$sql))
		{echo "[*]...................Creating New Table '$table' successfully";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating Table: " . mysqli_error();echo "<br><br>\n";}


// creating random key
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; //characterset for generating random data
$sec_key = num_gen(24, $characters);
$hash = md5(rand(0,100000));

//inserting Dummy data into table
$sql="INSERT INTO $dbname1.$table VALUES (1, '$hash', '$sec_key', 0)";
        if (mysqli_query($con,$sql))
		{echo "[*]...................Inserted data correctly  into table '$table'";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error inserting data: " . mysqli_error();echo "<br><br>\n";}

echo "[*]...................Inserted secret key '$secret_key' into table ";echo "<br><br>\n";

if(isset($id))
header( "refresh:0;url=$id" );

?>
</body>
</html>
