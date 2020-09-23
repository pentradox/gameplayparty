<?php

class Register extends Controller {
  function index() {
    $this->userModel = $this->model("registerBios");
    if($_SERVER['REQUEST_METHOD'] == "GET") {
      $this->view("pages/registerForm");
    } else {
      $error = false;
      $data = [
        "email"  => trim($_POST['email']),
        "reason" => trim($_POST['reason']),
        "username" => trim($_POST['username']),
        "password" => trim($_POST['password']),
        "email_error" => "",
        "reason_error" => "",
        "username_error" => "",
        "password_error" => ""
      ];
      // Validate
      if (empty($data['email'])) {
        $error = true;
      }
      if (empty($data['reason'])) {
        $error = true;
      }
      if (empty($data['username'])) {
        $error = true;
      }
      if (empty($data['password'])) {
        $error = true;
      }
      // Check of no errors have been found
      if ($error == false) {
        // Register user
        if ($this->userModel->register($data)) {
          $data = "uw acount is aangemaakt en wacht op goedkeuring";
          $this->view("pages/registerForm", $data);
        } else {
          die("Registratie is niet gelukt");
        }
      } else {
        // Load view to display errors
        $data = "er is een probleem met uw aanvraag proebeer het opnieuw";
        $this->view("pages/registerForm", $data);
      }
    }
  }
}

?>
