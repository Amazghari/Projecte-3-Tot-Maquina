<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class homeController {

    public function homeController($request, $response, $container) {
        $incidencesModel = $container->get("Incidences"); // Get Incidences model
        $incidences = $incidencesModel->list(); // List all incidences
        $machinesModel= $container->get("Machines"); // Get Machines model
        $machines = $machinesModel->list(); // List all machines
        $response->set("machines", $machines);
        $response->set("incidences", $incidences); // Set incidences in response
        $response->setTemplate("home.php"); // Set the template for the response

        return $response; // Return the response
    }
}