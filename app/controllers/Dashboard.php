<?php

class Dashboard extends controller
{
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
      $this->view("pages/addcinema");
    } else {
      $this->redirect("Userlogin");
    }
  }

}
