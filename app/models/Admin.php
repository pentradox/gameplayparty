<?php

class Admin
{
	private $database;
	public function __construct()
	{
		$this->database = new Database;
	}

	public function fetchContent($page)
	{
		$query = "SELECT * FROM pages WHERE page_name=:page_name";
		$this->database->prepare($query);
		$this->database->bind(":page_name", $page);
		$data = $this->database->getArray();
		return $data;
	}

	public function contentupdate($data)
	{
		if ($data[0] == 'home') {
			$query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
			$this->database->prepare($query);
			$this->database->bind(":title", $data[1]['home_title']);
			$this->database->bind(":text", $data[1]['home_text']);
			$this->database->bind(":id", 1);
			$this->database->execute();
			$query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
			$this->database->prepare($query);
			$this->database->bind(":title", $data[1]['home_section_1_title']);
			$this->database->bind(":text", $data[1]['home_section_1_text']);
			$this->database->bind(":id", 2);
			$this->database->execute();
			$query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
			$this->database->prepare($query);
			$this->database->bind(":title", $data[1]['home_section_2_title']);
			$this->database->bind(":text", $data[1]['home_section_2_text']);
			$this->database->bind(":id", 3);
			$this->database->execute();
		}
		if ($data[0] == 'contact') {
			$query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
			$this->database->prepare($query);
			$this->database->bind(":title", $data[1]['contact_title']);
			$this->database->bind(":text", $data[1]['contact_text']);
			$this->database->bind(":id", 4);
			$this->database->execute();
			$query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
			$this->database->prepare($query);
			$this->database->bind(":title", $data[1]['contact_section_1_title']);
			$this->database->bind(":text", $data[1]['contact_section_1_text']);
			$this->database->bind(":id", 5);
			$this->database->execute();
			$query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
			$this->database->prepare($query);
			$this->database->bind(":title", $data[1]['contact_section_2_title']);
			$this->database->bind(":text", $data[1]['contact_section_2_text']);
			$this->database->bind(":id", 6);
			$this->database->execute();
		}
	}

	public function getAllAccounts()
	{
		// Gets all rows by id
		$query = "SELECT * FROM cinema WHERE id > 0";
		$this->database->prepare($query);
		$data = $this->database->getArray();
		return $data;
	}

	public function activateAccount($id)
	{
		$query = "SELECT active FROM cinema WHERE id=:id";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		$data = $this->database->getRow();
		if ($data->active) {
			$active = 0;
		} else {
			$active = 1;
		}
		$query = "UPDATE cinema SET active=:active WHERE id=:id";
		$this->database->prepare($query);
		$this->database->bind(":active", $active);
		$this->database->bind(":id", $id);
		$this->database->execute();
		return;
	}

	public function uploadFile($file)
	{
		// Check if file size is bigger then zero because it is empty otherwise
		if ($file['size'] !== 0) {
			$target_dir = "./images/logos/";
			$target_file = $target_dir . basename($_POST["id"] . ".jpg");
			// Select file type
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			// Valid file extensions
			$extensions_arr = array("jpg", "jpeg", "png");
			// Check extension
			if (in_array($imageFileType, $extensions_arr)) {
				// Upload file
				if (!move_uploaded_file($file['tmp_name'], $target_file)) {
					$result = array('upload' => 'false', 'message' => 'er is een error opgetreden probeer het opnieuw');
					return $result;
				} else {
					$result = array('upload' => 'true', 'message' => $target_file, 'name' => $_POST["id"] . ".jpg");
					return $result;
				}
			} else {
				$result = array('upload' => 'false', 'message' => 'ongeldige bestand type alleen jpg, jprg, png zijn toegestaan');
				return $result;
			}
		} else {
			$result = array('upload' => 'false', 'message' => 'geen logo binnengekregen controleer het formulier, en proebeer het opnieuw');
			return $result;
		}
	}

	public function deleteUser($id)
	{
		if (($id == null) || ($id == "")) {
			return;
		}
		$query = "DELETE FROM cinema WHERE id=:id LIMIT 1";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		$this->database->execute();
		return;
	}

	public function getaccount($id)
	{
		$id = intval($id);
		if ((!is_int($id)) || ($id == 0)) {
			$data["message"] = "Geen geldig account!";
			return $data;
		}
		$query = "SELECT * FROM cinema WHERE id=:id AND id > 0";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		$data = $this->database->getRow();
		if (!$data) {
			$data["message"] = "Dit account bestaat niet!";
			return $data["message"];
		} else {
			return $data;
		}
	}

	public function updateaccount()
	{
		$data = [
			"name_error" => null,
			"mail_error" => null,
			"locatie_error" => null,
			"phone_error" => null,
			"description_error" => null,
			"logo_error" => null,
			"adress_error" => null,
			"error" => false,
			"message" => null,
			"id" => $_POST["id"]
		];
		if ((!isset($_POST["name"])) || ($_POST["name"] == "")) {
			$data["name_error"] = "Error naam is leeg!";
			$data["error"] = true;
		}
		if ((!isset($_POST["mail"])) || ($_POST["mail"] == "")) {
			$data["mail_error"] = "Error email is leeg!";
			$data["error"] = true;
		}
		if ((!isset($_POST["location"])) || ($_POST["location"] == "")) {
			$data["locatie_error"] = "Error locatie is leeg!";
			$data["error"] = true;
		}
		if ((!isset($_POST["phone"])) || ($_POST["phone"] == "")) {
			$data["phone_error"] = "Error telefoon is leeg!";
			$data["error"] = true;
		}
		if ((!isset($_POST["description"])) || ($_POST["description"] == "")) {
			$data["description_error"] = "Error description is leeg!";
			$data["error"] = true;
		}
		if ((!isset($_POST["adress"])) || ($_POST["adress"] == "")) {
			$data["adress_error"] = "Error adres is leeg!";
			$data["error"] = true;
		}

		if ($data["error"]) {
			return $data;
		}
		$name = trim($_POST["name"]);
		$mail = trim($_POST["mail"]);
		$location = trim($_POST["location"]);
		$adress = trim($_POST["adress"]);
		$phone = trim($_POST["phone"]);
		$description = trim($_POST["description"]);

		if ((!isset($_FILES["logo"])) || ($_FILES["logo"]["size"] != 0)) {
			$logo = $this->uploadFile($_FILES["logo"]);
			if ($logo["upload"]) {
				$query = "UPDATE cinema SET name=:name, mail=:mail, location=:location, adress=:adress, logo=:logo, phone=:phone, description=:description WHERE id=:id";
				$this->database->prepare($query);
				$this->database->bind(":logo", $logo["name"]);
			} else {
				$data["logo_error"] = $logo["message"];
				return $data;
			}
		} else {
			$query = "UPDATE cinema SET name=:name, mail=:mail, location=:location, adress=:adress, phone=:phone, description=:description WHERE id=:id";
			$this->database->prepare($query);
		}
		$this->database->bind(":name", $name);
		$this->database->bind(":mail", $mail);
		$this->database->bind(":location", $location);
		$this->database->bind(":adress", $adress);
		$this->database->bind(":phone", $phone);
		$this->database->bind(":description", $description);
		$this->database->bind(":id", $_POST["id"]);
		if ($this->database->execute()) {
			$data["message"] = "Account bijgewerkt!";
		} else {
			$data["message"] = "Er ging iets fout bij het toevoegen!";
		}
		return $data;
	}
}
