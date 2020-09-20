<?php

class Login {
	private $database;
	public function __construct() {
		$this->database = new Database;
	}

	public function LoginCheck($username, $password) {
		if (($username == '') || ($password == '') || ($password == null) || ($password == null)) {
			$error = "Please enter something!";
			return $error;
		}
		$pattern = '/[^0-9a-zA-Z-]/';
		$username2 = preg_replace($pattern, '', $username);
		$password2 = preg_replace($pattern, '', $password);
		if(($username != $username2) || ($password != $password2)) {
			$error = "Found forbidden characters!";
			return $error;
		}

		$query = "SELECT * FROM users WHERE username = :username AND password = :password";
		$this->database->prepare($query);
		$this->database->bind(":username", $username);
		$this->database->bind(":password", $password);
		$user = $this->database->getArray();

		if(!empty($user)) {
			$_SESSION["userid"] = "test";
			return;
		} else {
			$error = "Wrong username or password!";
			return $error;
		}
	}
}
