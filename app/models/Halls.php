<?php

class Halls {
	private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function getAllHalls() {
        $query = "SELECT * FROM halls";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
    }

    public function createHall($data) {
        // Checks if form data is there and stores error message
		if (!isset($_POST["hall_number"])) {
			$data["hall_number_error"] = "Error zaal nummer is leeg!";
		}
		if (!isset($_POST["hall_seats"])) {
			$data["hall_seats_error"] = "Error zit plaatsen is leeg!";
		}
		if (!isset($_POST["hall_sound"])) {
			$data["hall_sound_error"] = "Error geluids systeem is leeg!";
		}

		// Checks if there are any error at the previous check
		foreach ($data as $value) {
			if ($value != null) {
				unset($_POST);
				return $data;
			}
		}

		// Trims all form data
		$hall_number = trim($_POST["hall_number"]);
		$hall_seats = trim($_POST["hall_seats"]);
		$hall_sound = trim($_POST["hall_sound"]);

		// Validates form data against pattern
		$pattern = '/[^0-9a-zA-Z., -]/';
		$hall_number2 = preg_replace($pattern, '', $hall_number);
		$hall_seats2 = preg_replace($pattern, '', $hall_seats);
		$hall_sound2 = preg_replace($pattern, '', $hall_sound);

		// Check if the validated form data still matches with the send data
		// If it doesn't match it will store a error message
		if ($hall_number != $hall_number2) {
			$data["hall_number_error"] = "Foute karacters gevonden in zaal nummer!";
		}
		if ($hall_seats != $hall_seats2) {
			$data["hall_seats_error"] = "Foute karacters gevonden in zit plaatsen!";
		}
		if ($hall_sound != $hall_sound2) {
			$data["hall_sound_error"] = "Foute karacters gevonden in geluids systeem!";
		}

		// Checks if there are any errors at the previous check
		foreach ($data as $value) {
			if ($value != null) {
				unset($_POST);
				return $data;
			}
		}

		// Creates a query, binds the data and executes it to the database
		$query = "INSERT INTO halls (cinema_id, hall_number, seats, sound_system) VALUES (:id, :hall_number, :seats, :sound_system)";
		$this->database->prepare($query);
		$this->database->bind(":id", $_SESSION["userid"]);
		$this->database->bind(":hall_number", $hall_number);
		$this->database->bind(":seats", $hall_seats);
		$this->database->bind(":sound_system", $hall_sound);
		$result = $this->database->execute();
		
		// Unsets any post data so user doesn't get message on hard refresh
		unset($_POST);

		// Checks if it was succesful in storing the data
		if ($result == true) {
			$data["success_message"] = "Zaal succesvol toegevoed!";
			return $data;
		} else {
			$data["error"] = "Er is iets fout gegaan bij het toevoegen!";
			return $data;
		}
    }
}