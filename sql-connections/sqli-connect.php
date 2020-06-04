<?php

//including the mysqli connect parameters.
include("../sql-connections/db-creds.inc");
error_reporting(0);

//mysqli connections for stacked query examples.
$con1 = mysqlii_connect($host,$dbuser,$dbpass);

// Check connection
if (mysqlii_connect_errno($con1))
{
    echo "Failed to connect to mysqli: " . mysqlii_connect_error();
}
else
{
    @mysqlii_select_db($con1, $dbname) or die ( "Unable to connect to the database: $dbname");
}


?>




 
