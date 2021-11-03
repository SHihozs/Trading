<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
<link rel="stylesheet" type="text/css" href="styleadmininsertnews.css">	
	
</head>

<body>
<div class="forminsertbox">
	<h1>INSERT DATA</h1>
		
	<form action="admin_insertdata.php" method="post" enctype="multipart/form-data">
	  <p>
	    <label for="product_name">Product_Name</label>
	    <input name="product_name" type="text" autofocus="autofocus" required="required" maxlength="100">   
      </p>
	 
	  <p>
	    <label for="product_detail">Product_Detail</label>
        <input name="product_detail" type="text" autofocus="autofocus" required="required">
	  </p>
		
	  <p>
	    <label for="product_price">Product_Price</label>
        <input name="product_price" type="number" autofocus="autofocus" required="required">
	  </p>
		
	  <p>
	    <label for="product_stock">Product_Stock</label>
        <input name="product_stock" type="number" autofocus="autofocus" required="required">
	  </p>
	  
	   <p>
	    <label for="product_picture">Product_picture</label>
        <input name="product_picture" type="file" autofocus="autofocus" required="required">
	  </p>
		
	  <p>
	    <input name="save" type="submit" formaction="admin_insertdata.php" formmethod="POST" value="Save">
		<input name="reset" type="reset"  value="Reset">
	    <input name="back to Administatorpage" type="submit" formnovalidate="formnovalidate" formaction="mainpage_adminnew.php" formmethod="POST" value="Back to Administatorpage">
	  </p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</form>
	</div>
</body>
</html>