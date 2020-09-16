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
      $this->redirect("home");
    } else {
      $this->redirect("admin");
    }
  }

  public function index() {
    $this->view("pages/login");
  }

  public function logout() {
    session_unset();
    $this->redirect("home");
  }

  public function dashboard() {
    if ($_SESSION["userid"] != null) {
      $this->view("pages/dashboard");
    } else {
      $this->redirect("admin");
    }
  }

}


?>
