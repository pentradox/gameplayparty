<?php

class Packages {
    private $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function addPacket() {
        if (!empty($_POST['packet_name'])) {
            $packet_name = $_POST["packet_name"];
        } else {
            $data["packet_name_error"] = "Pakket naam is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (!empty($_POST["packet_price"])) {
            $packet_price = $_POST["packet_price"];
        } else {
            $data["packet_price_error"] = "Pakket prijs is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (!empty($_POST["packet_description"])) {
            $packet_description = $_POST["packet_description"];
        } else {
            $data["packet_description_error"] = "Pakket beschrijving is leeg!";
            $data["error"] = true;
            return $data;
        }

        $this->database->beginTransaction();
		$query = "INSERT INTO packages (name, price, description) VALUES (:name, :price, :description)";
		$this->database->prepare($query);
		$this->database->bind(":name", $packet_name);
		$this->database->bind(":price", $packet_price);
        $this->database->bind(":description", $packet_description);
		if (!$this->database->execute()) {
            $data["error"] = "Error er ging iets fout!";
            return $data;
        }
        
        $query = "SELECT LAST_INSERT_ID() AS id";
        $this->database->prepare($query);
        $id = $this->database->getRow();

        if ((!isset($_FILES["logo"])) || ($_FILES["logo"]["size"] != 0)) {
			$logo = $this->uploadFile($_FILES["logo"], $id->id);
			if ($logo["upload"]) {
                $logo = $logo["name"];
			} else {
				$data["logo_error"] = $logo["message"];
				return $data;
			}
		} else {
			$data["logo_error"] = "Error geen afbeelding!";
			return $data;
        }
        $query = "UPDATE packages SET image=:logo WHERE id=:id LIMIT 1";
        $this->database->prepare($query);
        $this->database->bind(":logo", $logo);
        $this->database->bind(":id", $id->id);
        $this->database->execute();
        if (!$this->database->commit()) {
            $this->database->rollBack();
            $data["error"] = "Error er ging iets fout!";
            return $data;
        } else {
            $data["message"] = "Product Toegevoegd!";
        }
        return $data;

    }
    
    public function fetchPackages($active = 0) {
        if ($active) {
            $query = "SELECT * FROM packages WHERE active=1";
        } else {
            $query = "SELECT * FROM packages";
        }
        $this->database->prepare($query);
        $data["packages"] = $this->database->getArray();
        return $data;
    }

    public function deletePackage($id) {
        if (!isset($id)) {
            $data["id_error"] = "Error dit pakket bestaat niet!";
        }

        $query = "DELETE FROM packages WHERE id=:id LIMIT 1";
        $this->database->prepare($query);
        $this->database->bind(":id", $id);
        if (!$this->database->execute()) {
            $data["error"] = "Error er ging iets fout!";
        } else {
            $data["message"] = "Pakket is verwijderd!";
        }
    }

    public function updatePackage($id) {

        $query = "SELECT * FROM packages WHERE id=:id";
        $this->database->prepare($query);
        $this->database->bind(":id", $id);
        $data["package"] = $this->database->getRow();
        if (!$data["package"]) {
            $data["error"] = "Error er ging iets fout!";
        }

        if (empty($id)) {
            $data["error_id"] = "Dit pakket bestaat niet!";
            $data["error"] = true;
            return $data;
        }
        if (empty($_POST["name"])) {
            $data["name_error"] = "Error pakket naam is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (empty($_POST["price"])) {
            $data["price_error"] = "Error pakket prijs is leeg!";
            $data["error"] = true;
            return $data;
        }
        if (empty($_POST["desc"])) {
            $data["desc_error"] = "Error pakket beschrijving is leeg!";
            $data["error"] = true;
            return $data;
        }

        $name = $_POST["name"];
        $price = $_POST["price"];
        $desc = $_POST["desc"];

        if ((!isset($_FILES["logo"])) || ($_FILES["logo"]["size"] != 0)) {
			$logo = $this->uploadFile($_FILES["logo"], $id);
			if ($logo["upload"]) {
				$query = "UPDATE packages SET name=:name, price=:price, description=:description, image=:logo WHERE id=:id LIMIT 1";
				$this->database->prepare($query);
				$this->database->bind(":logo", $logo["name"]);
			} else {
				$data["logo_error"] = $logo["message"];
				return $data;
			}
		} else {
			$query = "UPDATE packages SET name=:name, price=:price, description=:description WHERE id=:id LIMIT 1";
			$this->database->prepare($query);
		}
        $this->database->bind(":name",$name);
        $this->database->bind(":price",$price);
        $this->database->bind(":description",$desc);
        $this->database->bind(":id",$id);
        if (!$this->database->execute()) {
            $data["error"] = "Error er ging iets fout";
        } else {
            $data["message"] = "Pakket aangepast!";
        }

       

        return $data;
    }

    public function activatePackage($id) {
		$query = "SELECT active FROM packages WHERE id=:id";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		$data = $this->database->getRow();
		if ($data->active) {
			$active = 0;
		} else {
			$active = 1;
		}
		$query = "UPDATE packages SET active=:active WHERE id=:id";
		$this->database->prepare($query);
		$this->database->bind(":active", $active);
		$this->database->bind(":id", $id);
		$this->database->execute();
		return;
    }
    
    public function fetchPackage($id) {
        if (!isset($id)) {
            $data["error_id"] = "Dit pakket bestaat niet!";
            $data["error"] = true;
            return $data;
        }

        $query = "SELECT * FROM packages WHERE id=:id";
        $this->database->prepare($query);
        $this->database->bind(":id", $id);
        $data["package"] = $this->database->getRow();
        if (!$data["package"]) {
            $data["error"] = "Error er ging iets fout!";
        }
        return $data;
    }

    public function uploadFile($file, $id) {
		// Check if file size is bigger then zero because it is empty otherwise
		if($file['size'] !== 0) {
			$target_dir = "./images/packages/";
			$target_file = $target_dir . basename($id . ".jpg");
			// Select file type
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Valid file extensions
			$extensions_arr = array("jpg","jpeg","png");
			// Check extension
			if( in_array($imageFileType,$extensions_arr) ){
				// Upload file
				if(!move_uploaded_file($file['tmp_name'], $target_file)) {
					$result = array('upload' => 'false', 'message' => 'er is een error opgetreden probeer het opnieuw');
					return $result;
				} else {
					$result = array('upload' => 'true', 'message' => $target_file, 'name' => $id . ".jpg");
					return $result;
				}
			} else {
				$result = array('upload' => 'false', 'message' => 'Ongeldige bestand type alleen jpg, jprg, png zijn toegestaan');
				return $result;
			}
		} else {
			$result = array('upload' => 'false', 'message' => 'Geen logo binnengekregen controleer het formulier, en proebeer het opnieuw');
			return $result;
		}
	}
}