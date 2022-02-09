<?php 
$message_id = $_POST['message_id'];
$read_time = $_POST['current_time'];
require_once __DIR__ . '/../tables/Message.php';
$message = Message::updateReadTime($message_id, $read_time);
echo date("d.m.Y. H:i", strtotime($read_time));