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
}
