<?php
/*
 * index
 *
 * copyright wesley van der vliet
*/

spl_autoload_register(function ($class) {
    include 'controller/' . $class . '.php';
});

$controller = new MainController();
$controller->handleRequest();
