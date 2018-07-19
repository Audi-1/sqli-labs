<?php

//including the Mysql connect parameters.
include("../sql-connections/db-creds.inc");
error_reporting(0);

//mysql connections for stacked query examples.
$con1 = new mysqli($host,$dbuser,$dbpass,$dbname1);

// Check connection
if ($con1->connect_errno)
{
    echo "Failed to connect to MySQL: " . $con1->connect_error;
}



?>




 
