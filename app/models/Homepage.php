<?php

class Homepage {
    private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function cinema() {
        $query = "SELECT * FROM cinema WHERE id > 0 AND active > 0";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
    }

    public function fetchContent() {
      $query = "SELECT * FROM pages";
      $this->database->prepare($query);
      $data = $this->database->getArray();
      return $data;
    }
}
