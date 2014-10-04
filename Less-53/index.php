<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORDER BY Clause Blind based</title>
</head>

<body bgcolor="#000000">
<div style=" margin-top:70px;color:#FFF; font-size:23px; text-align:center">Welcome&nbsp;&nbsp;&nbsp;<font color="#FF0000"> Dhakkan </font><br>
<font size="3" color="#FFFF00">

<?php
include("../sql-connections/sqli-connect.php");
error_reporting(0);
$id=$_GET['sort'];	
if(isset($id))
{
	//logging the connection parameters to a file for analysis.
	$fp=fopen('result.txt','a');
	fwrite($fp,'SORT:'.$id."\n");
	fclose($fp);

	$sql="SELECT * FROM users ORDER BY '$id'";
	/* execute multi query */
	if (mysqli_multi_query($con1, $sql))
	{

		?>
		<center>
		<font color= "#00FF00" size="4">
		
		<table   border=1'>
		<tr>
			<th>&nbsp;ID&nbsp;</th>
			<th>&nbsp;USERNAME&nbsp;  </th>
			<th>&nbsp;PASSWORD&nbsp;  </th>
		</tr>
		</font>
		</font>
		<?php
			/* store first result set */
			if ($result = mysqli_store_result($con1))
			{
				while($row = mysqli_fetch_row($result))
				{
					echo '<font color= "#00FF11" size="3">';		
					echo "<tr>";
					echo "<td>";
					printf("%s", $row[0]);
					echo "</td>";
					echo "<td>";
					printf("%s", $row[1]);
					echo "</td>";
					echo "<td>";
					printf("%s", $row[2]);
					echo "</td>";
					echo "</tr>";
					echo "</font>";
					
				}
				
			}
	echo "</table>";
	}

}
else
{
	echo "Please input parameter as SORT with numeric value<br><br><br><br>";
	echo "<br><br><br>";
	echo '<img src="../images/Less-53.jpg" /><br>';	
}
?>
</font> 
</div>
</br>
</br>
</br>

</center> 
</body>
</html>
