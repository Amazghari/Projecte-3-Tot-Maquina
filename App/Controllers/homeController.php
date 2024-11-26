<?php

namespace App\Controllers;

class homeController {

    public function homeController($request, $response, $container){

        $response->setTemplate("home.php");

        return $response;
    }
}