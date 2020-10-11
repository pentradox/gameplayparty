<?php

class Packages {
    private $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function addPacket() {
        if (isset($_POST["packet_name"])) {
            $packet_name = $_POST["packet_name"];
        } else {
            $data["packet_name_error"] = "Paket naam is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (isset($_POST["packet_price"])) {
            $packet_price = $_POST["packet_price"];
        } else {
            $data["packet_price_error"] = "Paket prijs is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (isset($_POST["packet_description"])) {
            $packet_description = $_POST["packet_description"];
        } else {
            $data["packet_description_error"] = "Paket beschrijving is leeg!";
            $data["error"] = true;
            return $data;
        }
		$query = "INSERT INTO packages (name, price, description) VALUES (:name, :price, :description)";
		$this->database->prepare($query);
		$this->database->bind(":name", $packet_name);
		$this->database->bind(":price", $packet_price);
		$this->database->bind(":description", $packet_description);
		if (!$this->database->execute()) {
            $data["error"] = "Error er ging iets fout!";
        } else {
            $data["message"] = "paket toegevoed!";
        }
        return $data;
    }
    
    public function fetchPackages() {
        $query = "SELECT * FROM packages";
        $this->database->prepare($query);
        $data["packages"] = $this->database->getArray();
        return $data;
    }

    public function deletePackage() {
        if (!isset($_POST["id"])) {
            $data["id_error"] = "Error dit paket bestaat niet!";
        } else {
            $id = $_POST["id"];
        }

        $query = "DELETE FROM packages WHERE id=:id LIMIT 1";
        $this->database->prepare($query);
        $this->database->bind(":id", $id);
        if (!$this->database->execute()) {
            $data["error"] = "Error er ging iets fout!";
        } else {
            $data["message"] = "paket is verwijderd!";
        }
    }

    public function updatePackage() {
        if (!isset($_POST["name"])) {
            $data["name_error"] = "Error paket naam is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (!isset($_POST["price"])) {
            $data["price_error"] = "Error paket prijs is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (!isset($_POST["desc"])) {
            $data["desc_error"] = "Error paket beschrijving is leeg!";
            $data["error"] = true;
            return $data;
        }

        $name = $_POST["name"];
        $price = $_POST["price"];
        $desc = $_POST["desc"];

        $query = "UPDATE packages SET name=:name, price=:price, description=:description";
        $this->database->prepare($query);
        $this->database->bind(":name",$name);
        $this->database->bind(":price",$price);
        $this->database->bind(":description",$desc);
        if (!$this->database->execute()) {
            $data["error"] = "Error er ging iets fout";
        } else {
            $data["message"] = "Paket aangepast!";
        }
        return $data;
    }
}