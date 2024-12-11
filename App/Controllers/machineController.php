<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class machineController {

    public function machineController($request, $response, $container) {
        $machinesModel = $container->get("Machines"); // Get Machines model
        $id = $request->getParam("id"); // Get machine ID from request
        $machine = $machinesModel->getById($id); // Get machine details by ID
        
        $response->set("machine", $machine); // Set machine details in response
        $response->setTemplate("machine.php"); // Set the template for the response

        return $response; // Return the response
    }

    public function updateMachine(Request $request, Response $response, Container $container) : Response {
        $id = $request->get(INPUT_POST, "machineId"); // Get machine ID from POST request
        $name = $request->get(INPUT_POST, "name"); // Get machine name from POST request
        $model = $request->get(INPUT_POST, "model"); // Get machine model from POST request
        $manufacturer = $request->get(INPUT_POST, "manufacturer"); // Get manufacturer from POST request
        $longitude = $request->get(INPUT_POST, "longitude"); // Get longitude from POST request
        $latitude = $request->get(INPUT_POST, "latitude"); // Get latitude from POST request

        $machines = $container->get("Machines"); // Get Machines service from container
        $machines->updateMachine($id, $name, $model, $manufacturer, $longitude, $latitude); // Update machine details

        $response->redirect("location: /machine/$id"); // Redirect to the updated machine's page

        return $response; // Return the response
    }
}