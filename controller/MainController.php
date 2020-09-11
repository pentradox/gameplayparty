<?php
/*
 * MainController first and basic controller
 *
 * copyright wesley van der vliet
*/

require_once 'model/config.php';
require_once 'model/MainLogic.php';
class MainController {

	public function __construct() {
		$this->MainLogic = new MainLogic();
	}

	public function handleRequest() {
		try {
			$op = isset($_REQUEST['op'])?$_REQUEST['op']:NULL;
			$url = strtolower($_GET['url']);
			if(!empty($op)) {
				switch ($op) {
					case 'create':
					$this->collectCreateContact();
					break;
					case 'reads':
					$this->collectReadMain();
					break;
					case 'read':
					$this->collectReadContact($_REQUEST['id']);
					break;
					case 'update':
					$this->collectUpdateContact();
					break;
					default:
					$this->MainLogic->createView('home');
					break;
				}
			} else {
				switch ($url) {
					case '':
					case 'index.php':
					case 'home':
					case 'index':
						$this->MainLogic->createView('home');
					break;
					case 'info':
					case 'information':
					case 'informatie':
						$this->MainLogic->createView('info');
					break;
					case 'contact':
						$this->MainLogic->createView('contact');
					break;
					case 'route':
						$this->MainLogic->createView('route');
					break;
					default:
						$this->displayError($url);
					break;
				}
			}
		} catch (ValidationException $e) {
				$errors = $e->getErrors();
		}

	}

	public function collectReadMain(){
		$test = $this->MainLogic->readContact();
		var_dump($test);
	}

	public function displayError($url) {
		$this->MainLogic->createView('errorUrl');
	}
	public function __destruct(){
	}

}

?>
