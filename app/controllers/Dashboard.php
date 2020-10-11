<?php

class Dashboard extends Controller {

  public function __construct() {
    $this->hallsModel = $this->model("Halls");
    $this->adminModel = $this->model("Admin");
    $this->packagesModel = $this->model("Packages");
  }

  public function index() {
    if ($this->sessionCheck()) {
      $data = $this->adminModel->fetchContent('home');
      $data2 = $this->adminModel->fetchContent('contact');
      $data = array($data, $data2);
      $this->view("pages/dashboard", $data);
    }
  }

  // Crud Cinema Halls - Start
  public function halls() {
    if ($this->sessionCheck()) {
      $data["halls"] = $this->hallsModel->getAllHalls();
      $this->view("pages/halls", $data);
    }
  }

  public function updatecontent($page) {
    $error = false;
    if($page == 'home') {
      $data1 = [
          "home_title"  => trim($_POST['home_title']),
          "home_text" => trim($_POST['home_text']),
          "home_section_1_title" => trim($_POST['home_section_1_title']),
          "home_section_1_text" => trim($_POST['home_section_1_text']),
          "home_section_2_title" => trim($_POST['home_section_2_title']),
          "home_section_2_text" => trim($_POST['home_section_2_text']),

        ];
        $data = array('home', $data1);
    } else {
      if($page == 'contact') {
        $data1 = [
          "contact_title"  => trim($_POST['contact_title']),
          "contact_text" => trim($_POST['contact_text']),
          "contact_section_1_title" => trim($_POST['contact_section_1_title']),
          "contact_section_1_text" => trim($_POST['contact_section_1_text']),
          "contact_section_2_title" => trim($_POST['contact_section_2_title']),
          "contact_section_2_text" => trim($_POST['contact_section_2_text'])
        ];
        $data = array('contact', $data1);
      }
    }
      foreach ($data[1] as $key => $value) {
        if (empty($key)) {
          $error = true;
        }
      }
      $page = $data[0];
      if($error === false) {
        $update = $this->adminModel->contentupdate($data);
        if($page == 'home') {
          $this->redirect("Dashboard/frontpageEditor");
        } else if($page == 'contact'){
          $this->redirect("Dashboard/contentPageEditor");
        }
      } else {
        if($page == 'home') {
          $this->redirect("Dashboard/frontpageEditor");
        } else if($page == 'contact'){
          $this->redirect("Dashboard/contentpageEditor");
        }
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

  public function acounts() {
    if ($this->sessionCheck(1)) {
      $data["users"] = $this->adminModel->getAllAccounts();
      $this->view("pages/acounts",$data);
    }
  }

  public function updateaccount($id = null) {
    if ($this->sessionCheck()) {
      if ((isset($id)) || (isset($_POST["id"]))) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $data = $this->adminModel->updateaccount();
          $data["user"] = $this->adminModel->getaccount($_POST["id"]);
          $this->view("pages/editaccount",$data);
        } else {
          $data["user"] = $this->adminModel->getaccount($id);
          if (!isset($data["user"]->message)) {
            $this->view("pages/editaccount",$data);
          } else {
            $this->redirect("Dashboard");
          }
        }
      } else {
        $this->redirect("Dashboard");
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
      if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $this->view("pages/createPacket");
      } else {
        $data = $this->packagesModel->addPacket();
      }
    }
  }

  public function packages() {
    if ($this->sessionCheck(1)) {
      $data = $this->packagesModel->fetchPackages();
      $this->view("pages/packages", $data);
    }
  }

  public function deletePackage() {
    if ($this->sessionCheck(1)) {
      $data = $this->packagesModel->fetchPackages();
      $data["delete"] = $this->packagesModel->deletePackage();
      $this->view("pages/packages", $data);
    }
  }

  public function activatePackage($id) {
    if ($this->sessionCheck(1)) {
      $this->adminModel->activatePackage($id);
      $this->redirect("Dashboard/packages");
    }
  }

  public function updatePackage() {
    if ($this->sessionCheck(1)) {
    }
  }

  public function agenda() {
    $this->view("pages/agenda");
  }

  // Page editor routing START

  public function pageOverview() {
    if ($this->sessionCheck(1)) {
      $this->view("pages/pageoverview");
    }
  }

  public function frontpageEditor() {
    if ($this->sessionCheck(1)) {
      $data = $this->adminModel->fetchContent('home');
      $this->view("pages/homeeditor", $data);
    }
  }

  public function contactPageEditor() {
    if ($this->sessionCheck(1)) {
      $data = $this->adminModel->fetchContent('contact');
      $this->view("pages/contacteditor", $data);
    }
  }

  // Page editor routing END
}