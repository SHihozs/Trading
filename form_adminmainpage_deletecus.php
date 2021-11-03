<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="styleadmindelete.css">	
</head>

<body>
	<?PHP
	if(!isset($_POST['send']))
	{		
?>
	<div class="deletebox">
	<form method="post">
	<h1>Delete Data Form</h1>
	<h2>Please enter cus id to delete</h2>
	
	<p>
	    <label for="customer_id">Customer id</label>
        <input name="customer_id" type="number"  autofocus="autofocus" required="required">
	  </p>
	<input type="submit" name="send" value="Submit">
	<input type="reset" name="cancel" value="Reset">
	<input name="back to Administatorpage" type="submit" formnovalidate="formnovalidate" 
		   formaction="mainpage_adminnew.php" formmethod="POST" value="Back to Administatorpage">
	</form>
	</div>
<?PHP
		}
	else
	{
		$id_customer=$_POST['customer_id'];
		
		$link=mysqli_connect("localhost","root","123456","website");
	    mysqli_set_charset($link,"utf8");
		
		$sql="use website";
		$result=mysqli_query($link,$sql);
		
		$sql="Delete FROM db_info WHERE db_id = '$id_customer'";
		$result=mysqli_query($link,$sql);
		
	   if($result)
	   {
		   header("location:deleteok.php");
		   mysqli_close($link);
	   }
	  else
	  {
		  header("location:deleteterror.php");
	  }
	}
	

?>
	
</body>
</html>