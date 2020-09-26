<?php

class Dashboard extends controller {

  public function __construct() {
    $this->hallsModel = $this->model("Halls");
    $this->adminModel = $this->model("Admin");
  }

  public function index() {
    $this->sessionCheck();
    $this->view("pages/dashboard");
  }

  // Crud Cinema Halls - Start
  public function halls() {
    $this->sessionCheck();
    $data["halls"] = $this->hallsModel->getAllHalls();
    $this->view("Pages/halls", $data);
  }

  public function updatehall($id = null) {
    $this->sessionCheck();
    $data = [
      "hall_message" => null,
      "hall_message_class" => null,
      "has_id" => true,
      "hall" => null,
      "halls" => null,
      "hall_number_error" => null,
      "hall_seats_error" => null,
      "hall_sound_error" => null,
      "error" => null,
      "success_message" => null
    ];
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $data = $this->hallsModel->getHall($id,$data);
      if ($data["has_id"]) {
        if ($data["hall_message"] != null) {
          $data["halls"] = $this->hallsModel->getAllHalls();
          $this->view("pages/halls",$data);
        } else {
          $this->view("pages/updateHall",$data);
        }
      } else {
        $this->redirect("Dashboard/halls");
      }
    } else {
      $data = $this->hallsModel->sendUpdateHall($data);
      $data = $this->hallsModel->getHall($data["id"],$data);
      $this->view("pages/updateHall",$data);
    }
  }

  public function deletehall($id = null) {
    $this->sessionCheck();
    $data = [
      "hall_message" => null,
      "hall_message_class" => null,
      "halls" => null,
      "has_id" => true
    ];
    $data = $this->hallsModel->deletehall($id,$data);
    if ($data["has_id"]) {
      $data["halls"] = $this->hallsModel->getAllHalls();
      $this->view("pages/halls",$data);
    } else {
      $this->redirect("Dashboard/halls");
    }
  }

  public function createhall() {
    $this->sessionCheck();
    $data = [
      "hall_number_error" => null,
      "hall_seats_error" => null,
      "hall_sound_error" => null,
      "error" => null,
      "hall_message" => null,
      "hall_message_class" => null
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = $this->hallsModel->createHall($data);
      if ($data["hall_message"] != null) {
        $data["halls"] = $this->hallsModel->getAllHalls();
        $this->view("pages/halls",$data);
      } else {
        $this->view("pages/createHall",$data);
      }
    } else {
      $this->view("pages/createHall",$data);
    }
  }
  // Crud Cinema Halls - End

  public function acounts() {
    $this->sessionCheck(1);
    $data["users"] = $this->adminModel->getAllAccounts();
    $this->view("Pages/acounts",$data);
  }

  public function updateaccount($id) {
    $this->sessionCheck(1);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->view("Pages/editaccount");
    } else {
      $this->view("Pages/editaccount");
    }
  }

  public function activate($id) {
    $this->sessionCheck(1);
    $data = [
      
    ];
    $this->adminModel->activateAccount($id);
    
  }

  public function createPacket() {
    $this->sessionCheck(1);
    $this->view("Pages/createPacket");
  }


}
