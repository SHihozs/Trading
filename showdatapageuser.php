<?PHP
session_start();
$cususername=$_SESSION["sessionusername"];
echo"<font color='FFFFFF' size='+3'>Welcome  $cususername </font>";
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
	
	$link=mysqli_connect("localhost","root","123456","website")
    or die("Error connect to database");
	mysqli_set_charset($link,"utf8");	
	
	$sql="SELECT * FROM db_product";
	$result=mysqli_query($link,$sql);
	
	if(!$result)
	{
		echo"mysqli_error($link)";
		
	}
	elseif(mysqli_num_rows($result)==0)
	{
		echo"No data";
	}
	else
	{
		$all=mysqli_num_rows($result); //สร้างตัวแปรนับจำนวนข้อมูลที่มีทั้งหมด
		echo"<br>";
	
		echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=7><center><font size='5px'><B>ตารางเเสดงสินค้า</font></center></td></tr>";
		
		echo"<tr><td><center><font size='4px'><B>Product_id</font></center></td>
		         <td><center><font size='4px'><B>Product_name</font></center></td>
				 <td><center><font size='4px'><B>Product_detail</font></center></td>
				 <td><center><font size='4px'><B>Product_price</font></center></td>
				 <td><center><font size='4px'><B>Product_stock</font></center></td>
				 <td><center><font size='4px'><B>Product_picture</font></center></td>
				 </tr>";
		
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
			
			//เริ่มโค๊ดเลือก add data
			//echo"<td><center><input name='productorderid[]' type='checkbox' value={$data['db_productid']} ></center></td>";
			//echo"</tr>";
			
		}
		echo "<tr><td colspan=7><B><center>มีข้อมูลทั้งหมด $all รายการ</td></tr>";
		echo"</table>";
		
	}
	mysqli_close($link);
?>
<div class="button">
  <form>
	  <br><center><input  type="submit" formaction="order1.php"  value="Select order"></center>
	 
	  <center>
	   
	   <input name="logout" type="submit"  formaction="logout.php" formmethod="POST" value="Logout">
	 </center>
	  
	  <center>
		 <input name="search" type="submit"  formaction="searchformuser.php" formmethod="POST" value="Search">
	 </center>
	  
	  <center>
		 <input name="editprofile" type="submit"  formaction="editprofileform.php" formmethod="POST" value="Edit profile">
	 </center>
	 </br>
  </form>
</div>
	
</body>
</html>
