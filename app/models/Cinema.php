<?php

class Cinema {
	private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function createCinema($company_name,$location,$company_logo) {
        $query = "INSERT INTO cinema (name, location, logo) VALUES (:name,:location,:logo)";
        $this->database->prepare($query);
        $this->database->bind(":name", $company_name);
        $this->database->bind(":location", $location);
        $this->database->bind(":logo", $company_logo);
        $message = $this->database->execute();
        if ($message) {
            $message = "Bioscoop succesvol toegevoed!";
            return $message;
        } else {
            $message = "Error met toevoegen!";
            return $message;
        }
    }
}