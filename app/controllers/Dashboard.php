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

  public function halls() {
    if ($_SESSION["userid"] != null) {
      $data["halls"] = $this->hallsModel->getAllHalls();
      $this->view("Pages/halls", $data);
    }
  }

  public function acounts() {
    $this->view("Pages/acounts");
  }

  public function updatehall($id = null) {
    if ($_SESSION["userid"] != null) {
      if (isset($id)) {
        $data = $this->hallsModel->getHall($id);
        if ($data["hall_error"] != null) {
          $data["halls"] = $this->hallsModel->getAllHalls();
          $this->view("pages/halls",$data);
        } else {
          $this->view("pages/updateHall",$data);
        }
      } else {
        $data = $this->hallsModel->sendUpdateHall();
        $data2 = $this->hallsModel->getHall($data["id"]);
        $data["hall"] = $data2["hall"];
        if ($data["success_message"] != null) {
          $this->view("pages/updateHall",$data);
        } else {
          $this->view("pages/updateHall",$data);
        }
      }
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
