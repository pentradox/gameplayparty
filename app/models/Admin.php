<?php

class Admin {
    private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function fetchContent() {
      $query = "SELECT * FROM pages";
      $this->database->prepare($query);
      $data = $this->database->getArray();
      return $data;
    }

    public function contentupdate($data) {
      $query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
      $this->database->prepare($query);
      $this->database->bind(":title", $data['home_title']);
      $this->database->bind(":text", $data['home_text']);
      $this->database->bind(":id", 1);
      $this->database->execute();
      $query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
      $this->database->prepare($query);
      $this->database->bind(":title", $data['section_1_title']);
      $this->database->bind(":text", $data['section_1_text']);
      $this->database->bind(":id", 2);
      $this->database->execute();
      $query = "UPDATE pages SET title=:title, text=:text WHERE id=:id";
      $this->database->prepare($query);
      $this->database->bind(":title", $data['section_2_title']);
      $this->database->bind(":text", $data['section_2_text']);
      $this->database->bind(":id", 3);
      $this->database->execute();
    }

    public function getAllAccounts() {
		// Gets all rows by id
        $query = "SELECT * FROM cinema WHERE id > 0";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
    }

    public function activateAccount($id) {
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

    public function uploadFile($file) {
		// Check if file size is bigger then zero because it is empty otherwise
		if($file['size'] !== 0) {
			$name = $file['name'];
			$target_dir = URLROOT . "/public/images/logos";
			$target_file = $target_dir . basename($file["name"]);
			// Select file type
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Valid file extensions
			$extensions_arr = array("jpg","jpeg","png","gif");
			// Check extension
			if( in_array($imageFileType,$extensions_arr) ){
				// Upload file
				if(file_exists($target_file)) {
					$result = array('upload' => 'false', 'message' => 'er is al een logo met deze naam, noem het bestand anders en probeer het opnieuw');
					return $result;
				} else {
					if(!move_uploaded_file($file['tmp_name'],$target_dir.$name)) {
						$result = array('upload' => 'false', 'message' => 'er is een error opgetreden probeer het opnieuw');
						return $result;
					} else {
						$result = array('upload' => 'true', 'message' => $target_file);
						return $result;
					}
				}
			} else {
				$result = array('upload' => 'false', 'message' => 'ongeldige bestand type alleen jpg, jprg, png, gif zijn toegestaan');
				return $result;
			}
		} else {
			$result = array('upload' => 'false', 'message' => 'geen logo binnengekregen controleer het formulier, en proebeer het opnieuw');
			return $result;
		}
	}

	public function deleteUser($id) {
		if (($id == null) || ($id == "")) {
			return;
		}
		$query = "DELETE FROM cinema WHERE id=:id LIMIT 1";
		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		$this->database->execute();
		return;
	}
}
