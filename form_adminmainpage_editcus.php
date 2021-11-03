<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="styleadminedit.css">	
</head>

<body>
	
	<div class="editbox">
	<form method="post">
	<h1>Edit Data Form</h1>
	<h2>Please enter customer id to edit</h2>
	
	<p>
	    <label for="cus_id">Product id</label>
        <input name="cus_id" type="number"  autofocus="autofocus" required="required">
	  </p>
	<input type="submit" name="send" value="Submit" formaction="cusform2.php" >
	<input type="reset" name="cancel" value="Reset">
	<input name="back to Administatorpage" type="submit" formnovalidate="formnovalidate" formaction="mainpage_adminnew.php" formmethod="POST" value="Back to Administatorpage">
	</form>
	</div>
</body>
</html>