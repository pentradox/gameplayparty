<?php

// Create Pages class
class Home extends Controller {
  public function __construct() {
    $this->homeModel = $this->model("Homepage");
  }
  public function index() {
    $data = $this->homeModel->cinema();
    $data2 = $this->homeModel->fetchcontent('home');
    $data = array($data, $data2);
    $this->view("pages/index",$data);
  }

  public function contact() {
    $data = $this->homeModel->fetchcontent('contact');
    $this->view("pages/contact",$data);
  }
  public function info() {
    $this->view("pages/info");
  }
  public function sendmail() {
    $error = false;
    $data = [
      "firstname"  => trim($_POST['firstname']),
      "lastname" => trim($_POST['lastname']),
      "email" => trim($_POST['email']),
      "message" => trim($_POST['message']),
    ];
    if (empty($data['firstname'])) {
      $error = true;
    }
    if (empty($data['lastname'])) {
      $error = true;
    }
    if (empty($data['email'])) {
      $error = true;
    }
    if (empty($data['message'])) {
      $error = true;
    }
    if($error === false) {
      $sendmail = $this->homeModel->sendmail($data);
      $this->redirect("Home/Conatct");
    } else {
      $this->redirect("Home/Conatct");
    }
  }

  public function privacy() {

    $this->view("pages/privacy");
  }
  public function cookies() {

    $this->view("pages/cookies");
  }
  public function return() {

    $this->view("pages/return");
  }
  public function terms() {

    $this->view("pages/terms");
  }
  public function cinima($id = null) {
    $data = $this->homeModel->oneCinema($id);
    $this->view("pages/cinima",$data);
  }

  public function infoHall() {
    
    $this->view("pages/hallInfo");
  }
  public function packets() {
    
    $this->view("pages/packets");
  }
 
}
