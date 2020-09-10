<?php

// Create Pages class
class Pages extends Controller {

    public function __construct() {
        $this->bikesModel = $this->model("Bikes");
    }

    public function index() {
        // Minimal radius
        $minimalRadius = 80;

        // Read matching bikesfrom the database
        $bikes = $this->bikesModel->getMinimalRadius($minimalRadius);

        $data = ["title" => "Overzicht fietsen",
        "minimalRadius" => $minimalRadius,
        "bikes" => $bikes];

        $this->view("pages/index" , $data);


    }
        
}
