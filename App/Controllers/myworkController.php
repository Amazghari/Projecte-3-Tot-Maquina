<?php


namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class myworkController {

    public function myworkController($request, $response, $container){

        $response->setTemplate("mywork.php");

        $machinesModel = $container->get("Machines");

        $machines = $machinesModel->list();

        $response->set("machines", $machines);
        $incidencesModel = $container->get("Incidences");
    
        $incidences = $incidencesModel->list();

        $response->set("incidences", $incidences);

        return $response;
    }

    public function myWork($request, $response, $container) {
        $maintenanceModel = $container->get("Maintenances"); // Get Maintenances model
        $incidenceModel = $container->get("Incidences"); // Get Incidences model
        $machineModel = $container->get("Machines"); // Get Machines model

        $user_maintenances= $maintenanceModel->myMaintenance(); // Get User model
        $user_incidences = $incidenceModel->myIncidence(); // Get User model
        $user_machines = $machineModel->myMachine(); // Get User model

        $response->set("user_maintenances", $user_maintenances); // Set maintenances in response
        $response->set("user_incidences", $user_incidences); // Set incidences in response
        $response->set("user_machines", $user_machines); // Set machines in response
        //dd($user_maintenances);

        $response->setTemplate("mywork.php"); // Set the template for the response

        return $response; // Return the response
    }


}
