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
include("../sql-connections/sql-connect.php");
$id=$_GET['sort'];	
if(isset($id))
	{
	//logging the connection parameters to a file for analysis.
	$fp=fopen('result.txt','a');
	fwrite($fp,'SORT:'.$id."\n");
	fclose($fp);

	$sql = "SELECT * FROM users ORDER BY '$id'";
	$result = mysql_query($sql);
	if ($result)
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
		while ($row = mysql_fetch_assoc($result))
			{
			echo '<font color= "#00FF11" size="3">';		
			echo "<tr>";
    			echo "<td>".$row['id']."</td>";
    			echo "<td>".$row['username']."</td>";
    			echo "<td>".$row['password']."</td>";
			echo "</tr>";
			echo "</font>";
			}	
		echo "</table>";
		
		}
	}	
	else
	{
		echo "Please input parameter as SORT with numeric value<br><br><br><br>";
		echo "<br><br><br>";
		echo '<img src="../images/Less-47.jpg" /><br>';
		echo "Lesson Concept and code by <b>D4rk</b>";
	}
?>
		
		
</font> </div></br></br></br>

</center> 
</body>
</html>
