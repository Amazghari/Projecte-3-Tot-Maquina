<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class inventoryController
{

    public function index($request, $response, $container)
    {
        $machinesModel = $container->get("Machines"); // Get Machines model

        $relationModel = $container->get("User_machine");

        $machines = $machinesModel->list(); // List all machines

        $response->set("machines", $machines); // Set machines in response

        $response->setTemplate("inventory.php"); // Set the template for the response

        return $response; // Return the response
    }

    public function editMachine($request, $response, $container)
    {
        $machines = $container->get("Machines"); // Get Machines model
        $id = $request->getParam("id"); // Get machine ID from request
        $machine = $machines->getById($id); // Get machine details by ID

        $response->set("machine", $machine); // Set machine details in response

        $response->setTemplate("editmachine.php"); // Set the template for editing machine
        return $response; // Return the response
    }

    public function updateMachine($request, $response, $container)
    {
        $directory = "/uploads/machines/"; // Directory for machine uploads
        $id = $request->get(INPUT_POST, "id"); // Get machine ID from POST request
        $name = $request->get(INPUT_POST, "name"); // Get machine name from POST request
        $model = $request->get(INPUT_POST, "model"); // Get machine model from POST request
        $manufacturer = $request->get(INPUT_POST, "manufacturer"); // Get manufacturer from POST request
        $serial_num = $request->get(INPUT_POST, "serial_num"); // Get serial number from POST request
        $longitude = $request->get(INPUT_POST, "longitude"); // Get longitude from POST request
        $latitude = $request->get(INPUT_POST, "latitude"); // Get latitude from POST request
        $image = $request->get("FILES", "image"); // Get uploaded image

        $image_url = $directory . $image["name"]; // Set image URL
        move_uploaded_file($image["tmp_name"], "uploads/machines/" . $image["name"]); // Move uploaded file

        $machines = $container->get("Machines"); // Get Machines model
        $machines->update($id, $name, $model, $manufacturer, $serial_num, $longitude, $latitude, $image_url); // Update machine details

        $response->redirect("location: /inventario"); // Redirect to inventory page

        return $response; // Return the response
    }

    public function addMachine(Request $request, Response $response, Container $container): Response
    {
        $directory = "/uploads/machines/"; // Directory for machine uploads
        $name = $request->get(INPUT_POST, "machineName"); // Get machine name from POST request
        $model = $request->get(INPUT_POST, "model"); // Get machine model from POST request
        $manufacturer = $request->get(INPUT_POST, "manufacturer"); // Get manufacturer from POST request
        $serial_num = $request->get(INPUT_POST, "serialNumber"); // Get serial number from POST request
        $installation_date = $request->get(INPUT_POST, "installationDate"); // Get installation date from POST request
        $longitude = $request->get(INPUT_POST, "longitude"); // Get longitude from POST request
        $latitude = $request->get(INPUT_POST, "latitude"); // Get latitude from POST request
        $image = $request->get("FILES", "image"); // Get uploaded image
        $image_url = $directory . $image["name"]; // Set image URL
        move_uploaded_file($image["tmp_name"], "uploads/machines//" . $image["name"]); // Move uploaded file
        //dd($_POST,$_FILES,$image_url);
        $machines = $container->get("Machines"); // Get Machines model
        $machines->add($name, $model, $manufacturer, $serial_num, $installation_date, $longitude, $latitude, $image_url); // Add new machine

        $response->redirect("location: /inventario"); // Redirect to inventory page
        return $response; // Return the response
    }

    public function deleteMachine($request, $response, $container)
    {
        try {
            $id = $request->getParam('id'); // Get machine ID from request
            error_log("Received ID to delete: " . $id); // Log the received ID

            if (!$id) {
                error_log("ID not received"); // Log if ID is not received
                $response->setStatus(400); // Set response status to 400
                return $response; // Return the response
            }

            $machines = $container->get("Machines"); // Get Machines model
            $result = $machines->delete($id); // Delete machine by ID


            return $response; // Return the response
        } catch (\Exception $e) {
            error_log("Error deleting machine: " . $e->getMessage()); // Log any errors

            return $response; // Return the response
        }
    }


    public function searchMachine(Request $request, Response $response, Container $container): Response
    {
        try {
            $machines = $container->get("Machines"); // Get Machines model
            $query = $request->get(INPUT_GET, "query"); // Get search query from request

            if (empty($query)) {
                header('Content-Type: application/json');
                echo json_encode([]); // Return empty JSON if query is empty
                exit();
            }

            $results = $machines->searchByName($query); // Search machines by name

            header('Content-Type: application/json');
            echo json_encode($results); // Return search results as JSON
            exit();
        } catch (\Exception $e) {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Search error']); // Return error message as JSON
            exit();
        }
    }

    public function uploadCSV($request, $response, $container)
    {
        if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == 0) {
            $filePath = $_FILES['csvFile']['tmp_name'];
            $machineModel = $container->get('Machines');
            
            if (($handle = fopen($filePath, 'r')) !== false) {
                fgetcsv($handle, 1000, ",");

                // Procesar cada línea del archivo
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $name = $data[0];
                    $model = $data[1];
                    $manufacturer = $data[2];
                    $serialNumber = $data[3];
                    $installation_date = $data[4];
                    $longitude = $data[5];
                    $latitude = $data[6];

                    $machineModel->addCsv($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                }
                fclose($handle);
            }
        }
        $response->setHeader("Location: /inventario");
        return $response;
    }
}
