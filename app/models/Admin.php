<?php

class Admin {
    private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function getAllAccounts() {
		// Gets all rows by id
        $query = "SELECT * FROM cinema";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
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
}