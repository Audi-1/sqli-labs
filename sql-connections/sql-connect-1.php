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


    @mysqli_select_db($con,$dbname1) or die ( "Unable to connect to the database: $dbname1".mysqli_error($con));





$sql_connect_1 = "SQL Connect included";

############################################
# For Challenge series--- Randomizing the Table names.

?>




 
