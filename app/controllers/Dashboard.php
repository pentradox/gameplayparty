<?php

class Dashboard extends controller {
    
    public function index() {
        if ($_SESSION["userid"] != null) {
          $this->view("pages/dashboard");
        } else {
          $this->redirect("admin");
        }
      }
}