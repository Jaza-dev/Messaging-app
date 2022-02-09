<?php
$message_id = $_POST['message_id'];
require_once __DIR__ . '/../tables/Message.php';
Message::delete($message_id);
echo "success";