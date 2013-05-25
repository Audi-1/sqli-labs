<?php

//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");
error_reporting(0);
$con = mysql_connect($host,$dbuser,$dbpass);
// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    @mysql_select_db($dbname,$con) or die ( "Unable to connect to the database: $dbname");
}






############################################
# For Less-24
$form_title_in="Please Login to Continue";
$form_title_ns="New User";
$feedback_title_ns="New User";
$form_title_ns= "Less-24";
?>




 
