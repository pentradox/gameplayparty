<?php
/*
 * MainLogic aka first and basic controller
 *
 * copyright wesley van der vliet
*/

class MainLogic {

	//private $database;

	public function __construct() {
		//$this->database = new Database;
	}

	public function createView($page){
		$filename = 'view/' . $page . '.php';
		include 'view/fragments/header.php';
		if (file_exists($filename)) {
		  include $filename;
		} else {
			include 'view/error.php';
		}
		include 'view/fragments/footer.php';
	}

	public function createViewComplex($header, $page, $footer){
		if(empty($header)) {$header = 'empty';}
		if(empty($page)) {$page = 'empty';}
		if(empty($footer)) {$footer = 'empty';}
		$header = 'view/fragments/' . $header . '.php';
		$page = 'view/' . $page . '.php';
		$footer = 'view/fragments/' . $footer . '.php';
		if (file_exists($header) && file_exists($header) && file_exists($header)) {
			include $header;
			include $page;
			include $footer;
		} else {
			include 'view/fragments/header.php';
		  include 'view/error.php';
			include 'view/fragments/footer.php';
		}
	}

	public function readContact(){
	//$query = "SELECT * ";
    //$query .= "FROM users ";
    //$this->database->prepare($query);
    //$this->database->bind(":radius", $radius);
    //return $this->database->getArray();
	}

}
