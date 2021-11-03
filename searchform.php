<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="search.css">	
</head>

<body>
	<div class="searchbox">
	<form method="post" action="search.php">
	
	<center>
		<p>
		<label><font color="#000000" size="+3" ><B>Search Product</B></font></label>
		<select name="searchproduct" id="searchproductid">
		<option value="searchdb_productid">รหัสสินค้า</option>
		<option value="searchdb_productname">ชื่อสินค้า</option>
		<option value="searchdb_productdetail">รายละเอียดสินค้า</option>
		<option value="searchdb_productprice">ราคาสินค้า</option>
		<option value="searchdb_productstock">จำนวนสินค้า</option>
		</select>
		</p>
	  <p> 
		  <input type="text" name="inputsearchproduct" autofocus required placeholder="  Please fill what you want to search ">
	  </p>
		<p>
	  <input type="submit" name="OK" formaction="search.php" value="Search">        
		</p>
		  <input name="back to administator page" type="submit" formaction="mainpage_adminnew.php"  value="Back to administator page" id="back to administator page" formnovalidate="formnovalidate">
		  <center>
</form>
			</div>
</body>
</html>