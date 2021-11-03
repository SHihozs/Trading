<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
<?PHP
	//เริ่มการเก็บรูปภาพ และข้อมูลที่มาจากฟอร์ม
		//ถ้ามีการอัปโหลดรูปใหม่
	if(move_uploaded_file($_FILES["sendeditproductpicture"]["tmp_name"],"db_productpicture/".$_FILES["sendeditproductpicture"]["name"]))
	{
		$editproductimg = $_FILES['sendeditproductpicture']["name"];
	}
	else //ถ้าไม่มีการอัปโหลดรูปใหม่
	{
		$editproductimg = $_POST['sendoldproductpicture'];
	}
	if($_POST) //if ตรวจสอบตัวแปรที่ส่งมา
	{
		    $editproductid = $_POST['sendeditproductid'];
			$editproductname = $_POST['sendeditproductname'];
			$editproductdetail =$_POST['sendeditproductdetail'];
			$editproductprice= $_POST['sendeditproductprice'];
			$editproductstock = $_POST['sendeditproductstock'];
			//$editproductpicture= $FILES['sendeditproductpicture']["name"];
		
		
		//ทดสอบตัวแปรที่ส่งค่ามาจากหน้าฟอร์ม
	//echo "<br>$editproductid , $editproductname , $editproductdetail ,$editproductprice , $editproductstock , $editproductimg <br>";
	
	
	
	$link=mysqli_connect("localhost","root","123456","website");
    mysqli_set_charset($link,"utf8");
		
	$sql="use website";
	$result=mysqli_query($link,$sql);
	
	$sql="UPDATE db_product SET db_productname='$editproductname',db_productdetail='$editproductdetail',db_productprice='$editproductprice',db_productstock='$editproductstock',db_productpicture='$editproductimg' where db_productid='$editproductid'";
	$result=mysqli_query($link,$sql);
	
	if($result)
	{
		header("location:editok.php");
		mysqli_close($link);
	}
	else
	{
		header("Location:editerror.php");
	}
	}
?>
	
	<form>
	
	<input name="edit again" type="submit" id="edit again" formaction="form_adminmainpage_edit.php" value="Edit again">
	
	<input name="back to administator page" type="submit" id="back to administator page" formaction="mainpage_admin.php" value="Back to administator page">
	</form>
</body>
</html>