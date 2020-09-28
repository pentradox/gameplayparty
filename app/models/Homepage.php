<?php

class Homepage {
    private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function cinema() {
        $query = "SELECT * FROM cinema WHERE id > 0";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
    }
}