<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="styleadmininsertnewscus.css">	
</head>

<body>
	<div class="forminsertbox">
	<h1>INSERT DATA</h1>
		
	<form action="admin_insertdatacus.php" method="post" enctype="multipart/form-data">
	<p>
	    <label for="customer_username">Customer_username</label>
	    <input name="customer_username" type="text" autofocus="autofocus" required="required" maxlength="100">   
      </p>
	  
		<p>
	    <label for="customer_password">Customer_password</label>
	    <input name="customer_password" type="password" autofocus="autofocus" required="required" maxlength="100">   
      </p>
	<p>
	    <label for="customer_name">Customer_name</label>
	    <input name="customer_name" type="text" autofocus="autofocus" required="required" maxlength="100">   
      </p>
	<p>
	    <label for="customer_surname">Customer_surname</label>
	    <input name="customer_surname" type="text" autofocus="autofocus" required="required" maxlength="100">   
      </p>
		<p>
	    <label for="customer_email">Customer_email</label>
	    <input name="customer_email" type="email" autofocus="autofocus" placeholder="example@domain.com" required="required" maxlength="100">   
      </p>
		<p>
	    <label for="customer_sex">Customer_sex</label>
	    <input name="customer_sex" type="text" autofocus="autofocus" required="required" maxlength="10">   
      </p>
		<p>
	    <label for="customer_phone">Customer_phone</label>
	    <input name="customer_phone" type="tel" autofocus="autofocus" required="required" maxlength="10">   
      </p>
		<p>
	    <label for="customer_address">Customer_address</label>
	    <input name="customer_address" type="text" autofocus="autofocus" required="required">   
      </p>
		
	   <p>
	    <label for="customer_picture">Customer_picture</label>
        <input name="customer_picture" type="file">
	  </p>
	  
		
	  <p>
	    <input name="save" type="submit" formaction="admin_insertdatacus.php" formmethod="POST" value="Save">
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