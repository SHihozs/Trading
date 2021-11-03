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
	$link=mysqli_connect("localhost","root","123456","website")
    or die("Error connect to database");
	mysqli_set_charset($link,"utf8");
	
	if($_POST)
	{
		$dateorder   =$_POST['dateorder'];
		$numberorder =$_POST['ordernum'];
		$orderdetail =$_POST['orderdetail'];
		$totalprice  =$_POST['totalprice'];
		
	}
	
	$sql2 = "INSERT INTO db_order VALUES ('','$user','$numberorder','$orderdetail','$totalprice','$dateorder')";
	$result2=mysqli_query($link,$sql2);		
	//ทดสอบตัวแปรที่จะนำไปใส่ในตารางออร์เดอร์
	//echo "$user , $numberorder  ,$orderdetail ,$totalprice,$dateorder";
	
	//echo "<br>เพิ่มข้อมูลorder ลงตารางorderเรียบร้อยแล้ว";
	
	//ลบข้อมูลจากตารางtbselectfood
	$sql=" TRUNCATE db_select  ";
	$result=mysqli_query($link,$sql);		
	//echo "<br>ลบข้อมูลในตารางtbselectfoodแล้ว";
	
	//แสดงยอดรวมสินค้าที่ลูกค้าสั่งที่มีข้อมูลที่ใส่ตารางออร์เดอร์ ยกเว้นชื่อลูกค้า
	    echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=5><center><font size='5px'><B>ตารางเเสดงข้อมูลสินค้าที่เลือก</font></center></td></tr>";
	
	echo "<tr><td><center><font size='4px'><B>ชื่อลูกค้า</font></center></td><td><B>$user</td></tr>";
	echo "<tr><td><center><font size='4px'><B>จำนวนรายการที่สั่ง</font></center></td><td><B>$numberorder</td></tr>";
	echo "<tr><td><center><font size='4px'><B>รายละเอียดสินค้าที่สั่ง</font></center></td><td><B>$orderdetail</td></tr>";
	echo "<tr><td><center><font size='4px'><B>วันที่สั่งสินค้า</font></center></td><td><B>$dateorder</td></tr>";
	echo "<tr><td><center><font size='4px'><B>ราคาสุทธิ</font></center></td><td><B>$totalprice บาท</td></tr>";
	echo "</table>";
	
	
	?>
	

<div class="button">
  <form>
	  
	 <center>
	   <br>
	   <input name="logout" type="submit"  formaction="logout.php" formmethod="POST" value="Logout">
	   </br>
	 </center>
	  
  </form>
</div>
			
</body>
</html>