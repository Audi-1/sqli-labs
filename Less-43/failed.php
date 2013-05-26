<?PHP
session_start();
if (!isset($_COOKIE["Auth"]))
{
	if (!isset($_SESSION["username"])) 
	{
   		header('Location: index.php');
	}
	header('Location: index.php');
}
?>
<html>
<head>
</head>
<body bgcolor="#000000">
<div align="right">
<a style="font-size:.8em;color:#FFFF00" href='index.php'><img src="../images/Home.png" height='45'; width='45'></br>HOME</a>
</div>
</div>
<div style=" margin-top:150px;color:#FFF; font-size:24px; text-align:center">
<center>
<img src="../images/slap1.jpg">
</center>
</div> 
</body>
</html>
