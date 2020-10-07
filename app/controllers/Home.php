<?php

// Create Pages class
class Home extends Controller {
  public function __construct() {
    $this->homeModel = $this->model("Homepage");
  }

  public function index() {
    $data = $this->homeModel->cinema();
    $this->view("pages/index",$data);
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
  public function cinima() {
    
    $this->view("pages/cinima");
  }
 
}
