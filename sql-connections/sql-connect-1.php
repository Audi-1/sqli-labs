<?php

//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");
@error_reporting(0);
@$con = new mysqli($host,$dbuser,$dbpass,$dbname1);
// Check connection
if ($con->connect_errno)
{
    echo "Failed to connect to MySQL: " . $con->connect_error;
}








$sql_connect_1 = "SQL Connect included";

############################################
# For Challenge series--- Randomizing the Table names.

?>




 
