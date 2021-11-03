<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
		echo"<table width='600' bgcolor='#D29394' border='2'align='center'>
		<tr><td colspan=6><center>เเสดงข้อมูลจากตาราง db_product</center></td></tr>";
		
		echo"<tr><td>Product_id</td>
		         <td>Product_name</td>
				 <td>Product_detail</td>
				 <td>Product_price</td>
				 <td>Product_stock</td>
				 <td>Product_datasave</td></tr>";
		
		while($data=mysqli_fetch_array($result))
		{
			echo"<tr>";
			echo"<td>{$data['db_productid']}</td>";
			echo"<td>{$data['db_productname']}</td>";
			echo"<td>{$data['db_productdetail']}</td>";
			echo"<td>{$data['db_productprice']}</td>";
			echo"<td>{$data['db_productstock']}</td>";
			echo"<td>{$data['db_productdatasave']}</td>";
			echo"</tr>";
			
		}
		
		echo"</table>";
		
	}
	mysqli_close($link);
	

	
?>
	
	
	
	
	
	
	
	
	
</body>
</html>



















