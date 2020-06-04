<?php
error_reporting(0);
include("../sql-connections/db-creds.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-39 **stacked Query Intiger type**</title>
</head>

<body bgcolor="#000000">
<div style=" margin-top:70px;color:#FFF; font-size:23px; text-align:center">Welcome&nbsp;&nbsp;&nbsp;<font color="#FF0000"> Dhakkan </font><br>
<font size="3" color="#FFFF00">


<?php




// take the variables 
if(isset($_GET['id']))
{
$id=$_GET['id'];
//logging the connection parameters to a file for analysis.
$fp=fopen('result.txt','a');
fwrite($fp,'ID:'.$id."\n");
fclose($fp);

// connectivity
//mysqli connections for stacked query examples.
$con1 = mysqlii_connect($host,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqlii_connect_errno($con1))
{
    echo "Failed to connect to mysqli: " . mysqlii_connect_error();
}
else
{
    @mysqlii_select_db($con1, $dbname) or die ( "Unable to connect to the database: $dbname");
}



$sql="SELECT * FROM users WHERE id=$id LIMIT 0,1";
/* execute multi query */
if (mysqlii_multi_query($con1, $sql))
{
    
    
    /* store first result set */
    if ($result = mysqlii_store_result($con1))
    {
        if($row = mysqlii_fetch_row($result))
        {
            echo '<font size = "5" color= "#00FF00">';	
            printf("Your Username is : %s", $row[1]);
            echo "<br>";
            printf("Your Password is : %s", $row[2]);
            echo "<br>";
            echo "</font>";
        }
//            mysqlii_free_result($result);
    }
        /* print divider */
    if (mysqlii_more_results($con1))
    {
            //printf("-----------------\n");
    }
     //while (mysqlii_next_result($con1));
}
else 
    {
	echo '<font size="5" color= "#FFFF00">';
	print_r(mysqlii_error($con1));
	echo "</font>";  
    }
/* close connection */
mysqlii_close($con1);

}
	else { echo "Please input the ID as parameter with numeric value";}

?>
</font> </div></br></br></br><center>
<img src="../images/Less-39.jpg" /></center>
</body>
</html>





 
