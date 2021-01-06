<?php

class RegisterBios extends Controller {
  private $database;
  public function __construct() {
    $this->database = new Database;
  }
  // Called for loading and post requests
  public function register($data) {
    $query  = "INSERT INTO cinema (name, mail, password) ";
    $query .= "VALUES(:username, :email, :password)";
    $this->database->prepare($query);
    $this->database->bind(":username", $data['username']);
    $this->database->bind(":password", $data['password']);
    $this->database->bind(":email", $data['email']);
    if ($this->database->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
