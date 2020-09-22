<?php

class RegisterBios extends Controller {
  private $database;
  public function __construct() {
    $this->database = new Database;
  }
  // Called for loading and post requests
  public function register($data) {
    $query  = "INSERT INTO users (username, password, rights, email, reason) ";
    $query .= "VALUES(:username, :password, :rights, :email, :reason)";
    $this->database->prepare($query);
    $this->database->bind(":username", $data['username']);
    $this->database->bind(":password", $data['password']);
    $this->database->bind(":rights", 0);
    $this->database->bind(":email", $data['email']);
    $this->database->bind(":reason", $data['reason']);
    if ($this->database->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>
