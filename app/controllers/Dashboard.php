<?php

class Dashboard extends controller {

  public function __construct() {
    $this->cinemaModel = $this->model("Cinema");
  }

  public function index() {
    if ($_SESSION["userid"] != null) {
      $this->view("pages/dashboard");
    } else {
      $this->redirect("Userlogin");
    }
  }

  public function addCinema() {
    if ($_SESSION["userid"]) {
      $this->view("pages/addcinema");
    } else {
      $this->redirect("Userlogin");
    }
  }

  public function createCinema() {
    if ($_SESSION["userid"]) {
      if ((isset($_POST["company_name"])) && (isset($_POST["location"])) && (isset($_POST["company_logo"]))) {
        $company_name = trim($_POST["company_name"]);
        $location = trim($_POST["location"]);
        $company_logo = trim($_POST["company_logo"]);

        $message = $this->cinemaModel->createCinema($company_name,$location,$company_logo);
        echo var_dump($message);
      } else {
        $data = [
          "error" => "unset"
        ];
        $this->view("pages/addcinema",$data);
      }
    } else {
      $this->redirect("Userlogin");
    }
  }

}
