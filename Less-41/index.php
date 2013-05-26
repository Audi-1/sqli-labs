<?php
error_reporting(0);
include("../sql-connections/db-creds.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-41 **stacked Query Intiger type blind**</title>
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
//mysql connections for stacked query examples.
$con1 = mysqli_connect($host,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno($con1))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    @mysqli_select_db($con1, $dbname) or die ( "Unable to connect to the database: $dbname");
}



$sql="SELECT * FROM users WHERE id=$id LIMIT 0,1";
/* execute multi query */
if (mysqli_multi_query($con1, $sql))
{
    
    
    /* store first result set */
    if ($result = mysqli_store_result($con1))
    {
        if($row = mysqli_fetch_row($result))
        {
            echo '<font size = "5" color= "#00FF00">';	
            printf("Your Username is : %s", $row[1]);
            echo "<br>";
            printf("Your Password is : %s", $row[2]);
            echo "<br>";
            echo "</font>";
        }
//            mysqli_free_result($result);
    }
        /* print divider */
    if (mysqli_more_results($con1))
    {
            //printf("-----------------\n");
    }
     //while (mysqli_next_result($con1));
}


/* close connection */
mysqli_close($con1);


}
	else { echo "Please input the ID as parameter with numeric value";}

?>
</font> </div></br></br></br><center>
<img src="../images/Less-41.jpg" /></center>
</body>
</html>





 
