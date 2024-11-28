<?php

namespace App\Controllers;

class adminmaintenanceController {

    public function adminmaintenanceController($request, $response, $container){

        $response->setTemplate("adminmaintenance.php");

        return $response;
    }
}