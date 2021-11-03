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
	
	
	if($_POST) // รับค่าจากฟอร์มค้นหาข้อมูลลูกค้า
			{
		$inputsearchfoodtype = $_POST['searchproduct'];//รับค่าตัวแปรประเภทที่ต้องการค้นหา
				if($inputsearchfoodtype=="searchdb_productid") //search จากฐานข้อมูล
				{
					$searchfood="db_productid";
				}
		        elseif($inputsearchfoodtype=="searchdb_productname")
				{
					$searchfood="db_productname";
				}
		        elseif($inputsearchfoodtype=="searchdb_productdetail")
				{
					$searchfood="db_productdetail";
				}
		        elseif($inputsearchfoodtype=="searchdb_productprice")
				{
					$searchfood="db_productprice";
				}
		        elseif($inputsearchfoodtype=="searchdb_productstock")
				{
					$searchfood="db_productstock";
				}
		
		
		
		
				
		$inputfoodsearchdata =$_POST['inputsearchproduct'];
			
					}
	//echo"$searchfood,$inputfoodsearchdata";
	
	$sql="SELECT * FROM db_product WHERE $searchfood LIKE '%$inputfoodsearchdata%'"; //คือการหาเฉพาะ keyword
	$result=mysqli_query($link,$sql);
	
	//ทดลองแสดงตัวแปรที่ต้องการ
//echo  $inputcussearchdata";
	
		if(!$result)
		{
		echo mysqli_error($link);
		
	    }
	else if (mysqli_num_rows($result)==0)
		{
			echo"No data";
		}
    else{
		
	    echo"<br>";
		echo"<br>";
		echo"<br>";
	$all=mysqli_num_rows($result);//นับรายการข้อมูลทั้งหมดที่มีในตาราง
	echo"<table width='900' bgcolor='#FFFAF0' border='1' bordercolor='#FFE4B5' align='center'>
		<tr><td colspan=7><center><font size='5px'>ตารางเเสดงสินค้า</font></center></td></tr>";
		
	echo"<tr><td><center><font size='4px'>Product_id</font></center></td>
		         <td><center><font size='4px'>Product_name</font></center></td>
				 <td><center><font size='4px'>Product_detail</font></center></td>
				 <td><center><font size='4px'>Product_price</font></center></td>
				 <td><center><font size='4px'>Product_stock</font></center></td>
				 <td><center><font size='4px'>Product_picture</font></center></td>
			
				 
				 
				 </tr>";
	//เริ่มอ่านข้อมูลตารางอาหารจาก mySQL
		
		while ($data =mysqli_fetch_array($result))
	{
		echo"<tr>";
			echo"<td><center><font size='3px'>{$data['db_productid']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productname']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productdetail']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productprice']}</font></center></td>";
			echo"<td><center><font size='3px'>{$data['db_productstock']}</font></center></td>";
			
			$picture=$data['db_productpicture'];
			
			echo"<td><center><img src='db_productpicture/$picture' width=100 height=100></center></td>";
			
			
			
			
			echo"</tr>";
	}
	echo "<tr><td colspan=7><B><center>มีข้อมูลทั้งหมด $all รายการ</td></tr>";//แสดงยอดข้อมูล
	echo "</table >";
	
}//ปิด 
	?>
	
	<div class="button">
  <form>
	  <center><input name="back to show product" type="submit" formaction="showdatapageuser.php"  value="Back to show product">
	  </center>
	  
	  <center><input name="go to select order" type="submit" formaction="order1.php"  value="Go to select order">
	  </center>
	  
	 
  </form>
</div>
	
	
	
	
	
</body>
</html>