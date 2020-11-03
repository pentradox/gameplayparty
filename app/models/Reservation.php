<?php

class Reservation {
  private $database;

  public function __construct() {
	  $this->database = new Database;
  }

  public function getAllReservations() {
    $query = "SELECT * FROM reservations WHERE id > 0";
    $this->database->prepare($query);
    $data["reservations"] = $this->database->getArray();
    return $data;
  }
}