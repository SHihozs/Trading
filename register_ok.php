<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
</head>

<body>
	<?PHP
	$link=mysqli_connect("localhost","root","123456","website");
	mysqli_set_charset($link,"utf8");
	
	//upload ไฟล์ ภาพ
	if(move_uploaded_file($_FILES["picture"]["tmp_name"],"db_cuspicture/" . $_FILES["picture"]["name"]))
	
	$db_username=$_POST['username'];
	$db_password=$_POST['password'];
	$db_name=$_POST['name'];
	$db_surname=$_POST['surname'];
	$db_email=$_POST['email'];
	$db_sex=$_POST['sex'];
	$db_phone=$_POST['phone'];
	$db_address=$_POST['address'];
	$db_picture=$_FILES["picture"]["name"];
	
	
	$sql ="use website";
	$result=mysqli_query($link,$sql);
	
	$sql="INSERT INTO db_info(db_username,db_password,db_name,db_surname,db_email,db_sex,db_phone,db_address,db_picture) values('$db_username','$db_password','$db_name','$db_surname','$db_email','$db_sex','$db_phone','$db_address','$db_picture')";
	$result=mysqli_query($link,$sql);
	
	if($result)
	{
		header("location:regis_ok_form.php");
	}
	else
	{
		echo"Register failed" . mysqli_error($link);
		header("Location:error_regis_form.php");
	}
	
	mysqli_close($link);
	?>
	
</body>
</html>