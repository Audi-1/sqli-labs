<?php

//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");

$con = mysql_connect($host,$dbuser,$dbpass);

//mysql_select_db($dbname,$con);
@mysql_select_db($dbname,$con) or die( "Unable to connect to the database: $dbname");


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
?>




 
