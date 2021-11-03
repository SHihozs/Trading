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
	if(move_uploaded_file($_FILES["product_picture"]["tmp_name"],"db_productpicture/" . $_FILES["product_picture"]["name"]))
	
		
	
		$inputproductname=$_POST['product_name'];
		$inputproductdetail=$_POST['product_detail'];
		$inputproductprice=$_POST['product_price'];
		$inputproductstock=$_POST['product_stock'];
		$inputproductpicture=$_FILES["product_picture"]["name"];
		
		$sql="INSERT INTO db_product(db_productname,db_productdetail,db_productprice,db_productstock,db_productpicture)values('$inputproductname','$inputproductdetail','$inputproductprice','$inputproductstock','$inputproductpicture')";
	
	    $result=mysqli_query($link,$sql);
	
	    if($result)
	{
		header("location:insertok.php");
	}
	else
	{
		echo"Register failed" . mysqli_error($link);
		header("Location:inserterror.php");
	}
	
	mysqli_close($link);
	
	
	
	?>
	
</body>
</html>