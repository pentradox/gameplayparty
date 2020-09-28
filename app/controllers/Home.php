<?php

// Create Pages class
class Home extends Controller {
  public function index() {
    $this->view("pages/index");
  }
}
