<?php

//including the mysqli connect parameters.
include("../sql-connections/db-creds.inc");
@error_reporting(0);
@$con = mysqli_connect($host,$dbuser,$dbpass);
// Check connection
if (!$con)
{
    echo "Failed to connect to mysqli: " . mysqli_error();
}


    @mysqli_select_db($con,$dbname) or die ( "Unable to connect to the database: $dbname");






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




 
