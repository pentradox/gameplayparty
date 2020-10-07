<?php

// Create Pages class
class Home extends Controller {
  public function __construct() {
    $this->homeModel = $this->model("Homepage");
  }
  public function index() {
    $data = $this->homeModel->cinema();
    $data2 = $this->homeModel->fetchcontent();
    $data = array($data, $data2);
    $this->view("pages/index",$data);
  }
  public function contact() {

    $this->view("pages/contact");
  }
  public function info() {

    $this->view("pages/info");
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

}
