<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	
<link rel="stylesheet" type="text/css" href="regis.css">	
</head>

<body>
	<div class="regisbox">
	<h1>REGISTER</h1>
		
	<form action="register_ok.php" method="post" enctype="multipart/form-data">
	  <p>
	    <label for="username">Username:</label>
	    <input name="username" type="text" autofocus="autofocus" required="required" id="username" maxlength="100">
	    
	    
      </p>
	  <p>
	    <label for="password">Password:</label>
        <input name="password" type="password" autofocus="autofocus" required="required" id="password" maxlength="100">
	  </p>
	  <p>
	    <label for="name">Name:</label>
        <input name="name" type="text" autofocus="autofocus" required="required" id="name" maxlength="100">
	  </p>
	  <p>
	    <label for="surname">Surname:</label>
        <input name="surname" type="text" autofocus="autofocus" required="required" id="surname" maxlength="100">
	  </p>
	  <p>
	    <label for="email">Email:</label>
        <input name="email" type="email" autofocus="autofocus" required="required" id="email" placeholder="example@domain.com" maxlength="100">
	  </p>
	  <p>
	    <label for="sex">Sex:</label>
        <input name="sex" type="text" autofocus="autofocus" required="required" id="sex" maxlength="20">
	  </p>
	  <p>
	    <label for="phone">Phone:</label>
        <input name="phone" type="tel" autofocus="autofocus" required="required" id="phone" maxlength="10">
	  </p>
	  <p>
	    <label for="address">Address:</label>
        <input name="address" type="text" autofocus="autofocus" required="required" id="address" maxlength="200">
	  </p>
		
		<p>
	    <label for="picture">Picture:</label>
        <input name="picture" type="file" >
	  </p>
		
	  <p>
	    <input name="register" type="submit" id="Register" formaction="register_ok.php" formmethod="POST" value="Register">
	    <input name="back to Log in" type="submit" formnovalidate="formnovalidate" id="back to Log in" formaction="home.php" formmethod="POST" value="Back to login home">
	  </p>
		
		
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</form>
	</div>
</body>
</html>