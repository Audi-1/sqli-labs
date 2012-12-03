<?php
echo "we are alive";
$qs = $_SERVER['QUERY_STRING'];
echo "<br>";
echo $qs;
echo "<br>";
$qs_ans=java_implimentation($qs);
echo $qs_ans;



function java_implimentation($query_string)
{
	$q_s = $query_string;
	$qs_array= explode("&",$q_s);


	foreach($qs_array as $key => $value)
	{
	$val=substr($value,0,2);
		if($val=="id")
		{
			$id_value=substr($value,3,3); 
			return $id_value;
			echo "<br>";
			break;
		}

	}

}
?>
