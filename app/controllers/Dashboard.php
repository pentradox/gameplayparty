<?php

class Dashboard extends controller {

  public function __construct() {
    $this->hallsModel = $this->model("Halls");
    $this->adminModel = $this->model("Admin");
  }

  public function index() {
    if ($this->sessionCheck()) {
      $data = $this->adminModel->fetchContent();
      $this->view("pages/dashboard", $data);
    }
  }

  // Crud Cinema Halls - Start
  public function halls() {
    if ($this->sessionCheck()) {
      $data["halls"] = $this->hallsModel->getAllHalls();
      $this->view("Pages/halls", $data);
    }
  }

  public function updatecontent() {
    $error = false;
    $data = [
        "home_title"  => trim($_POST['home_title']),
        "home_text" => trim($_POST['home_text']),
        "section_1_title" => trim($_POST['section_1_title']),
        "section_1_text" => trim($_POST['section_1_text']),
        "section_2_title" => trim($_POST['section_2_title']),
        "section_2_text" => trim($_POST['section_2_text'])
      ];
    if (empty($data['home_title'])) {
        $error = true;
      }
      if (empty($data['home_text'])) {
        $error = true;
      }
      if (empty($data['section_1_title'])) {
        $error = true;
      }
      if (empty($data['section_1_text'])) {
        $error = true;
      }
      if (empty($data['section_2_title'])) {
        $error = true;
      }
      if (empty($data['section_2_text'])) {
        $error = true;
      }
      if($error === false) {
        $update = $this->adminModel->contentupdate($data);
        $this->redirect("Dashboard");
      } else {
        $this->redirect("Dashboard");
      }
  }

  public function updatehall($id = null) {
    if ($this->sessionCheck()) {
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
  }

  public function deletehall($id = null) {
    if ($this->sessionCheck()) {
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
  }

  public function createhall() {
    if ($this->sessionCheck()) {
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
  }
  // Crud Cinema Halls - End

  public function profile() {
    if ($this->sessionCheck()) {
      $this->view("Pages/profile");
    }
  }

  public function acounts() {
    if ($this->sessionCheck(1)) {
      $data["users"] = $this->adminModel->getAllAccounts();
      $this->view("Pages/acounts",$data);
    }
  }

  public function updateaccount($id) {
    if ($this->sessionCheck(1)) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $this->view("Pages/editaccount");
      } else {
        $this->view("Pages/editaccount");
      }
    }
  }

  public function activate($id) {
    if ($this->sessionCheck(1)) {
      $this->adminModel->activateAccount($id);
      $this->redirect("Dashboard/acounts");
    }

  }

  public function deleteUser($id) {
    if ($this->sessionCheck(1)) {
      $this->adminModel->deleteUser($id);
      $this->redirect("Dashboard/acounts");
    }
  }

  public function createPacket() {
    if ($this->sessionCheck(1)) {
      $this->view("Pages/createPacket");
    }
  }


}
