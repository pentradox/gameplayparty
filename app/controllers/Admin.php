<?php
class Admin extends controller {

  public function __construct() {
    $this->loginModel = $this->model("Login");
  }

  public function loginCheck() {
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $login = $this->loginModel->LoginCheck($username, $password);
    if($login == true) {
      $this->view("pages/index");
    } else {
      $this->view("pages/login");
    }
  }

  public function index() {
    $this->viewSolo("fragments/header");
    $this->viewSolo("pages/login");
  }

}


 ?>
