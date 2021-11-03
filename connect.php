<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Connect</title>
</head>

<body>
     <?PHP
	$link=mysqli_connect("localhost","root","123456","website")
    or die("Error connect to database");
	mysqli_set_charset($link,"utf8");	
	
	?>
</body>
</html>