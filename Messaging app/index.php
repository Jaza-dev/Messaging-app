<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="all_styles/index.css">
</head>
<body>
<div id="container">
	<h1 id="header1">Login</h1>
<form action="logic/login.php" method="post">
	<input type="email" name="email" id="email" placeholder="E-mail"><br>
	<input type="password" name="password" id="password" placeholder="Password"><br>
	<input type="submit" value="Login" id="login_button">
	<?php if(isset($_GET['login'])): ?>
		<p style="color: red">Error: login data</p>
	<?php elseif(isset($_GET['success'])): ?>
		<p style="color: green">Success: password successfuly changed</p>
	<?php endif ?>
</form>
<div>
	<a href="change_password.php" class="links">Change password</a><br>
	<a href="register.php" class="links">Register</a>
</div>
</div>
</body>
</html>