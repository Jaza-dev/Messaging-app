<?php 
require_once __DIR__ . '/Tabela.php';
class User {
	public $id;
	public $email;
	public $password;
	public $name_surname;
	public $phone;
	public $picture;

	public static function getAll(){
		$db = Database::getInstance();
		$query = 'SELECT * FROM users';
		return $db->select('User', $query);
	}

	public static function getByEmail($email){
		$db = Database::getInstance();
		$query = 'SELECT * FROM users WHERE email = :e';
		$params = [
			':e' => $email
		];
		$users = $db->select('User', $query, $params);
		foreach($users as $user){
			return $user;
		}
		return null;
	}

	public static function getById($id){
		$db = Database::getInstance();
		$query = 'SELECT * FROM users WHERE id = :i';
		$params = [
			':i' => $id
		];
		$users = $db->select('User', $query, $params);
		foreach($users as $user){
			return $user;
		}
		return null;
	}

	public static function register($email, $password, $name_surname, $phone, $picture){
		$db = Database::getInstance();
		$query = 'INSERT INTO users (email, password, name_surname, phone, picture) VALUES (:e, :p, :ns, :ph, :pi)';
		$params = [
			':e' => $email,
			':p' => $password,
			':ns' => $name_surname,
			':ph' => $phone,
			':pi' => $picture
		];
		$user = $db->insert('User', $query, $params);
		return $db->lastInsertId();
	}

	public static function login($email, $password){
		$db = Database::getInstance();
		$query = 'SELECT * FROM users WHERE email = :e AND password = :p';
		$params = [
			':e' => $email,
			':p' => $password
		];
		$users = $db->select('User', $query, $params);
		foreach($users as $user){
			return $user;
		}
		return null;
	}

	public static function change_password($email, $new_password){
		$db = Database::getInstance();
		$query = 'UPDATE users SET password = :p WHERE email = :e';
		$params = [
			':p' => $new_password,
			':e' => $email
		];
		$db->update('User', $query, $params);
	}
}