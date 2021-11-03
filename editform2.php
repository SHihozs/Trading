<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" href="edit.css">	
<body>
	<?PHP
	
	$id_product=$_POST['product_id'];
	//ทดลองแสดงตัวแปรที่ส่งมา
	//echo "<center> <font color=red>$sendeditproduct_id </font> </center>";
	
	$link=mysqli_connect("localhost","root","123456","website");
	mysqli_set_charset($link,"utf8");
	
	$sql="SELECT * FROM db_product WHERE db_productid = '$id_product'";
	$result=mysqli_query($link,$sql);


	
	if(!$result) //ตรวจสอบว่าเจอตารางมั้ย?
	{
		echo "mysqli_error($link)";
	}
	else if(mysqli_num_rows($result)==0)//ตรวจสอบไม่เจอ
	{
		echo "<center><h1>No DATA ";
		exit();
		
		
	}
	else{//เริ่มอ่านค่าจากฐานข้อมูล

	
		while($data =mysqli_fetch_array($result))
		{
			//เริ่มการตรวจสอบว่าLogin ถูกมั้ย
			$editproductid = $data['db_productid'];
			$editproductname = $data['db_productname'];
			$editproductdetail =$data['db_productdetail'];
			$editproductprice= $data['db_productprice'];
			$editproductstock = $data['db_productstock'];
			$editproductpicture= $data['db_productpicture'];
			/* ทดสอบแสดงข้อมูลูกค้าก่อนแก้ไข
			echo "<tr><td><B>รหัสลูกค้า</td><td>$editcusid</td></tr>";
			echo "<tr><td><B>ชื่อลูกค้า</td><td>$editcusname</td></tr>";
			echo "<tr><td><B>User Nameลูกค้า</td><td>$editcususername</td></tr>";
			echo "<tr><td><B>Passwordลูกค้า</td><td>$editcuspassword</td></tr>";
			echo "<tr><td><B>ที่อยู่ลูกค้า</td><td>$editcusaddress</td></tr>";
			echo "<tr><td><B>รูปลูกค้า</td><td><img src='cusphoto/$editcusimg' width=100 height=100></td></tr>";
			*/
		}//end while อ่านค่าจากตารางลูกค้า
		
		
		
	}//end else จากการอ่านฐานข้อมูล
	//mysqli_close($link);
	?>
	<!--เริ่มฟอร์มส่งข้อมูลสำหรับแก้ไขข้อมูลลูกค้า-->
    <div class="editbox">
	<table  border='0'  align='center'>
	<tr><td colspan=2> <B><center><h1>ข้อมูลสินค้า</td></tr>
	<form method="post" action="admin_editdata.php" enctype="multipart/form-data">
	
<tr><td><B>รหัสสินค้า</td><td>
	<input type="text" name="sendeditproductid" readonly value="<?PHP echo $editproductid ?>">*ไม่สามารถแก้ไขได้*</td></tr>
	
	<tr><td><B>ชื่อสินค้า</td><td>
	<input type="text" name="sendeditproductname" value="<?PHP echo $editproductname ;?>"></td></tr>
	
	<tr><td><B>ข้อมูลสินค้า</td><td>
	<input type="text" name="sendeditproductdetail" value="<?PHP echo $editproductdetail ;?>"></td></tr>
	
	<tr><td><B>ราคาสินค้า</td><td>
	<input type="number" name="sendeditproductprice" value="<?PHP echo $editproductprice; ?>"></td></tr>
	
	<tr><td><B>จำนวนสินค้า</td><td>
	<input type="number" name="sendeditproductstock" value="<?PHP echo $editproductstock; ?>"></td></tr>
	
	
	<tr><td><B>รูปสินค้า</td><td><?PHP echo "<img src='db_productpicture/$editproductpicture' width='100' height='100'>" ;?></td></tr>
		
	<input type=hidden name="sendoldproductpicture" value=<?PHP  echo $editproductpicture ?>  >
	
	<tr><td><B>แก้ไขรูปสินค้า</td><td><input type="file" name="sendeditproductpicture"></td></tr>
	
	<tr><td colspan="2"><center><input type="submit" value="Save"><input type="reset" value="Reset"></center></td></tr>
		
	</form>
		</div>
</body>
</html>