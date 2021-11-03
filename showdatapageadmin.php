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
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=7><center><font size='5px'>ตารางเเสดงสินค้า</font></center></td></tr>";
		
		echo"<tr><td><center><font size='4px'>Product_id</font></center></td>
		         <td><center><font size='4px'>Product_name</font></center></td>
				 <td><center><font size='4px'>Product_detail</font></center></td>
				 <td><center><font size='4px'>Product_price</font></center></td>
				 <td><center><font size='4px'>Product_stock</font></center></td>
				 <td><center><font size='4px'>Product_picture</font></center></td>
				 <td><center><font size='4px'>Product_datasave</font></center></td>
				 
				 
				 </tr>";
		
		while($data=mysqli_fetch_array($result))
		{
			echo"<tr>";
			echo"<td><center><font size='3px'>{$data['db_productid']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productname']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productdetail']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productprice']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productstock']}</font></center></td>";
			
			$picture=$data['db_productpicture'];
			
			echo"<td><center><img src='db_productpicture/$picture' width=100 height=100></center></td>";
			
			echo"<td><center><font size='3px'>{$data['db_productdatasave']}</font></center></td>";
			
			
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
		 <input name="search" type="submit"  formaction="searchform.php" formmethod="POST" value="Search">
	 </center>
	   <center>
	   <input name="logout" type="submit"  formaction="logout.php" formmethod="POST" value="Logout">
	 </center>
  </form>
</div>
	
</body>
</html>









