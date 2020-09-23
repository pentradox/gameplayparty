<?php

class Dashboard extends controller {

  public function __construct() {
    $this->hallsModel = $this->model("Halls");
  }

  public function index() {
    if ($_SESSION["userid"] != null) {
      $this->view("pages/dashboard");
    } else {
      $this->redirect("Userlogin");
    }
  }

  public function createhall() {
    if ($_SESSION["userid"] != null) {
      $data = [
        "hall_number_error" => null,
        "hall_seats_error" => null,
        "hall_sound_error" => null,
        "error" => null,
        "success_message" => null
      ];
      if ((!isset($_POST["hall_number"])) && (!isset($_POST["hall_seats"])) && (!isset($_POST["hall_sound"]))) {
        $this->view("pages/createHall",$data);
      } else {
        $data = $this->hallsModel->createHall($data);
        $this->view("pages/createHall",$data);
      }
    } else {
      $this->redirect("Userlogin");
    }
  }

}
