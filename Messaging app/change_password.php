<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change password</title>
	<link rel="stylesheet" type="text/css" href="all_styles/change_password.css">
</head>
<body>
<div id="container">
	<h1>Change password</h1>
<form action="logic/change_password_logic.php" method="post">
	<input type="email" name="email" id="email" placeholder="E-mail" class="form"><br>
	<input type="password" name="old_password" id="old_password" placeholder="Old password" class="form"><br>
	<input type="password" name="new_password" id="new_password" placeholder="New password" class="form"><br>
	<input type="password" name="new_password_repeat" id="new_password_repeat" placeholder="Repeated new password" class="form"><br>
	<input type="submit" value="Change password" class="form" id="change_password_button">
	<?php if(isset($_GET['error']) && $_GET['error'] === '1'): ?>
		<p style="color: red">Error: login data</p>
	<?php elseif(isset($_GET['error']) && $_GET['error'] === '2'): ?>
		<p style="color: red">Error: passwords dont mach</p>
	<?php endif ?>
</form>
<div>
	<a href="index.php" class="links">Login</a><br>
	<a href="register.php" class="links">Register</a><br>
</div>
</div>
</body>
</html>