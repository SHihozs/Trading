<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?PHP
	$link=mysqli_connect("localhost","root","123456","website");
	mysqli_set_charset($link,"utf8");
	
	$sql ="use website";
	$result=mysqli_query($link,$sql);
	
	//upload ไฟล์ ภาพ
	if(move_uploaded_file($_FILES["customer_picture"]["tmp_name"],"db_cuspicture/" . $_FILES["customer_picture"]["name"]))
	
		
	    $inputcususername=$_POST['customer_username'];
	    $inputcuspassword=$_POST['customer_password'];
		$inputcusname=$_POST['customer_name'];
		$inputcussurname=$_POST['customer_surname'];
		$inputcusemail=$_POST['customer_email'];
		$inputcussex=$_POST['customer_sex'];
	    $inputcusphone=$_POST['customer_phone'];
	    $inputcusaddress=$_POST['customer_address'];
		$inputcuspicture=$_FILES["customer_picture"]["name"];
		
		$sql="INSERT INTO db_info(db_username,db_password,db_name,db_surname,db_email,db_sex,db_phone,db_address,db_picture)values('$inputcususername','$inputcuspassword','$inputcusname','$inputcussurname','$inputcusemail','$inputcussex',' $inputcusphone','$inputcusaddress','$inputcuspicture')";
	
	    $result=mysqli_query($link,$sql);
	
	    if($result)
	{
		header("location:insertok.php");
	}
	else
	{
		echo"Insertfailed" . mysqli_error($link);
		header("Location:inserterror.php");
	}
	
	mysqli_close($link);
	
	
	
	?>
	
</body>
</html>