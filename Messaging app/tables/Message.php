<?php 
require_once __DIR__ . '/Tabela.php';

class Message {
	public $id;
	public $header;
	public $message;
	public $speed;
	public $sender_id;
	public $reciver_id;
	public $sent_time;
	public $read_time;

	public static function send($header, $message, $sender_id, $reciver_id, $speed, $read_time = null){
		$db = Database::getInstance();
		$query = 'INSERT INTO messages (header, message, sender_id, reciver_id, speed, read_time) VALUES (:h, :m, :sid, :rid, :s, :rtime)';
		$params = [
			':h' => $header,
			':m' => $message,
			':sid' => $sender_id,
			':rid' => $reciver_id,
			':s' => $speed,
			':rtime' => $read_time
		];
		return $db->insert('Message', $query, $params);
	}

	public static function getAllUserMessages($id){
		$db = Database::getInstance();
		$query = 'SELECT * FROM messages WHERE sender_id = :id OR reciver_id = :id ORDER BY sent_time DESC';
		$params = [
			':id' => $id
		];
		return $db->select('Message', $query, $params);
	}

	public static function getAllSent($sender_id){
		$db = Database::getInstance();
		$query = 'SELECT * FROM messages WHERE sender_id = :sid';
		$params = [
			':sid' => $sender_id
		];
		return $db->select('Message', $query, $params);
	}

	public static function getAllReceived($receiver_id){
		$db = Database::getInstance();
		$query = 'SELECT * FROM messages WHERE reciver_id = :rid';
		$params = [
			':rid' => $receiver_id
		];
		return $db->select('Message', $query, $params);
	}

	public static function delete($id){
		$db = Database::getInstance();
		$query = 'DELETE FROM messages WHERE id = :i';
		$params = [
			':i' => $id
		];
		$db->delete($query, $params);
	}

	public static function updateReadTime($id, $read_time){
		$db = Database::getInstance();
		$query = 'UPDATE messages SET read_time = :rt WHERE id = :i';
		$params = [
			':rt' => $read_time,
			':i' => $id
		];
		return $db->update('Message', $query, $params);
	}

	public static function getById($id){
		$db = Database::getInstance();
		$query = 'SELECT * FROM messages WHERE id = :i';
		$params = [
			':i' => $id
		];
		$messages = $db->select('Message', $query, $params);
		foreach($messages as $message){
			return $message;
		}
		return null;
	}
}