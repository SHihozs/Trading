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
</head>
<link rel="stylesheet" type="text/css" href="styletable.css">
<body>

	<?PHP
	$netprice=0;//กำหนดตัวแปรค่าอาหารรวม
	$allorder;
	$detailorder="";
	echo"<br>";
	
	$link=mysqli_connect("localhost","root","123456","website") or die("Error connect to database");
	mysqli_set_charset($link,"utf8");	
	$sql = "SELECT * FROM db_select";
	$result=mysqli_query($link,$sql);				
	
	
	if(!$result)
	{
		echo mysqli_error($link);
		
	}
	else if (mysqli_num_rows($result)==0)
		{
			echo "<center><h4>No Data</h></center>";
		}
else{
	$all=mysqli_num_rows($result); //สร้างตัวแปรนับจำนวนข้อมูลที่มีทั้งหมด
	echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=8><center><font size='5px'><B>ตารางเเสดงข้อมูลสินค้าที่เลือก</font></center></td></tr>";
	echo "<tr><td><center><font size='4px'><B>ลำดับที่</font></center></td>
			  <td><center><font size='4px'><B>รหัสสินค้า</font></center></td>
			  <td><center><font size='4px'><B>ชื่อสินค้า</font></center></td>
			  <td><center><font size='4px'><B>จำนวนสินค้าที่สั่ง</font></center></td>
			  <td><center><font size='4px'><B>ราคาสินค้า</font></center></td>
			  <td><center><font size='4px'><B>รูปภาพสินค้า</font></center></td>
			  <td><center><font size='4px'><B>ราคาสินค้าที่สั่ง</font></center></td>
			  <td><center><font size='4px'><B>ยกเลิกสินค้าที่สั่ง</font></center></td>
		
		</tr>";
	//เริ่มอ่านข้อมูลตารางอาหารจาก mySQL
	$noorder=0; //ตัวแปรจำนวนเมนูที่สั่งเริ่มจาก1
	while ($data =mysqli_fetch_array($result))
	{
		$noorder ++;//เพิ่มตัวแปรจำนวนเมนู
		echo "<tr>	<td><center>$noorder</td>
					<td><center><B>{$data['selectproductid']}</td>
					<td><center><B>{$data['selectproductname']} </td>
					<td><center><B>{$data['selectproductstock']} </td>
					<td><center><B>{$data['selectproductprice']} </td>";
					
	//ดึงข้อมูลชื่อรูปภาพจากSQL มาเก็บไว้ในตัวแปร $selectproductimg แล้วค่อยนำไปแสดง
		$selectproductimg = $data['selectproductimg'];
		//แสดงรูปอาหาร
		echo "<td><center><img src='db_productpicture/$selectproductimg' width=100 height=100></td>";
		//คำนวณราคาอาหาร จากจำนวนที่สั่ง และราคาอาหารที่ขาย
        $sumpriceproduct= $data['selectproductprice']*$data['selectproductstock'];
		
		
		//สร้างตัวแปรเก็บข้อมูลอาหารที่สั่ง
		$allorder = $data['selectproductname'] .',จำนวน'. $data['selectproductstock']. ',ราคา'.$data['selectproductprice'].'/';
		
		$detailorder = " $detailorder "." $allorder ";
		
		echo "<td><center>$sumpriceproduct</td>";
		
		$netprice +=$sumpriceproduct;
		//$noorder ++;//เพิ่มตัวแปรจำนวนเมนู
		
		//ทดลองยกเลิกเมนูอาหารที่เลือก
		$cancelselectid=$data['autoselect'];
		$cancelproductstock =$data['selectproductstock'];
		$cancelproductid = $data['selectproductid'];
		
		echo "<td><center><a href =\"delete_order.php?action=cancelselectorder&sendid=$cancelselectid &sendproductid=$cancelproductid&sendreturnproductstock=$cancelproductstock\"> 
		<img src ='cancel.png' border='0' width='50'></a> 
		</td>";
		
		echo"</tr>";
		
		
	} // end while
echo "<tr>
<td colspan=7><B><center>มีข้อมูลทั้งหมด $all รายการ</td>
<td><center><B>$netprice</td>
</tr>";
	echo "</table >";
		}//end else ใหญ่
	
	?>
<center>
	<table border="0" >
	<tr><td><a href="order1.php"><input type='button' name='submit' value="ย้อนกลับ"></a></td>
    <form action="order3.php" method="post" name="orderall">

	<td><font color="#FFFFFF" size="+2"><B> กรุณาใส่วันที่สั่งอาหาร </font>  </td> <td><input type="date" name="dateorder"></td>
	<td><input type='image' name='submit' src='select.png' width='40'></td></tr>
	<input type="hidden" name="ordernum"  
	   		value="<?php echo $noorder ; ?>">
	<input type="hidden" name="orderdetail"  
	   		value="<?php echo $detailorder ; ?>">  
	<input type="hidden" name="totalprice" 
		   value="<?php echo $netprice ; ?>">   	
    <input type="hidden" name="user" 
		   value="<?php echo $user ; ?>">	
	</form>
</table>

</center>

	
</body>
</html>