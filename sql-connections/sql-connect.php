<?php

//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");
@error_reporting(0);
@$con = new mysqli($host,$dbuser,$dbpass,$dbname);
// Check connection
if ($con->connect_error)
{
    echo "Failed to connect to MySQL: " . $con->connect_error;
}








$sql_connect = "SQL Connect included";
############################################
# For Less-24
$form_title_in="Please Login to Continue";
$form_title_ns="New User";
$feedback_title_ns="New User";
$form_title_ns= "Less-24";

############################################
# For Challenge series--- Randomizing the Table names.

?>




 
