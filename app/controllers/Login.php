<?php
class Login extends controller {
  public function __construct() {
    //$this->bikesModel = $this->model("Bikes");
  }

  public function index() {
    $this->viewSolo("fragments/header");
    $this->viewSolo("pages/login");
  }
}


 ?>
