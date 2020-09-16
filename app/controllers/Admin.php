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
      $this->redirect("Dashboard");
    } else {
      $this->redirect("Admin");
    }
  }

  public function index() {
    if (isset($_SESSION["userid"])) {
      if ($_SESSION["userid"] != null) {
        $this->redirect("Dashboard");
      } else {
        $this->view("pages/login");
      }
    } else {
      $this->view("pages/login");
    } 
  }

  public function logout() {
    session_unset();
    $this->redirect("home");
  }

}


?>
