<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body background="etc.jpg">
	<?PHP
	
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	$link=mysqli_connect("localhost","root","123456","website");
	mysqli_set_charset($link,"utf8");	
//	$sql="use db_info";
	// $result=mysqli_query($link,$sql);
	
	$sql="SELECT* FROM db_info WHERE db_username='$user' AND db_password='$pass' ";
	$result=mysqli_query($link,$sql);
	
	 if($_POST['username']=="root" && $_POST['password']=="123")
	{
		setcookie("username",$_POST['username'],time()+3600);
		setcookie("password",$_POST['password'],time()+3600);
		header("location:mainpage_adminnew.php");
	}
	
	elseif(!$result) //ตรวจสอบว่าเจอตารางลูกค้ามั้ย?
	{
		echo mysqli_error($link);
	}
	
	else if(mysqli_num_rows($result)==0)//ตรวจสอบไม่เจอ
	{
		echo "<center><h1>USERNAME และ PASSWORD ไม่ถูกต้อง ";
		echo "<br>อีก 5 วินาที กลับไปหน้า Log in ของลูกค้า";
		header("Refresh: 5  ; url = home.php");//คำสั่งไปหน้าอื่น
		
	}		

	else{//เริ่มอ่านค่าจากฐานข้อมูล
  	
		while($data =mysqli_fetch_array($result))
		{
			//เริ่มการตรวจสอบว่าLogin ถูกมั้ย
			$cusid = $data['db_id'];
			$username =$data['db_username'];
			$password= $data['db_password'];
			
			echo"$cusid";
			echo"$username";
			echo"$password";
			
			header("location:showdatapageuser.php");

		}//end while อ่านค่าจากตารางลูกค้า
		echo "<center><h2>รหัสผ่านถูกต้อง</h><br></center>";
		echo "<center><h1>ยินดีต้อนรับ $cusid : คุณ $username</h>	</center>";
		echo"<a href='showdatapageuser.php'>WEBSITE</a>";
		// สร้างsession ของลูกค้าสำหรับเลือกอาหาร
		session_start(); //เริ่มสร้างตัวแปรแบบ session
		$_SESSION["sessioncusid"] =$cusid;
		$_SESSION["sessionusername"] = $username;
		session_write_close();  //จบการสร้างseesion ของลูกค้า
		}//end else จากการอ่านฐานข้อมูล
	mysqli_close($link);
	
	
	
	
	?>
</body>
</html>