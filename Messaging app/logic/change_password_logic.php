<?php
$email = $_POST['email'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_repeat = $_POST['new_password_repeat'];

$old_password = hash('sha512', $old_password);
$new_password = hash('sha512', $new_password);
$new_password_repeat = hash('sha512', $new_password_repeat);

require_once __DIR__ . '/../tables/User.php';
$user = User::login($email, $old_password);
if($user !== null){
	if($new_password !== $new_password_repeat){
		header('Location: ../change_password.php?error=2');
		die();
	}
	User::change_password($email, $new_password);
	header('Location: ../index.php?success=1');
}else{
	header('Location: ../change_password.php?error=1');
}