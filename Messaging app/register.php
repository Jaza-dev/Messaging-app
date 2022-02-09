<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="all_styles/register.css">
</head>
<body>
<div id="container">
	<h1>Register</h1>
<form action="logic/register_logic.php" method="post" enctype="multipart/form-data">
	<input type="email" name="email" id="email" placeholder="E-mail" class="form" required><br>
	<input type="password" name="password" id="password" placeholder="Password" class="form" required><br>
	<input type="password" name="password_repeat" id="password_repeat" placeholder="Repeated password" class="form" required><br>
	<input type="text" name="name_surname" id="name_surname" placeholder="Name and surname" class="form" required><br>
	<input type="text" name="phone" id="phone" placeholder="Phone number" class="form" required><br>
	<input type="file" name="picture" id="picture" class="form" required><br>
	<input type="submit" value="Register" class="form" id="register_button">
	<?php if(isset($_GET['error'])): ?>
		<p style="color: red">Error: there is already account with that e-mail</p>
	<?php endif ?> 
	<?php if(isset($_GET['repeat'])): ?>
		<p style="color: red">Error: passwords dont match</p>
	<?php endif ?>
</form>
<div>
	<a href="change_password.php" class="links">Change password</a><br>
	<a href="index.php" class="links">Login</a>
</div>
</div>
</body>
</html>