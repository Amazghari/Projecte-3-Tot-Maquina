<?php

namespace App\Controllers;

use DateTime;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class maintenanceController {
    
    public function maintenanceController($request, $response, $container) {
        $machinesModel = $container->get("Machines"); // Get Machines model
        $machines = $machinesModel->list(); // List all machines
        $maintenanceModel = $container->get("Maintenances"); // Get Maintenances model
        $maintenances = $maintenanceModel->list(); // List all maintenances
        $response->set("machines", $machines); // Set machines in response
        $response->set("maintenances", $maintenances); // Set maintenances in response

        $response->setTemplate("maintenance.php"); // Set the template for the response

        return $response; // Return the response
    }

    public function maintenanceView($request, $response, $container){

        $maintenanceModel = $container->get("Maintenances");
        $id=$request->getParam("id");
        $maintenance = $maintenanceModel->getById($id);
        $machinesModel = $container->get("Machines");
        $machines = $machinesModel->list();
        
        $response->set("machines", $machines);
        $response->set("maintenance", $maintenance);

        $response->setTemplate("maintenanceview.php"); // Set the template for the response

        return $response; // Return the response
    }

    public function addMaintenance(Request $request, Response $response, Container $container) : Response {
        $maintenanceModel = $container->get("Maintenances"); // Get Maintenances model
        $data = [
            "id_user" => $request->get(INPUT_POST, "iduser"), // Get user ID from POST request
            "title" => $request->get(INPUT_POST, "title"), // Get title from POST request
            "type" => $request->get(INPUT_POST, "type"), // Get type from POST request
            "status" => $request->get(INPUT_POST, "status"), // Get status from POST request
            "preventive_time" => $request->get(INPUT_POST, "preventive_time"), // Get preventive time from POST request
            "description" => $request->get(INPUT_POST, "description"), // Get description from POST request
            "date" => $request->get(INPUT_POST, "date"), // Get date from POST request
            "id_machine" => $request->get(INPUT_POST, "id_machine"), // Get machine ID from POST request
            "status" => $request->get(INPUT_POST, "status") // Get status again (duplicate)
        ];
        $date = new DateTime($data["date"]); // Create DateTime object from date
        $data["date"] = $date->format("Y-m-d"); // Format date to 'Y-m-d'
        // dd($data, $_POST);
        $maintenanceModel->add($data); // Add maintenance record

        $response->redirect("location: /mantenimientos"); // Redirect to maintenances page

        return $response; // Return the response
    }

    public function maintenanceEdit($request, $response, $container) {
        $maintenances = $container->get("Maintenances"); // Get Maintenances model
        $id = $request->getParam("id"); // Get maintenance ID from request
        $maintenance = $maintenances->getById($id); // Get maintenance by ID
        
        $response->set("maintenance", $maintenance); // Set maintenance in response

        $response->setTemplate("editmaintenance.php"); // Set the template for the response
        return $response; // Return the response
    }

    public function updateMaintenance($request, $response, $container) {
        $id = $request->get(INPUT_POST, "id"); // Get maintenance ID from POST request
        $title = $request->get(INPUT_POST, "title"); // Get title from POST request
        $state = $request->get(INPUT_POST, "state"); // Get state from POST request
        $description = $request->get(INPUT_POST, "description"); // Get description from POST request

        // dd($_POST);
        
        $machines = $container->get("Maintenances"); // Get Maintenances model
        $machines->update($id, $title, $state, $description); // Update maintenance record

        $response->redirect("location: /mantenimientos"); // Redirect to maintenances page
    
        return $response; // Return the response
    }

    public function deleteMaintenance($request, $response, $container) {
        $id = $request->getParam('id'); // Get maintenance ID from request
        error_log("Received ID to delete: " . $id); // Log the received ID
        
        if (!$id) {
            error_log("ID not received"); // Log if ID is not received
            $response->setStatus(400); // Set response status to 400
            return $response; // Return the response
        }

        $maintenance = $container->get("Maintenances"); // Get Maintenances model
        $maintenance->delete($id); // Delete maintenance record
        $response->redirect("location: /mantenimientos"); // Redirect to maintenances page

        return $response; // Return the response
    }

    public function myMaintenance($request, $response, $container) {
        $maintenanceModel = $container->get("Maintenances"); // Get Maintenances model
        $user_maintenances= $maintenanceModel->myMaintenance(); // Get User model
        $response->set("user_maintenances", $user_maintenances); // Set maintenances in response
        // dd($user_maintenances);

        $response->setTemplate("mywork.php"); // Set the template for the response

        return $response; // Return the response
    }
}