<?php

namespace App\Controllers;

class admindashboardController {

    public function admindashboardController($request, $response, $container){

        $response->setTemplate("admindashboard.php");

        return $response;
    }
}