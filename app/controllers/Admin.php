<?php
class Admin extends controller {

  public function index() {
    $this->viewSolo("fragments/header");
    $this->viewSolo("pages/login");
  }

}


 ?>
