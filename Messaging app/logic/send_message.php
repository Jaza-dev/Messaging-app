<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
	die();
}
require_once __DIR__ . '/../tables/User.php';
require_once __DIR__ . '/../tables/Message.php';

$header = $_POST['header'];
$message = $_POST['message'];
$sender_id = $_SESSION['user_id'];
$reciver_id = User::getByEmail($_POST['send_to'])->id;
$speed = $_POST['speed'];

Message::send($header, $message, $sender_id, $reciver_id, $speed);

header('Location: ../korisnik.php');