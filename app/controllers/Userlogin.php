<?php
class Userlogin extends Controller {
  
  public function __construct() {
    $this->loginModel = $this->model("Login");
  }

  public function loginCheck() {  
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $login = $this->loginModel->LoginCheck($username, $password);
    if($login == null) {
      $this->redirect("Dashboard");
    } else {
      $data = [
        "error" => $login
      ];
      $this->view("pages/login", $data);
    }
  }

  public function index() {
    if ((isset($_POST["username"])) && (isset($_POST["password"]))) {
      $this->loginCheck();
    } else {
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
  }

  public function logout() {
    session_unset();
    $this->redirect("home");
  }

}


?>
