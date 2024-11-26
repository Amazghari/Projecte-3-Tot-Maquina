<?php

namespace App\Controllers;

class maintenanceController {

    public function maintenanceController($request, $response, $container){

        $response->setTemplate("maintenance.php");

        return $response;
    }
}