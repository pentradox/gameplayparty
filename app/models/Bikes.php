<?php

class Bikes {
  private $database;
  public function __construct() {
  $this->database = new Database;

  }
  // returns all countries
  public function getMinimalRadius($radius) {
    $query = "SELECT * ";
    $query .= "FROM bikes ";
    $query .= "WHERE radius > :radius ";
    $query .= "ORDER BY radius DESC";
    $this->database->prepare($query);
    $this->database->bind(":radius", $radius);
    return $this->database->getArray();
  }
}



?>
