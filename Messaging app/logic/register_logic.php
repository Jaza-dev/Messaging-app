<?php 
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
$name_surname = $_POST['name_surname'];
$phone = $_POST['phone'];

if(empty($_FILES['picture'])){
	$picture = null;
}else{
	require_once __DIR__ . '/../includes/Upload.php';
	$upload = Upload::factory('../pictures');
	$upload->file($_FILES['picture']);
	$upload->set_filename($_FILES['picture']['name']);
	$upload->set_allowed_mime_types(['jpg/jpeg', 'image/png', 'image/gif']);
	$upload->set_max_file_size(2);
	$upload->save();
	$picture = 'pictures/' . $_FILES['picture']['name'];
}
require_once __DIR__ . '/../tables/User.php';
$user = User::getByEmail($email);
if($user !== null){
	header('Location: ../register.php?error=1');
	die();
}
if($password !== $password_repeat){
	header('Location: ../register.php?repeat=false');
	die();
}

$password = hash('sha512', $password);
$password_repeat = hash('sha512', $password_repeat);
User::register($email, $password, $name_surname, $phone, $picture);

header('Location: ../index.php');