<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class adminmaintenanceController {

    public function adminmaintenanceController($request, $response, $container){
        $machinesModel = $container->get("Machines");
        $machines = $machinesModel->list();
        $maintenanceModel = $container->get("Maintenances");
        $maintenances = $maintenanceModel->list();
        $response->set("machines", $machines);
        $response->set("maintenances", $maintenances);

        $response->setTemplate("adminmaintenance.php");

        return $response;
    }
}