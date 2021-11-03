<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" href="regis.css">
<body background="etc.jpg">
	<?PHP
	//รับข้อมูลจากการเลือก
 if(isset($_POST))
 { //open if บรรทัด34
	 	if($_POST)
		{
		$selectproductid = $_POST['selectproductid'];
		$selectproductstock = $_POST['selectproductstock'];
		$selectproductprice =$_POST['selectproductprice'];
		$selectproductimg =$_POST['selectproductimg'];
		$selectproductname =$_POST['selectproductname'];
		$stockproduct =$_POST['productstock'];
		
	/* ทดสอบตัวแปรที่รับมาจากหน้าการเลือกอาหาร
		echo " $selectfoodid ,$selectfoodname , $selectfoodstock , $selectfoodprice , $selectfoodimg , $stockfood  ";*/
	
	//<!--เริ่มต้นเพิ่มข้อมูลลงในตารางการเลือกอาหาร-->
	
	//เชื่อมต่อขั้นแรกกับSQL
	$link=mysqli_connect("localhost","root","123456","website") or die("Error connect to database");
	mysqli_set_charset($link,"utf8");	
					
		//เพิ่มข้อมูลจากฟอร์มลงฐานข้อมูล
		$sql = "INSERT INTO db_select VALUES('','$selectproductid','$selectproductname','$selectproductstock','$selectproductprice','$selectproductimg')";
		
		//ทดสอบค่าตัวแปรต่างๆที่เก็บเข้าฐานข้อมูล
	
	//echo " <br>$selectfoodid ,$selectfoodname, $selectfoodstock ,$selectfoodprice,$selectfoodimg";
		
		mysqli_query($link,$sql);//ประมวลผลคำสั่งเพิ่มข้อมูลลงในฐานข้อมูล
			
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
	    			
        echo "<center><h2><br>เพิ่มรายการอาหารที่เลือกแล้ว</h></center>";
	
	 
			
			//โค๊ดลดจำนวนอาหารในstockของร้าน
			
$link1=mysqli_connect("localhost","root","123456","website") or die("Error connect to database");
	mysqli_set_charset($link,"utf8");	
			
			$netstock = $stockproduct-$selectproductstock; //นำจำนวนสินค้าในstock มาลบกับจำนวนที่เลือกไว้
$sql1 = "UPDATE db_product SET db_productstock = '$netstock' WHERE db_product.db_productid = '$selectproductid'" ; //โค๊ดลดจำนวนอาหารในstock
	//"UPDATE  tbfood SET  foodstock = $netstock WHERE foodid = $selectfoodid ";
			mysqli_query($link1,$sql1);
			
			//echo "$selectfoodid , $netstock , $sql1 <br>";
			//echo "<br>ลดจำนวนสินค้าในสต๊อกแล้ว";
 }
 }
	
		
	echo"<center><h2> อีก 5 วินาที ไปหน้าถัดไป <p>";
	

header("Refresh: 5  ; url = order2.php");//คำสั่งไปหน้าอื่น
exit();
	?>
</body>
</html>