<?php
namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;


class machinesController {

    public Container $contenidor; // Dependency injection for the container

    public function __construct(Container $contenidor)
    {
        $this->contenidor = $contenidor; // Initialize the container
    }

    public function addMachine(Request $request, Response $response, Container $container) :Response
    {
        // Get machine details from the request
        $name = $request->get(INPUT_POST, "machineName");
        $model = $request->get(INPUT_POST, "model");
        $manufacturer = $request->get(INPUT_POST, "manufacturer");
        $serial_num = $request->get(INPUT_POST, "serialNumber");
        $installation_date = $request->get(INPUT_POST, "installationDate");
        $location = $request->get(INPUT_POST, "location");
        $image_url = $request->get(INPUT_POST, "image");

        // Debugging output for POST data
        // dd($_POST);

        $machines = $container->get("Machines"); // Get Machines service from container
        $machines->add($model, $manufacturer, $serial_num, $installation_date, $location, $image_url); // Add new machine

        $response->setTemplate("inventory.php"); // Set the template for the response
        return $response; // Return the response
    }
}