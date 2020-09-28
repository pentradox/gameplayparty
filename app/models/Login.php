<?php

class Login {
	private $database;
	public function __construct() {
		$this->database = new Database;
	}

	public function LoginCheck($mail, $password) {
		if (($mail == '') || ($password == '') || ($mail == null) || ($password == null)) {
			$error = "Please enter something!";
			return $error;
		}
		
		$pattern = '/[^0-9a-zA-Z@.-]/';
		$mail2 = preg_replace($pattern, '', $mail);
		$password2 = preg_replace($pattern, '', $password);
		if(($mail != $mail2) || ($password != $password2)) {
			$error = "Found forbidden characters!";
			return $error;
		}

		$query = "SELECT * FROM cinema WHERE mail = :mail AND password = :password AND active > 0";
		$this->database->prepare($query);
		$this->database->bind(":mail", $mail);
		$this->database->bind(":password", $password);
		$user = $this->database->getRow();
		if(!empty($user)) {
			$_SESSION["username"] = $user->name . " " . $user->location;
			$_SESSION["userid"] = $user->id;
			$_SESSION["roles"] = $user->rights;
			$_SESSION["active"] = $user->active;
			return;
		} else {
			$error = "Wrong username or password!";
			return $error;
		}
	}

	public function register() {
		$name = $_POST["username"];
		$mail = $_POST["email"];
		$password = $_POST["password"];
		if (($name == '') || ($name == null) || ($mail == '') || ($password == '') || ($mail == null) || ($password == null)) {
			$error = "Please enter something!";
			return $error;
		}
		$query = "INSERT INTO cinema (name, mail, password) VALUES (:name, :mail, :password)";
		$this->database->prepare($query);
		$this->database->bind(":name", $name);
		$this->database->bind(":mail", $mail);
		$this->database->bind(":password", $password);
		$this->database->execute();
		return;
	}
}
