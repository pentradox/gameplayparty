<?php

class Register extends Controller {
  public function __construct() {
    $this->loginModel = $this->model("Login");
  }
  function index() {
    
    if($_SERVER['REQUEST_METHOD'] == "GET") {
      $this->view("pages/registerForm");
    } else {
      $this->loginModel->register();
      $this->redirect("Userlogin");
    }
  }
}

?>
