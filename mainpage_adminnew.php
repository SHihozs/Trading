<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="mainpageadminnews.css">
</head>

<body>
	
    <div class="adminbox">
		<h1>Administrator page</h1>
		<form>
			<p>
		    <input name="show data" type="submit"  formaction="showdatapageadmin.php" formmethod="POST" value="Show Data Product">
	      </p>
			<p>
		    <input name="show data cus" type="submit"  formaction="showdatapageadmin_cus.php" formmethod="POST" value="Show Data Customer">
	      </p>
		  <p>
		    <input name="insert data" type="submit"  formaction="checkinsertdata.php" formmethod="POST" value="Insert Data">
	      </p>
		  <p>
		    <input name="edit data" type="submit" id="edit data" formaction="checkeditdata.php" formmethod="POST" value="Edit Data">
		  </p>
		  <p>
		    <input name="delete data" type="submit" id="delete data" formaction="checkdeletedata.php" formmethod="POST" value="Delete Data">
		  </p>
		  <p>
		    <input name="logout" type="submit" id="logout" formaction="logout.php" formmethod="POST" value="Log Out">
		  </p>
		</form>
	
	 
	</div>
	
</body>
</html>