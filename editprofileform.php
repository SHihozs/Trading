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
<link rel="stylesheet" type="text/css" href="tablee.css">	
<body background="etc.jpg">
	<?PHP
	
	$link=mysqli_connect("localhost","root","123456","website")
    or die("Error connect to database");
	mysqli_set_charset($link,"utf8");
	
	$sql = "SELECT * FROM db_info WHERE db_username = '$user' ";
	$result =mysqli_query($link,$sql);
	
	if(!$result) //ตรวจสอบว่าเจอตารางลูกค้ามั้ย?
	{
		echo "mysqli_error($link)";
	}
	else if(mysqli_num_rows($result)==0)//ตรวจสอบไม่เจอ
	{
		echo "<center><h1>NO DATA ";
		
	}
	else{//เริ่มอ่านค่าจากฐานข้อมูล
  //code เริ่มหัวตาราง
	
		while($data =mysqli_fetch_array($result))
		{
			//เริ่มการตรวจสอบว่าLogin ถูกมั้ย
			$editcustomerid = $data['db_id'];
			$editcustomerusername = $data['db_username'];
			$editcustomerpassword =$data['db_password'];
			$editcustomername= $data['db_name'];
			$editcustomersurname = $data['db_surname'];
			$editcustomeremail = $data['db_email'];
			$editcustomersex = $data['db_sex'];
			$editcustomerphone = $data['db_phone'];
			$editcustomeraddress = $data['db_address'];
			$editcustomerpicture= $data['db_picture'];
		}//end while อ่านค่าจากตารางลูกค้า
		
		
		
	}//end else จากการอ่านฐานข้อมูล
	//mysqli_close($link);
	?>
	<div class="editbox">
    <table  border='0'  align='center'>
	<tr><td colspan=2> <B><center><h1>EDIT PROFILE</h1></td></tr>
	<form method="post" action="editprofile2.php" enctype="multipart/form-data">
	
<tr><td><B>รหัสลูกค้า</td><td>
	<input type="text" name="sendeditcustomerid" readonly value="<?PHP echo $editcustomerid ?>">*ไม่สามารถแก้ไขได้*</td></tr>
	
	<tr><td><B>username</td><td>
	<input type="text" name="sendeditcustomerusername" value="<?PHP echo $editcustomerusername ;?>"></td></tr>
	
	<tr><td><B>password</td><td>
	<input type="password" name="sendeditcustomerpassword" value="<?PHP echo $editcustomerpassword ;?>"></td></tr>
	
	<tr><td><B>ชื่อลูกค้า</td><td>
	<input type="text" name="sendeditcustomername" value="<?PHP echo $editcustomername; ?>"></td></tr>
	
	<tr><td><B>นามสกุลลูกค้า</td><td>
	<input type="text" name="sendeditcustomersurname" value="<?PHP echo $editcustomersurname; ?>"></td></tr>
		
	<tr><td><B>อีเมลลูกค้า</td><td>
	<input type="email" name="sendeditcustomeremail" value="<?PHP echo $editcustomeremail; ?>"></td></tr>
		
	<tr><td><B>เพศ</td><td>
	<input type="text" name="sendeditcustomersex" value="<?PHP echo $editcustomersex; ?>"></td></tr>
		
	<tr><td><B>เบอร์โทรศัพท์</td><td>
	<input  name="sendeditcustomerphone" type="tel" value="<?PHP echo $editcustomerphone; ?>"></td></tr>
		
	<tr><td><B>ที่อยู่ลูกค้า</td><td>
	<textarea rows="4" cols="20"  name="sendeditcustomeraddress">
	<?PHP echo $editcustomeraddress ; ?></textarea></td></tr>
	
	<tr><td><B>รูปลูกค้า</td><td><?PHP echo "<img src='db_cuspicture/$editcustomerpicture' width='150' height='150'>" ;?></td></tr>
		
	<input type=hidden name="sendoldcustomerpicture" value=<?PHP  echo $editcustomerpicture ?>  >
	
	<tr><td><B>แก้ไขรูปลูกค้า</td><td><input type="file" name="sendeditcustomerpicture"></td></tr>
	
	<tr><td colspan="2"><center><input type="submit" value="Save">
		                        <input type="reset" value="Reset">
		                        <input type="submit" value="Back to select order" formaction="showdatapageuser.php">
		
	</center></td></tr>
		
	</form>
	</div>
	
	
</body>
</html>