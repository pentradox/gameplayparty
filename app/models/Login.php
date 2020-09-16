<?php

class Login {
	private $database;
	public function __construct() {

		$this->database = new Database;
	}

	public function LoginCheck($username, $password) {
		$pattern = '/[0-9a-zA-Z-]{20}$/';
		$username2 = preg_replace($pattern, '', $username);
		$password2 = preg_replace($pattern, '', $password);
		if(($username != $username2) || ($password != $password2)) {
			return false;
		}
		if($username == "test" && $password == 123) {
			$_SESSION["userid"] = "test";
			return true;
		} else {
			return false;
		}


	}
}
