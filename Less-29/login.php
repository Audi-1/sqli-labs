<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-29 Protection with WAF</title>
</head>

<body bgcolor="#000000">
<div style=" margin-top:70px;color:#FFF; font-size:40px; text-align:center">Welcome&nbsp;&nbsp;&nbsp;<font color="#FF0000"> Dhakkan </font><br>
<font size="3" color="#FFFF00">


<?php
//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");
//disable error reporting
error_reporting(0);

// take the variables 
if(isset($_GET['id']))
{
	$qs = $_SERVER['QUERY_STRING'];
	$hint=$qs;
	$id1=java_implimentation($qs);
	$id=$_GET['id'];
	//echo $id1;
	whitelist($id1);
	
	//logging the connection parameters to a file for analysis.
	$fp=fopen('result.txt','a');
	fwrite($fp,'ID:'.$id."\n");
	fclose($fp);
	
	
	

// connectivity 
	$sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row)
	{
	  	echo "<font size='5' color= '#99FF00'>";	
	  	echo 'Your Login name:'. $row['username'];
	  	echo "<br>";
	  	echo 'Your Password:' .$row['password'];
	  	echo "</font>";
  	}
	else 
	{
		echo '<font color= "#FFFF00">';
		print_r(mysql_error());
		echo "</font>";  
	}
}
	else { echo "Please input the ID as parameter with numeric value";}










//WAF implimentation with a whitelist approach..... only allows input to be Numeric.
function whitelist($input)
{
	$match = preg_match("/^\d+$/", $input);
	if($match)
	{
		//echo "you are good";
		//return $match;
	}
	else
	{	
		header('Location: hacked.php');
		//echo "you are bad";
	}
}



// The function below immitates the behavior of parameters when subject to HPP (HTTP Parameter Pollution).
function java_implimentation($query_string)
{
	$q_s = $query_string;
	$qs_array= explode("&",$q_s);


	foreach($qs_array as $key => $value)
	{
		$val=substr($value,0,2);
		if($val=="id")
		{
			$id_value=substr($value,3,30); 
			return $id_value;
			echo "<br>";
			break;
		}

	}

}

?>
</font> </div></br></br></br><center>
<img src="../images/Less-29.jpg" />
</br>
</br>
</br>
<img src="../images/Less-29-1.jpg" />
</br>
</br>
<font size='4' color= "#33FFFF">
<?php
echo "Hint: The Query String you input is: ".$hint;

?>
<br>
<br>
Reference:
<br>
<a href="https://www.owasp.org/images/b/ba/AppsecEU09_CarettoniDiPaola_v0.8.pdf">AppsecEU09_CarettoniDiPaola_v0.8.pdf</a><br>
<a href="https://community.qualys.com/servlet/JiveServlet/download/38-10665/Protocol-Level Evasion of Web Application Firewalls v1.1 (18 July 2012).pdf">https://community.qualys.com/servlet/JiveServlet/download/38-10665/Protocol-Level Evasion of Web Application Firewalls v1.1 (18 July 2012).pdf</a>

</font> 
</center>
</body>
</html>





 
