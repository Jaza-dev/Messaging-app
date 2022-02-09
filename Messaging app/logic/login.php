<?php
$email = $_POST['email'];
$password = $_POST['password'];
$password = hash('sha512', $password);

require_once __DIR__ . '/../tables/User.php';
$user = User::login($email, $password);
if ($user !== null){
	session_start();
	$_SESSION['user_id'] = $user->id;
	header('Location: ../korisnik.php');
}else{
	header('Location: ../index.php?login=false');
}