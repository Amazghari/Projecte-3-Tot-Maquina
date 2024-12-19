<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class incidencesController
{

    public function incidencesController($request, $response, $container)
    {
        $machinesModel = $container->get("Machines"); // Get Machines model
        $machines = $machinesModel->list(); // List all machines
        $incidencesModel = $container->get("Incidences"); // Get Incidences model
        $incidences = $incidencesModel->list(); // List all incidences

        $response->set("incidences", $incidences); // Set incidences in response
        $response->set("machines",$machines);
        $response->setTemplate("incidences.php"); // Set the template for the response

        return $response; // Return the response
    }

    public function addIncidences(Request $request, Response $response, Container $container): Response
    {
        $name = $request->get(INPUT_POST, "name"); // Get name from POST request
        $state = $request->get(INPUT_POST, "state"); // Get state from POST request
        $priority = $request->get(INPUT_POST, "priority"); // Get priority from POST request
        $description = $request->get(INPUT_POST, "description"); // Get description from POST request
        $id_machine = $request->get(INPUT_POST, "id_machine"); // Get machine ID from POST request

        if ($id_machine === "") {
            $id_machine = NULL; // Set to NULL if no machine ID is provided
        }
        
        $incidences = $container->get("Incidences"); // Get Incidences model
        $incidences->add($name, $state, $priority, $description, $id_machine); // Add new incidence

        $response->redirect("location: /incidencias"); // Redirect to incidences page
        return $response; // Return the response
    }

    public function editIncidence($request, $response, $container)
    {
        $incidences = $container->get("Incidences"); // Get Incidences model
        $id = $request->getParam("id"); // Get incidence ID from request
        $incidence = $incidences->getById($id); // Get incidence details by ID
        
        $response->set("incidence", $incidence); // Set incidence details in response
        $response->setTemplate("editIncidence.php"); // Set the template for editing incidence

        return $response; // Return the response
    }

    public function updateIncidence(Request $request, Response $response, Container $container): Response
    {
        $id = $request->get(INPUT_POST, "id"); // Get incidence ID from POST request
        $name = $request->get(INPUT_POST, "name"); // Get name from POST request
        $state = $request->get(INPUT_POST, "state"); // Get state from POST request
        $priority = $request->get(INPUT_POST, "priority"); // Get priority from POST request
        $description = $request->get(INPUT_POST, "description"); // Get description from POST request
        $id_machine = $request->get(INPUT_POST, "id_machine"); // Get machine ID from POST request

        $incidences = $container->get("Incidences"); // Get Incidences model
        $incidences->listupdate($id, $name, $state, $priority, $description, $id_machine); // Update incidence details

        $response->redirect("location: /incidencias"); // Redirect to incidences page
        return $response; // Return the response
    }

    public function deleteIncidence($request, $response, $container)
    {
        $id = $request->getParam('id'); // Get incidence ID from request
        error_log("Received ID to delete: " . $id); // Log the received ID
        
        if (!$id) {
            error_log("ID not received"); // Log if ID is not received
            $response->setStatus(400); // Set response status to 400
            return $response; // Return the response
        }

            $incidences = $container->get("Incidences");
            $incidences->delete($id);
            $response->redirect("location: /incidencias");

          
            
            return $response;
        }

        public function hoursImputed($request, $response, $container){
            //  dd($_POST);
            $id = $request->get(INPUT_POST, "id");
            $priority = $request->get(INPUT_POST, "priority");
            $state = $request->get(INPUT_POST, "state");
            $imputed_hours = $request->get(INPUT_POST, "input_hours");
            $first_answer = $request->get(INPUT_POST, "first_answer");
            $end_date = $request->get(INPUT_POST, "end_date");

            $incidences = $container->get("Incidences");
            $incidences->hoursimputed($id, $priority, $state,$imputed_hours, $first_answer, $end_date);

            $response->redirect("location: /incidencias");

            return $response;
        }
}
