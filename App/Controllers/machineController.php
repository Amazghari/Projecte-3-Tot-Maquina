<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class machineController
{

    public function machineController($request, $response, $container) {
        $maintenanceModel = $container->get("Maintenances");
        $incidencesModel = $container->get("Incidences");
        // Get machine ID from request
        $id = $request->getParam("id");
        $maintenances=$maintenanceModel->listByMachine($id);
        $incidences=$incidencesModel->listByMachine($id);
        $machinesModel = $container->get("Machines"); // Get Machines model
        
        $machine = $machinesModel->getById($id); // Get machine details by ID
        $response->set("incidences", $incidences); // Set incidences in response
        $response->set("maintenances", $maintenances); // Set maintenances in response
        $response->set("machine", $machine); // Set machine details in response
        $response->setTemplate("machine.php"); // Set the template for the response

        return $response; // Return the response
    }

    public function updateMachine(Request $request, Response $response, Container $container): Response
    {
        $id = $request->get(INPUT_POST, "machineId"); // Get machine ID from POST request
        $name = $request->get(INPUT_POST, "name"); // Get machine name from POST request
        $model = $request->get(INPUT_POST, "model"); // Get machine model from POST request
        $manufacturer = $request->get(INPUT_POST, "manufacturer"); // Get manufacturer from POST request
        $longitude = $request->get(INPUT_POST, "longitude"); // Get longitude from POST request
        $latitude = $request->get(INPUT_POST, "latitude"); // Get latitude from POST request

        $machines = $container->get("Machines"); // Get Machines service from container
        $machines->updateMachine($id, $name, $model, $manufacturer, $longitude, $latitude); // Update machine details

        $response->redirect("location: /maquina/$id"); // Redirect to the updated machine's page

        return $response; // Return the response
    }

    public function qrGenerator (Request $request, Response $response, Container $container) {
        $id = $request->getParam("id");
       
    
        // $options = new QROptions([
        //     'version'      => 5, // Versión del QR
        //     'outputType'   => QRCode::OUTPUT_MARKUP_SVG,
        //     'ecc'          => QRCode::ECC_L, // Error Correction Level
        // ]);
        $options= new QROptions();
        $options->version=7;
        $options->outputBase64=false;
        $qrCode = new QRCode($options);
                            
        $qrCodeData = '/maquina/'.$id;// URL para el código QR
        $qrCodeImage = $qrCode->render($qrCodeData);
        $response->setHeader("Content-Type: image/svg+xml");
        $response->setBody($qrCodeImage);
        return $response;
    }
}