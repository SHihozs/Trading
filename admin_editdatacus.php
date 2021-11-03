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
	if(move_uploaded_file($_FILES["sendeditcustomerpicture"]["tmp_name"],"db_cuspicture/".$_FILES["sendeditcustomerpicture"]["name"]))
	{
		$editcusimg = $_FILES['sendeditcustomerpicture']["name"];
	}
	else //ถ้าไม่มีการอัปโหลดรูปใหม่
	{
		$editcusimg = $_POST['sendoldcustomerpicture'];
	}
	if($_POST) //if ตรวจสอบตัวแปรที่ส่งมา
	{
		    $editcustomerid = $_POST['sendeditcustomerid'];
			$editcustomerusername = $_POST['sendeditcustomerusername'];
			$editcustomerpassword =$_POST['sendeditcustomerpassword'];
			$editcustomername= $_POST['sendeditcustomername'];
			$editcustomersurname = $_POST['sendeditcustomersurname'];
			$editcustomeremail = $_POST['sendeditcustomeremail'];
			$editcustomersex = $_POST['sendeditcustomersex'];
			$editcustomerphone = $_POST['sendeditcustomerphone'];
			$editcustomeraddress = $_POST['sendeditcustomeraddress'];
			//$editcustomerpicture= $_POST['sendeditcustomerpicture'];
	
	
	$link=mysqli_connect("localhost","root","123456","website");
    mysqli_set_charset($link,"utf8");
		
	$sql="use website";
	$result=mysqli_query($link,$sql);
	
	$sql="UPDATE db_info SET db_username='$editcustomerusername',db_password='$editcustomerpassword',db_name='$editcustomername',db_surname='$editcustomersurname',db_email='$editcustomeremail',db_sex='$editcustomersex',db_phone='$editcustomerphone',db_address='$editcustomeraddress',db_picture='$editcusimg' where db_id='$editcustomerid'";
	$result=mysqli_query($link,$sql);
	
	if($result)
	{
		header("location:editokcus.php");
		mysqli_close($link);
	}
	else
	{
		header("location:editerrorcus.php");
		mysqli_close($link);
	}
	}
?>
	
	<form>
	
	<input name="edit again" type="submit" id="edit again" formaction="form_adminmainpage_editcus.php" value="Edit again">
	
	<input name="back to administator page" type="submit" id="back to administator page" formaction="mainpage_adminnew.php" value="Back to administator page">
	</form>
</body>
</html>