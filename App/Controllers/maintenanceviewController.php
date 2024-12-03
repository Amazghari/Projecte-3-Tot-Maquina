<?php

namespace App\Controllers;

class maintenanceviewController {

    public function maintenanceviewController($request, $response, $container){

        $response->setTemplate("maintenanceview.php");

        return $response;
    }
}