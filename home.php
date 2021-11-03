
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>home</title>

<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
	
<body>
	
	<div class="loginbox">
    <img src="user.png" class="avatar">
	
	<h1>LOGIN HERE</h1>
	<form action="login_home.php" method="post">
	  <p>
	    <label for="username">USERNAME:</label>
	    <input name="username" type="text" autofocus="autofocus" required="required"  placeholder="YOUR USERNAME" maxlength="100">
      </p>
	  <p>
	    <label for="password">PASSWORD:</label>
        <input name="password" type="password" autofocus="autofocus" required="required" placeholder="YOUR PASSWORD" maxlength="100">
	  </p>
	  <p>
	    <input type="submit" value="LOGIN">
	    <input type="reset"  value="CLEAR">
	  </p>
	  <p><a href="register_form.php">Don't have an account?</a></p>
		
	</form>
	</div>
</body>
</html>