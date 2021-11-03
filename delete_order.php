<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ยกเลิกรายการอาหารที่เลือกไว้</title>
</head>
<link rel="stylesheet" type="text/css" href="regis.css">
<body background="etc.jpg">
	<?PHP
	if($_GET)
	{
		$delselectproductid=$_GET['sendid'];
		
		$returnproductid =$_GET['sendproductid']; //ตัวแปร 	สำหรับ คืนค่าstock ในตารางสินค้า
		
		$returnproductstock =$_GET['sendreturnproductstock'];//ตัวแปรสำหรับ คืนค่าstock ในตารางสินค้า
		
		//ทดลองรับค่าตัวแปรที่ส่งมา
		//echo " ตัวแปรสำหรับลบรายการอาหารที่ยกเลิก : $delselectfoodid ";
		//echo "<font color=red>$delselectproductid , $retrunproductid ,$returnproductstock</font> ";
	 
		//เริ่มต้นลบข้อมูลรายการอาหารที่ยกเลิก
	$link =mysqli_connect("localhost","root","123456","website") or die(mysqli_connect_error()."</body></html>");
	$sql ="DELETE FROM db_select WHERE autoselect ='$delselectproductid' ";
	$cancelselectproduct  = mysqli_query($link,$sql);
		
	    echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
	    echo"<br>";
		echo"<br>";
	    echo"<br>";
		echo"<br><center><h2>ยกเลิกรายการอาหารที่ท่านเลือกเรียบร้อยแล้ว</h2></center></br>" ;
	
		
	//กลับไปเพิ่มข้อมูลสินค้าในstock ให้เท่าเดิม		
$link2=mysqli_connect("localhost","root","123456","website")
    or die("Error connect to database");
mysqli_set_charset($link2, "utf8"); //รับข้อมูลจาก MySQL ให้เป็นภาษาไทย
 
		//นำจำนวนสินค้าที่เลือกแล้วcancel มาคืนในstock
		$sql2 = "SELECT * FROM db_product WHERE db_productid='$returnproductid' ";
		//echo"$returnproductid";
		$result=mysqli_query($link2,$sql2);
		
		if(!$result)
	{
		echo mysqli_error($link2);
		
	}
	else if (mysqli_num_rows($result)==0)
		{
			echo "<center><h4>No Data</h></center>";
		}
	else
	{
		while ($data =mysqli_fetch_array($result))
		{
		//echo "<center><font color= blue>{$data['productstock']}</font>";
			$oldstock =$data['db_productstock'];
			//echo"$oldstock";
		}
		
		//echo "<font color=red><center> $retrunproductid ,$returnproductstock , $oldstock</font>";
		$netstock =$returnproductstock + $oldstock;
		//echo"$netstock , $returnproductstock , $oldstock";
		
		
	
	}
		
		//โค๊ดเพิ่มสินค้าจากที่เลือกแล้วยกเลิกกลับเข้าไปยัง stock
$sql3 = "UPDATE db_product SET db_productstock = '$netstock' WHERE db_product.db_productid = '$returnproductid'" ; 
	mysqli_query($link2,$sql3);
	
	
	echo "<center><h2>อีก 5 วินาที กลับไปหน้าเลือกเดิม</center>";	
   header("Refresh: 5  ; url = order2.php");//คำสั่งไปหน้าอื่น


//exit();
		
		
		}//ปิด if  บรรทัดif($_GET)
	
	?>

</body>
</html>