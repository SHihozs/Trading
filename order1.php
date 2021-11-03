<?PHP
session_start();
$user=$_SESSION["sessionusername"];
echo"<font color='FFFFFF' size='+3'>Welcome  $user </font>";

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="styletable.css">
</head>

<body>
	<?PHP
	
	$link=mysqli_connect("localhost","root","123456","website")
    or die("Error connect to database");
	mysqli_set_charset($link,"utf8");	
	
	$sql = "SELECT * FROM db_product";
	$result=mysqli_query($link,$sql);
	
	if(!$result)
	{
		echo"mysqli_error($link)";
		
	}
	elseif(mysqli_num_rows($result)==0)
	{
		echo"No data";
	}
	
	else{
	$all=mysqli_num_rows($result); //สร้างตัวแปรนับจำนวนข้อมูลที่มีทั้งหมด
	    echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=8><center><font size='5px'><B>ตารางเเสดงสินค้า</font></center></td></tr>";
		
		echo"<tr><td><center><font size='4px'><B>Product_id</font></center></td>
		         <td><center><font size='4px'><B>Product_name</font></center></td>
				 <td><center><font size='4px'><B>Product_detail</font></center></td>
				 <td><center><font size='4px'><B>Product_price</font></center></td>
				 <td><center><font size='4px'><B>Product_stock</font></center></td>
				 <td><center><font size='4px'><B>Product_picture</font></center></td>
				 <td><center><font size='4px'><B>select num order</font></center></td>
				 <td><center><font size='4px'><B>Click</font></center></td>
				 </tr>";
		
	//เริ่มอ่านข้อมูลตารางอาหารจาก mySQL
	while($data=mysqli_fetch_array($result))
		{
			echo"<tr>";
			echo"<td><center><font size='3px'><B>{$data['db_productid']}</font></center></td>";
			echo"<td><center><font size='3px'><B>{$data['db_productname']}</font></center></td>";
			echo"<td><center><font size='3px'><B>{$data['db_productdetail']}</font></center></td>";
			echo"<td><center><font size='3px'><B>{$data['db_productprice']}</font></center></td>";
			echo"<td><center><font size='3px'><B>{$data['db_productstock']}</font></center></td>";
		//ดึงข้อมูลชื่อรูปภาพจากSQL มาเก็บไว้ในตัวแปร $picture แล้วค่อยนำไปแสดง
			$picture=$data['db_productpicture'];
			
			echo"<td><center><img src='db_productpicture/$picture' width=100 height=100></center></td>";
		
		?>
		<!-- เริ่มต้นโค๊ดสั่งอาหาร -->
		
	<form action="addselect.php" name ="selectorder" method="post">
		<!-- รับค่าจำนวนอาหารที่สั่ง -->
			<td><input type="number" name="selectproductstock"></td>
		    <td><center><input type='image' name='submit' src='select.png' border='0' width='60'></center></td></tr>
		
		<!-- เก็บค่าfoodidที่เลือก -->
			<input type="hidden" name="selectproductid" 
			value="<?php echo $data['db_productid'] ; ?>">
			<!-- เก็บค่าfoodnameที่เลือก -->
			<input type="hidden" name="selectproductname" 
			value="<?php echo $data['db_productname'] ; ?>">
			<!-- เก็บค่าfoodpriceที่เลือก -->
			<input type="hidden" name="selectproductprice" 
			value="<?php echo $data['db_productprice'] ; ?>">
			<!-- เก็บค่าfoodPhoto ที่เลือก -->
			<input type="hidden" name="selectproductimg" 
			value="<?php echo $picture ; ?>">
			<!-- เก็บค่าfoodstockที่มี ที่เลือก -->
			<input type="hidden" name="productstock" 
			value="<?php echo $data['db_productstock'] ; ?>">

			
		</form>
		
		<?PHP
	}//close while
	//สรุปข้อมูลในตาราง
	echo "<tr><td colspan=7><B><center>มีข้อมูลทั้งหมด $all รายการ</td></tr>";
	echo "</table >";
}
	?><!-- จบการทำงานของ SQL-->
	
	<div class="button">
  <form>
	  
	 <center>
		 <br>
		 <input name="search" type="submit"  formaction="searchformuser.php" formmethod="POST" value="Search">
         </br>
		</center>
	  
  </form>
</div>
		
</body>
</html>