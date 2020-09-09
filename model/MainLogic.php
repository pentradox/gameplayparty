<?php
//require_once 'model/Database.php';

class MainLogic {

	//private $database;

	public function __construct() {
		//$this->database = new Database;
	}

	public function createView($page){
		$filename = 'view/' . $page . '.php';
		include 'view/header.php';
		if (file_exists($filename)) {
		    include $filename;
		} else {
			include 'view/error.php';
		}
		include 'view/footer.php';
	}

	public function createViewComplex($header, $page, $footer){
		if(empty($header)) {$header = 'empty';}
		if(empty($page)) {$page = 'empty';}
		if(empty($footer)) {$footer = 'empty';}
		$header = 'view/' . $header . '.php';
		$page = 'view/' . $page . '.php';
		$footer = 'view/' . $footer . '.php';
		if (file_exists($header) && file_exists($header) && file_exists($header)) {
			include $header;
			include $page;
			include $footer;
		} else {
			include 'view/header.php';
		    include 'view/error.php';
			include 'view/footer.php';
		}
	}

	public function readContact(){
		//$query = "SELECT * ";
        //$query .= "FROM users ";
        //$this->database->prepare($query);
        ///$this->database->bind(":radius", $radius);
        //return $this->database->getArray();
	}

	public function updateContact($name, $phone, $email, $address, $id){

	}

	public function write($array){
		echo var_dump($array);
		$myfile = fopen("saves.txt", "w") or die("Unable to open file!");
		$length = count($array);
		for ($i = 0; $i < count($array); $i++) {
			$txt = "$array[$i]\n";
			fwrite($myfile, $txt);
		}
		fclose($myfile);
	}
}
