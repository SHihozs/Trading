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
	
	$sql="SELECT * FROM db_info";
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
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=10><center><font size='5px'>ตารางเเสดงข้อมูลลูกค้า</font></center></td></tr>";
		
		echo"<tr><td><center><font size='4px'>customer_id</font></center></td>
		         <td><center><font size='4px'>customer_username</font></center></td>
				 <td><center><font size='4px'>customer_name</font></center></td>
				 <td><center><font size='4px'>customer_surname</font></center></td>
				 <td><center><font size='4px'>customer_email</font></center></td>
				 <td><center><font size='4px'>customer_sex</font></center></td>
				 <td><center><font size='4px'>customer_phone</font></center></td>
				 <td><center><font size='4px'>customer_address</font></center></td>
				 <td><center><font size='4px'>customer_picture</font></center></td>
				 <td><center><font size='4px'>customer_datasave</font></center></td>
				 
				 
				 </tr>";
		
		while($data=mysqli_fetch_array($result))
		{
			echo"<tr>";
			echo"<td><center><font size='3px'>{$data['db_id']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_username']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_name']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_surname']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_email']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_sex']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_phone']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_address']}</font></center></td>";
			
			
			$picture=$data['db_picture'];
			
			echo"<td><center><img src='db_cuspicture/$picture' width=100 height=100></center></td>";
			
			echo"<td><center><font size='3px'>{$data['db_datasave']}</font></center></td>";
			
			
			echo"</tr>";
			
		}
		
		echo"</table>";
		
	}
	mysqli_close($link);
?>
<div class="button">
  <form>
	  <center><input name="back to administator page" type="submit" formaction="mainpage_adminnew.php"  value="Back to administator page" id="back to administator page"></center>
	 <center>
	   
	   <input name="logout" type="submit"  formaction="logout.php" formmethod="POST" value="Logout">
	 </center>
  </form>
</div>
	
</body>
</html>