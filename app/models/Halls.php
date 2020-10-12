<?php

class Halls {
	private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function getAllHalls() {
		// Gets all rows by id and sorts them on hall_number
		$cinema_id = $_SESSION['userid'];
        $query = "SELECT * FROM halls  WHERE cinema_id = $cinema_id ORDER BY hall_number";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
    }

    public function getHall($id,$data) {
		// Check if the id is there and valid
		if (!isset($id)) {
			$data["has_id"] = false;
            return $data;
		}
        if ($id == null) {
			$data["hall_message"] = "Error! fout zaal nummer!";
			$data["hall_message_class"] = "alert-danger";
            return $data;
		}
		// Get the row with the matching id
        $query = "SELECT * FROM halls WHERE id=:id LIMIT 1";
        $this->database->prepare($query);
        $this->database->bind(":id", $id);
		$result = $this->database->getRow();
		// Check if sql returns any results
        if ($result == false) {
			$data["hall_message"] = "Error die zaal bestaat niet!";
			$data["hall_message_class"] = "alert-danger";
            return $data;
        } else {
            $data["hall"] = $result;
            return $data;
        }
    }

    public function sendUpdateHall($data) {
        // Checks if form data is there and stores error message
		if ((!isset($_POST["hall_number"])) || ($_POST["hall_number"] == "")) {
			$data["hall_number_error"] = "Error zaal nummer is leeg!";
		}
		if ((!isset($_POST["hall_seats"])) || ($_POST["hall_seats"] == "")) {
			$data["hall_seats_error"] = "Error zit plaatsen is leeg!";
		}
		if ((!isset($_POST["hall_sound"])) || (($_POST["hall_sound"] == ""))) {
			$data["hall_sound_error"] = "Error geluids systeem is leeg!";
        }
        if ((!isset($_POST["id"])) || ($_POST["id"] == null)) {
			$data["error"] = "Please do not edit the code!";
		}
		// Checks if there are any error at the previous check
		if (($data["hall_number_error"] != null) || ($data["hall_seats_error"] != null) || ($data["hall_sound_error"] != null) || ($data["error"] != null)) {
			$data["id"] = $_POST["id"];
			unset($_POST);
			return $data;
		}
		// Trims all form data
		$hall_number = trim($_POST["hall_number"]);
		$hall_seats = trim($_POST["hall_seats"]);
        $hall_sound = trim($_POST["hall_sound"]);
        $id = trim($_POST["id"]);
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
		if (($data["hall_number_error"] != null) || ($data["hall_seats_error"] != null) || ($data["hall_sound_error"] != null) || ($data["error"] != null)) {
			$data["id"] = $_POST["id"];
			unset($_POST);
			return $data;
		}
		// Updateds row specified by id
		$query = "UPDATE halls SET hall_number=:hall_number, seats=:seats, sound_system=:sound_system WHERE id=:id";
        $this->database->prepare($query);
		$this->database->bind(":hall_number", $hall_number);
		$this->database->bind(":seats", $hall_seats);
        $this->database->bind(":sound_system", $hall_sound);
        $this->database->bind(":id", $id);
		$result = $this->database->execute();
		// Unsets any post data so user doesn't get message on hard refresh
		unset($_POST);
		// Checks if it was succesful in storing the data
		if ($result) {
            $data["success_message"] = "Zaal succesvol Bijgewerkt!";
            $data["id"] = $id;
			return $data;
		} else {
			$data["error"] = "Er is iets fout gegaan bij het Bijwerken!";
			return $data;
		}
    }

    public function createHall($data) {
        // Checks if form data is there and stores error message
		if ((!isset($_POST["hall_number"])) || ($_POST["hall_number"] == "")) {
			$data["hall_number_error"] = "Error zaal nummer is leeg!";
		}
		if ((!isset($_POST["hall_seats"])) || ($_POST["hall_seats"] == "")) {
			$data["hall_seats_error"] = "Error zit plaatsen is leeg!";
		}
		if ((!isset($_POST["hall_sound"])) || (($_POST["hall_sound"] == ""))) {
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
			$data["hall_message"] = "Zaal succesvol toegevoed!";
			$data["hall_message_class"] = "alert-success";
			$_SERVER['REQUEST_METHOD'] = "GET";
			return $data;
		} else {
			$data["error"] = "Er is iets fout gegaan bij het toevoegen!";
			return $data;
		}
	}
	
	public function deletehall($id,$data) {
		// Checks if the id is set
		if (!isset($id)) {
			$data["has_id"] = false;
			return $data;
		}
		if ($id == null) {
			$data["hall_message"] = "Error zaal bestaat niet!";
			$data["hall_message_class"] = "alert-danger";
			return $data;
		}
		// Deletes row at id
		$query = "DELETE FROM halls WHERE id=:id LIMIT 1";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		// checks if row is deleted succesfully
		if(!$this->database->execute()) {
			$data["hall_message"] = "Error kon niet verwijderen!";
			$data["hall_message_class"] = "alert-danger";
		} else {
			if ($this->database->rowCount() == 1) {
				$data["hall_message"] = "Zaal succesvol verwijderd";
				$data["hall_message_class"] = "alert-success";
			} else {
				$data["hall_message"] = "Error zaal bestaat niet!";
				$data["hall_message_class"] = "alert-danger";
			}
		}
		return $data;
	}

	public function getAgenda($id) {
		$query = "SELECT * FROM hall_times WHERE hall_id=:id";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		$data = $this->database->getArray();
		echo json_encode($data);
	}

	public function addAgenda() {
		$id = $_POST["hall_id"];
		$date = $_POST["date"];
		$time_area = $_POST["time_area"];
		$query = "INSERT INTO hall_times (hall_id, date, time_area) VALUES (:hall_id, :date, :time_area)";
		$this->database->prepare($query);
		$this->database->bind(":hall_id", $id);
		$this->database->bind(":date", $date);
		$this->database->bind(":time_area", $time_area);
		$this->database->execute();
		return;
	}
}