<?php

//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");
error_reporting(0);
$con = mysql_connect($host,$dbuser,$dbpass);

//mysql_select_db($dbname,$con);
@mysql_select_db($dbname,$con) or die( "Unable to connect to the database: $dbname");


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
############################################
# For Less-24
$form_title_in="Please Login to Continue";
$form_title_ns="New User";
$feedback_title_ns="New User";
$form_title_ns= "Less-24";
?>




 
